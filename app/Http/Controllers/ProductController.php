<?php

namespace App\Http\Controllers;

use App\Product;
use App\Order_product;
use App\Student;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
        public function store(Request $request)
        {
                $check = Product::where('productName',  request('productName'))->first();
                if (empty($check)) {
                        $validatedData = $request->validate([
                                'productName' => 'required|max:255',
                                'productcategory' => 'required',
                                'productPrice' => 'required|numeric',
                        ]);
                        $show = Product::create($validatedData);
                        Alert::success('Success!', 'Successfully added');
                        return redirect('/foodie')->withSuccessMessage('Successfully added');
                        //   return redirect('/foodie')->with('success', 'Corona Case is successfully saved');
                } else {
                        Alert::warning('Warning', 'product already exist');
                        return redirect()->back()->withWarningMessage('Product already exist');
                }
        }
        public function index()
        {
                $product = Product::all();

                return view('products.index', compact('product'));
        }
        public function edit($id)
        {
                $products = Product::findOrFail($id);

                return view('products.edit', compact('products'));
        }
        public function update(Request $request, $id)
        {
                $check = Product::where('productName',  request('productName'))->first();
                if (empty($check)) {
                        $validatedData = $request->validate([
                                'productName' => 'required|max:255',
                                'productcategory' => 'required',
                                'productPrice' => 'required|numeric',
                        ]);
                        Product::whereId($id)->update($validatedData);
                        Alert::success('Success!', 'Successfully updated');
                        return redirect('/foodie')->withSuccessMessage('Successfully updated');
                        // return redirect('/foodie')->with('success', 'Corona Case Data is successfully updated');
                } else {
                        Alert::warning('Warning', 'you cant update product already exist');
                        return redirect()->back()->withWarningMessage('Product already exisst');
                }
        }
        public function destroy($id)
        {
                $product = product::findOrFail($id);
                $product->delete();
                Alert::success('Success!', 'Successfully deleted');
                return redirect('/foodie')->withSuccessMessage('Successfully deleted');
                // return redirect('/foodie')->with('success', 'Corona Case Data is successfully deleted');
        }

        public function order(Student $student)
        {
                $products = product::all();
                return view('orders.choose_product', compact('products', 'student'));
        }

        public function productstore(Request $request)
        {
                $order_product = new Order_product();
                $order_product->product_id = request('product');
                $order_product->price = request('price');
                $order_product->date = request('date');
                $order_product->quantity = request('quantity');
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
                return redirect()->back()->withSuccessMessage('success', 'Data Saved');
        }
}
