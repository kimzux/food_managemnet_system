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
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Product Name</td>
          <td>Product Category</td>
          <td>Product Price</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($product as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->productName}}</td>
            <td>{{$product->productcategory}}</td>
            <td>{{$product->productPrice}}</td>
            <td><a href="{{ route('foodie.edit', $product->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('foodie.destroy', $product->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure  you want to delete?')">Delete</button>
                  <?=csrf_field()?>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection