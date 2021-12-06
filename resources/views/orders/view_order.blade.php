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
                @foreach($order->products as $orderProduct)
                <tr>
                    <td>{{$orderProduct->product->productName}}</td>
                    <td>{{$orderProduct->product->productcategory}}</td>
                    <td>{{$orderProduct->quantity}}</td>   
                </tr>
                 @endforeach
            </tbody>
          </table> 
         
        </div>
    </div>
    <td><a href="invoice"  class="btn btn-primary ml-3">generate invoice</a></td>
    @endsection
