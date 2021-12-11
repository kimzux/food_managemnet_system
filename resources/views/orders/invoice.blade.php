{{-- @extends('layouts.app')

@section('content')
      <section class="mt-3">
         <div class="container-fluid">
         {{-- <h6 class="text-center"> Shine Metro Mkadi Naka (New - Delhi)</h6> --}}
            <div class="col-md-7  mt-4" style="background-color:#f5f5f5;">
               <div class="p-4">
                  <div class="text-center">
                     <h4>Receipt</h4>
                  </div>
                  <span class="mt-4"> Time : </span><span  class="mt-4" id="time"></span>
                  <div class="row">
                     <div class="col-xs-6 col-sm-6 col-md-6 ">
                        <span id="day"></span> : <span id="year"></span>
                     </div>
                     <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                        <p>Order No:1234</p>
                     </div>
                  </div>
                  <div class="row">
                     </span>
                     <table id="receipt_bill" class="table">
                        <thead>
                           <tr>
                              <th> No.</th>
                              <th>Product Name</th>
                              <th>Quantity</th>
                              <th class="text-center">Price</th>
                              <th class="text-center">Total</th>
                           </tr>
                        </thead>
                        <tbody id="new" >
                          
                        </tbody>
                        <tr>
                           <td> </td>
                           <td> </td>
                           <td> </td>
                           <td class="text-right text-dark" >
                                <h5><strong>Sub Total:  ₹ </strong></h5>
                           </td>
                           <td class="text-center text-dark" >
                              <h5> <strong><span id="subTotal"></strong></h5>
                              <h5> <strong><span id="taxAmount"></strong></h5>
                           </td>
                        </tr>
                        <tr>
                           <td> </td>
                           <td> </td>
                           <td> </td>
                           <td class="text-right text-dark">
                              <h5><strong>Gross Total: ₹ </strong></h5>
                           </td>
                           <td class="text-center text-danger">
                              <h5 id="totalPayment"><strong> </strong></h5>
                               
                           </td>
                        </tr>
                     </table>
                  </div>
               </div>
            </div>
         </div>
  @endsection
  @extends('layouts.app')

  @section('content')
      <style>
          .uper {
              margin-top: 40px;
          }
  
      </style>
  
      <div class="card mb-3"  style="max-width: 50rem ">
          <div class="card-body"  style="background-color:#f5f5f5;">
              <div class="text-center">
                  <h4>invoice</h4>
               </div>
               <div class="row">
               <span class="mt-4">
            <p> Date: {{ $order->date }} </p> </span>
            <div class="row">
              <div class="col-xs-4 col-sm-4 col-md-4 ">
                 <span id="day"></span> : <span id="year"></span>
              </div>
  
              <div class="ml-">
                  <p> Student Name:</p> {{ $order->student->full_name }} 
                  <p> Order No:</p>  {{ $order->order_no }}
              </div>
           </div>
            <div class="col-xs-6 col-sm-6 col-md-6 text-right">
              
             </div>
               </div>
             <h5>List of the products taken</h5>
              <table id="product_datatable" class="table table-striped">
              <thead>
                  <tr>
                    <td>Product Name</td>
                    <td>Product category</td>
                    <td>Product Quantiy</td>
                    <td>Product Pice</td>
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
              </tbody>
            </table> 
           
          </div>
      </div>
      <td><a href="invoice"  class="btn btn-primary ml-3">generate invoice</a></td>
      @endsection
   --}}
