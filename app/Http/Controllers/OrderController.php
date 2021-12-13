<?php

namespace App\Http\Controllers;

use App\Order;
use App\Order_product;
use App\Stock;
use App\Student;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function store(Request $request, Student $student)
    {
        $request->validate([
            'cart' => ['required', 'json']
        ]);

        $cart = collect(json_decode($request->cart));

        $error_message = null;

        DB::beginTransaction();

        $total_price = $cart->sum(fn ($item) => $item->product->productPrice * $item->qnt);

        $order = Order::create([
            'student_id' => $student->id,
            'status' => Order::TAKEN,
            'total_price' => $total_price,
            'date' => now()->format('Y-m-d'),
        ]);

        $order_number = now()->format('y') . now()->month . now()->day;
        //insert order number
        $order->update(['order_no' => $order_number . $order->id]);

        foreach ($cart as $item) {

            $stocks = Stock::where('product_id', $item->product->id)->where('quantity_rec', '>', 0)->get();

            if ($stocks->isEmpty()) {
                $error_message = 'Stock is missing in product';
                DB::rollBack();
                break;
            }

            if ($stocks->sum(fn ($val) => $val->quantity_rec) < $item->qnt) {
                $error_message = 'Quantity order is greater than available';
                DB::rollBack();
                break;
            }

            $order->products()->create([
                'order_id' => $order->id,
                'product_id' => $item->product->id,
                'price' => $item->product->productPrice ?? 0,
                'quantity' => $item->qnt,
            ]);

            $qnt = $item->qnt;
            foreach ($stocks as $stock) {
                if ($qnt == 0) {
                    break;
                }

                if ($stock->quantity_rec >= $qnt) {
                    $stock->update(['quantity_rec' => $stock->quantity_rec - $qnt]);
                    break;
                }

                $qnt = $qnt - $stock->quantity_rec;
                $stock->update(['quantity_rec' => 0]);
            }
        }
        DB::commit();

        if ($error_message) {
            Alert::error('Error!', $error_message);
            return back();
        }

        Alert::success('Success!', 'Successfully added');
        return redirect(route('search'));
    }
    public function index()
    { 
        abort_if(Auth::user()->cannot('View choose product'), 403, 'Access Denied');

        $order = Order::with(['student'])->get();

        return view('orders.order_details', compact('order'));
    }
    public function view_order($id)
    {
        abort_if(Auth::user()->cannot('View order details'), 403, 'Access Denied');
        $order = Order::findOrFail($id);
        //  dd($order);
        return view('orders.view_order', compact('order'));
    }
    public function invoice_generate($id)
    {   
        abort_if(Auth::user()->cannot('Invoice'), 403, 'Access Denied');
        $order = Order::findOrFail($id);
      
        $pdf = PDF::loadView('orders.invoice', compact('order'));
  
        return $pdf->stream('invoice.pdf');
    }
}
