<?php

namespace App\Http\Controllers;

use App\Order;
use App\Stock;
use App\Student;
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

        DB::transaction(function () use ($cart, $student) {

            $total_price = $cart->sum(fn ($item) => $item->product->stock->price ?? 0);

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
                    Alert::error('Error', 'Stock is missing in product');
                    return back();
                    break;
                }

                if ($stocks->sum(fn ($val) => $val->quantity_rec) < $item->qnt) {
                    Alert::error('Error', 'Quantity order is greater than available');
                    return back();
                    break;
                }

                $order->products()->create([
                    'order_id' => $order->id,
                    'product_id' => $item->product->id,
                    'price' => $item->product->stock->price ?? 0,
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
        });

        Alert::success('Success!', 'Successfully added');
        return redirect(route('search'));
    }
}
