<?php

namespace App\Http\Controllers;

use App\Order;
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

            $total_price = $cart->sum(fn ($item) => $item->product->productPrice??0);

            $order = Order::create([
                'student_id' => $student->id,
                'status' => Order::TAKEN,
                'total_price' => $total_price,
                'date' => now()->format('Y-m-d'),
            ]);

            $order_number = now()->format('y') . now()->month . now()->day;
            //insert order number
            $order->update(['order_no' => $order_number . $order->id]);

            $order_products_data = $cart->map(fn ($item) => [
                'order_id' => $order->id,
                'product_id' => $item->product->id,
                'price' => $item->product->productPrice,
                'quantity' => $item->qnt,
            ]);

            $order->products()->createMany($order_products_data->toArray());
        });

        Alert::success('Success!', 'Successfully added');
        return redirect(route('search'));
    }
}
