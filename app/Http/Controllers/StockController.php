<?php

namespace App\Http\Controllers;
use App\Product;
use App\Order_product;
use App\Student;
use App\Stock;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function stock_manage()
    {
        $stock = Product::select('id', 'productName')->get();
        return view('stockproduct.stock', compact('stock'));
    }
    public function productstock(Request $request){
        $productstock = new Stock();
        $productstock->product_id = request('productName');
        $productstock->quantity_rec=request('quantity_rec');
        $productstock->price=request('price');
        $productstock->save();
        Alert::success('Success!', 'Successfully added');
        return redirect()->back()->withSuccessMessage('success', 'Data Saved');
      }
      
}
