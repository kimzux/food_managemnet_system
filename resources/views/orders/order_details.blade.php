@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container">
<form style="display: inline" action="create" method="get">
  <button type="submit" class="btn btn-primary">Click here to add product</button>
</form>
</div>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table id="product_datatable" class="table table-striped">
    <thead>
        <tr>
          <td>Order#</td>
          <td>Date</td>
          <td>Name</td>
          <td>Total price</td>
          {{-- <td>Product Price</td> --}}
          <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($order as $orders)
        <tr>
            <td>{{$orders->order_no}}</td>
            <td>{{$orders->date}}</td>
            <td>{{$orders->student->full_name}}</td>
            <td>{{$orders->total_price}}</td>
            {{-- <td>{{$product->productPrice}}</td> --}}
            <td>
              <div class="d-flex">
                <a href="{{ route('view_order', $orders->id)}}" class="btn btn-success">view</a>
                
              </div>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection

@push('scripts')
<script>
    $('#product_datatable').DataTable({});
</script>
@endpush