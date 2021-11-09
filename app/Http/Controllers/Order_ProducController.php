<?php

namespace App\Http\Controllers;
use App\Product;
use App\Order_product;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class Order_ProducController extends Controller
{
    public function store(Request $request)
    {
    $order_product = new Order_product();
    $order_product->product_id =request('product');
    $order_product->price = request('price');
    $order_product->date = request('date');
    $order_product->quantity= request('quantity');
    // $student->phone_number=request('phone');
    // $student->registration_number=request('registration_number');
    // $student->parent_name=request('parent_name');
    // $student->address= request('address');
    // $student->date_of_birth= request('dob');
    // $student->date_of_joining= request('doj');
    // $student->gender= request('gender');
    // $student->branch_id=request('branch');
    // // $student->image= request('image')->nullable
    $order_product->save();
    Alert::success('Success!', 'Successfully added');
    return redirect()->back()->withSuccessMessage('success','Data Saved');
   
  
}
}