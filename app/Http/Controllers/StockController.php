<?php

namespace App\Http\Controllers;

use App\Product;
use App\Order_product;
use App\Student;
use App\Stock;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class StockController extends Controller
{
    // public function index()
    // {
    //     $product=Stock::all();
    //     return view('stockproduct.productavail')->with('Stock','productstock'); 
    // }
    public function stock_manage()
    {
        $stock = Product::select('id', 'productName')->get();
        return view('stockproduct.createstock', compact('stock'));
    }

    public function store(Request $request)
    {
        $productstock = new Stock();
        $productstock->product_id = request('productName');
        $productstock->quantity_rec = request('quantity_rec');
        $productstock->price = request('price');
        $productstock->save();
        Alert::success('Success!', 'Successfully added');
        return redirect('/stock')->withSuccessMessage('Successfully added');
    }
    public function index()
    {

        $stocks= Stock::with('product')->sumQuantity()->get();

        return view('stockproduct.productavail', compact('stocks'));
    }
    public function destroy($id)
    {
        $stock = Stock::findOrFail($id);
        $stock->delete();
        Alert::success('Success!', 'Successfully deleted');
        return redirect('/stock')->withSuccessMessage('Successfully deleted');
        // return redirect('/foodie')->with('success', 'Corona Case Data is successfully deleted');
    }
    public function edit($id)
    {
        $stock =Stock::findOrFail($id);
       
        // $stock = Product::select('id', 'productName')->get();

        return view('stockproduct.stock_details', compact('stock'));
    }
    public function detail($id)
    {
        // $product =Product::findOrFail('productName');
        $stocks= Stock::with('product')->where('product_id',$id)->get();

        return view('stockproduct.stock_details', compact('stocks'));
    }
    public function update(Request $request, $id)
    {
        $productstock = new Stock();
        $productstock->quantity_rec = request('quantity_rec');
        $productstock->price = request('price');
        $productstock->save();
        Alert::success('Success!', 'Successfully added');
        return redirect('stockproduct.stock_details')->withSuccessMessage('Successfully updated');


        // Product::whereId($id)->update($validatedData);
        // Alert::success('Success!', 'Successfully updated');
        // return redirect('/foodie')->withSuccessMessage('Successfully updated');

    }
}
