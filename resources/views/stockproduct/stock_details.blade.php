@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }

    </style>

    <div class="uper">
        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <table id="product_datatable" class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Product Name</td>
                    <td>Product Quantity</td>
                    <td>Date</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($stocks as $stock)
                    <div class="section">
                        <tr>
                            <td>{{ $stock->id }}</td>
                            <td>{{ $stock->product->productName }}</td>
                            <td>{{ $stock->quantity_rec }}</td>
                            <td>{{ $stock->created_at->format('j M, Y') }}</td>
                            <td>
                                <div class="d-flex">

                                    <div class="container">
                                        <button data-id='{{ $stock->id }}' data-quantity='{{ $stock->quantity_rec }}'
                                            type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#editModal">
                                            edit
                                        </button>
                                    </div>


                                    {{-- <a href="{{ route('stock.edit', $stock->id)}}" class="btn btn-primary">edit</a> --}}
                                    <form action="{{ route('stock.destroy', $stock->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        {{-- <button class="ml-4 btn btn-danger" type="submit" onclick="return confirm('Are you sure  you want to delete?')">Delete</button> --}}
                                        <?= csrf_field() ?>
                                    </form>
                                </div>
                            </td>
                        </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <h5 class="modal-title" id="exampleModalLabel">Edit details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="editForm" method="post">
                            @method('put')
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="productquantity" class="col-sm-4 col-form-label">product Quantity</label>
                                    <div class="col-sm-4">
                                        <input type="number" id="productquantity" class="form-control"
                                            name="quantity_rec" />
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer border-top-0 d-flex justify-content-center">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#product_datatable').DataTable({});
        $('#editModal').on('show.bs.modal', function(event) {
            let button = event.relatedTarget;
            let id = $(button).data('id');
            let quantity = $(button).data('quantity');
            $("#productquantity").val(quantity);
            let action = "{{ route('stock.update', 'stock_id') }}";
            action = action.replace('stock_id', id);
            $('#editForm').attr('action', action);
        })
    </script>
@endpush
