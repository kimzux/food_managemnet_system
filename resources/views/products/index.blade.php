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
          <td>ID</td>
          <td>Product Name</td>
          <td>Product Category</td>
          <td>Product Price</td>
          <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($product as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->productName}}</td>
            <td>{{$product->productcategory}}</td>
            <td>{{$product->productPrice}}</td>
            <td>
              <div class="d-flex">
                <a href="{{ route('foodie.edit', $product->id)}}" class="btn btn-primary">Edit</a>
                <form action="{{ route('foodie.destroy', $product->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="ml-4 btn btn-danger" type="submit" onclick="return confirm('Are you sure  you want to delete?')">Delete</button>
                  <?=csrf_field()?>
                </form>
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