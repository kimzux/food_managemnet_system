@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Product</h1>
          </div>
          <hr class="sidebar-divider d-none d-md-block">
          <div class="card bg-light mb-3" style="max-width: 50rem">
     <div class="align-items-center justify-content-between mb-4">
     <div class="card-body">
      <form method="post" action="{{ route('stock.update', $products->id ) }}">
          <div class="form-group row">
              @csrf
              @method('PATCH')
            
              <div class="form-group row">
                <label for="productName" class="col-sm-2 col-form-label"><b>Product Name:</b></label>
                <div class="col-sm-6">
                    <select class="form-control" name="productName">
                        @foreach ($stock as $product)

                            <option value="{{ $product->id }}"> {{ $product->productName }} </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="productquantity" class="col-sm-2 col-form-label"><b>Product quantity:</b></label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" name="quantity_rec" />
                </div>
            </div>

            <div class="form-group row">
                <label for="productprice" class="col-sm-2 col-form-label"><b>Product price:</b></label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" name="price" />
                </div>
            </div>

           

              <!-- <textarea rows="5" columns="5" class="form-control" name="productcategory" value="{{ $products->productcategory }}"></textarea> -->
       

<div class="form-group row">
                  <label for="button" class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-offset-8 col-sm-8">
          <button type="submit" class="btn btn-primary">Update Data</button>
                  </div>
           </div>
        
          <?=csrf_field()?>
      </form>
  </div>
</div>
@endsection 
