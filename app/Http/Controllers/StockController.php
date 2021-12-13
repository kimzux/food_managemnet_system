<?php

namespace App\Http\Controllers;

use App\Product;
use App\Order_product;
use App\Student;
use App\Stock;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    // public function index()
    // {
    //     $product=Stock::all();
    //     return view('stockproduct.productavail')->with('Stock','productstock'); 
    // }
    public function stock_manage()
    {
        abort_if(Auth::user()->cannot('View stock'), 403, 'Access Denied');
        $stock = Product::select('id', 'productName')->get();
        return view('stockproduct.createstock', compact('stock'));
    }

    public function store(Request $request)
    {
        abort_if(Auth::user()->cannot('Create stock'), 403, 'Access Denied');
        $productstock = new Stock();
        $productstock->product_id = request('productName');
        $productstock->quantity_rec = request('quantity_rec');
        $productstock->save();
        Alert::success('Success!', 'Successfully added');
        return redirect('/stock');
    }
    public function index()
    {
        abort_if(Auth::user()->cannot('View stock'), 403, 'Access Denied');

        $stocks = Stock::with('product')->sumQuantity()->get();

        return view('stockproduct.productavail', compact('stocks'));
    }
    public function destroy($id)
    {
        abort_if(Auth::user()->cannot('delete stock'), 403, 'Access Denied');
        $stock = Stock::findOrFail($id);
        $stock->delete();
        Alert::success('Success!', 'Successfully deleted');
        return redirect('/stock');
        // return redirect('/foodie')->with('success', 'Corona Case Data is successfully deleted');
    }
    public function edit($id)
    {
        abort_if(Auth::user()->cannot('Edit stock'), 403, 'Access Denied');
        $stock = Stock::findOrFail($id);

        // $stock = Product::select('id', 'productName')->get();

        return view('stockproduct.stock_details', compact('stock'));
    }
    public function detail($id)
    {
        abort_if(Auth::user()->cannot('Stock detail'), 403, 'Access Denied');
        // $product =Product::findOrFail('productName');
        $stocks = Stock::with('product')->where('product_id', $id)->get();

        return view('stockproduct.stock_details', compact('stocks'));
    }
    public function update(Request $request, $id)
    {
        $stock = Stock::findOrFail($id);
        $stock->quantity_rec = $request->input('quantity_rec');
        $stock->save();
        Alert::success('Success!', 'Successfully updated');
        return back();
    }
}
