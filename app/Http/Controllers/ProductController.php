<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
  public function store(Request $request)
  {
        $check=Product::where('productName',  request('productName'))->first();
        if(empty($check)){
           $validatedData = $request->validate([
              'productName' => 'required|max:255',
              'productcategory' => 'required',
              'productPrice' => 'required|numeric',
          ]);
          $show = Product::create($validatedData);
          Alert::success('Success!', 'Successfully added');
          return redirect('/foodie')->withSuccessMessage('Successfully added');
        //   return redirect('/foodie')->with('success', 'Corona Case is successfully saved');
       }
       else{
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
        $check=Product::where('productName',  request('productName'))->first();
        if(empty($check)){
        $validatedData = $request->validate([
          'productName' => 'required|max:255',
          'productcategory' => 'required',
          'productPrice' => 'required|numeric',
        ]);
        Product::whereId($id)->update($validatedData);
        Alert::success('Success!', 'Successfully updated');
        return redirect('/foodie')->withSuccessMessage('Successfully updated');
        // return redirect('/foodie')->with('success', 'Corona Case Data is successfully updated');
}
else{
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
      }