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
                    <form method="post" action="{{ route('foodie.update', $products->id) }}">
                        <div class="form-group row">
                            @csrf
                            @method('PATCH')

                            <label for="productName" class="col-sm-2 col-form-label"><b>Product Name:</b></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="productName"
                                    value="{{ $products->productName }}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="productcategory" class="col-sm-2 col-form-label"><b>Product Category:</b></label>
                            <div class="col-sm-8">
                                <select class="form-control" name="productcategory">
                                    <option value="">select</option>

                                    <option value="food" {{ $products->productcategory === 'food' ? 'Selected' : '' }}>
                                        food</option>
                                    <option value="drink" {{ $products->productcategory === 'drink' ? 'Selected' : '' }}>
                                        drink</option>
                                    <option value="snacks"
                                        {{ $products->productcategory === 'snacks' ? 'Selected' : '' }}>snacks</option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="productPrice" class="col-sm-2 col-form-label"><b>Product Price:</b></label>
                            <div class="col-sm-8">
                                <input type="number" step="0.01" class="form-control" name="productPrice"
                                    value="{{ $products->productPrice }}" id="productPrice" />
                            </div>
                        </div>
                        <!-- <textarea rows="5" columns="5" class="form-control" name="productcategory" value="{{ $products->productcategory }}"></textarea> -->


                        <div class="form-group row">
                            <label for="button" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-offset-8 col-sm-8">
                                <button type="submit" class="btn btn-primary">Update Data</button>
                            </div>
                        </div>

                        <?= csrf_field() ?>
                    </form>
                </div>
            </div>
        @endsection
