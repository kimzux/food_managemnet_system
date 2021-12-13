@extends('layouts.app')

@section('content')
      <section class="mt-3">
         <div class="container-fluid">
         {{-- <h6 class="text-center"> Shine Metro Mkadi Naka (New - Delhi)</h6> --}}
            <div class="col-md-7  mt-4" style="background-color:#f5f5f5;">
               <div class="p-4">
                  <div class="text-center">
                     <h4>invoice</h4>
                  </div>
                  <span class="mt-4"> Date : {{ $order->date }} </span>
                  <div class="row">
                     <div class="col-xs-6 col-sm-6 col-md-6 ">
                     </div>
                     <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                        <p> Student Name: {{ $order->student->full_name }} </p>
                        <p> Order No:  {{ $order->order_no }}</p>
                     </div>
                  </div>
                  <div class="row">
                     </span>
                     <table id="invoice_table" class="table">
                        <thead>
                           <tr>
                           
                              <th>Product Name</th>
                              <th>Category</th>
                              <th >Quantity</th>
                              <th >Price</th>
                           </tr>
                        </thead>
                       
                        <tbody>
                            @foreach($order->products as $orderProduct)
                            <tr>
                                <td>{{$orderProduct->product->productName}}</td>
                                <td>{{$orderProduct->product->productcategory}}</td>
                                <td>{{$orderProduct->quantity}}</td>  
                                <td>{{$orderProduct->product->productPrice}}</td> 
                            </tr>
                             @endforeach
                           <td class="text-right text-dark" >
                                <h5><strong>Total: {{ $order->total_price }}  </strong></h5>
                           </td>
                        </tr>
                    </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
         <td><a href="{{ route('invoice_generate', $order->id) }}"  class="btn btn-primary ml-4">generate invoice</a></td>
      </section>
  @endsection
  