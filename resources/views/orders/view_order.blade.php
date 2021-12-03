@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }

    </style>

    <div class="card mb-3"  style="max-width: 30rem ">
        <div class="card-body">
           <b> Student Name:</b> {{ $order->student->full_name }}  <b>  //  </b>
           <b> Order No:</b>  {{ $order->order_no }} <br><br>
           <h5>List of the products taken</h5>
           <table id="product_datatable" class="table table-striped">
            <thead>
                <tr>
                  <td>Product Name</td>
                  <td>Product category</td>
                  <td>Product Quantiy</td>
                </tr>
            </thead>
            <tbody>
                @foreach($order as $orders)
                 <div class="section">
                <tr>
                    <td>{{$orders->products->productName}}</td>
                    <td>{{$orders->products->productcategory}}</td>
                    <td>{{$orders->products->quantity_rec}}</td>
                    {{-- <td>{{$product->productPrice}}</td> --}}
                </tr>
                 @endforeach
            </tbody>
          </table>
          
        </div>
    </div>

    @endsection
