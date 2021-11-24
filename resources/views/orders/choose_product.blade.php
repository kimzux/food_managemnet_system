@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }

    </style>

    <div class="card mb-4">
        <div class="card-body">
            {{ $student->full_name }}
            {{ $student->registration_number }}
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <select name="" id="products" class="form-control w-auto">
                <option value="" selected disabled>Select product</option>
                @foreach ($products as $product)
                    <option value='@json($product)'>
                        {{ $product->productName }}
                    </option>
                @endforeach
            </select>
            <table id="choose_product" class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Qnt</th>
                        <th>Available Qnt</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
            <form action="{{ route('store_order', $student->id) }}" method="post">
                @csrf
                <input type="hidden" name="cart" id="cart">
                <button type="button" onclick="submitCart(event)" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
    <div id="modalRegister" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">product ordered details</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="choose_product">
                        <div class="form-group row">
                            <label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input type="number" min="0.00" class="form-control" id="inputPrice" name="price"
                                    placeholder="Price">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="inputDate" name="date" placeholder="Date">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputQuantity" class="col-sm-2 col-form-label">Quantity</label>
                            <div class="col-sm-10">
                                <input type="number" min="1" class="col-sm-2 form-control" name="quantity"
                                    id="inputQuantity">
                            </div>
                        </div>

                        <div class="form-group row">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">save</button>
                        </div>
                        <?= csrf_field() ?>
                    </form>




                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const products_table = $('#choose_product').DataTable({
            dom: 't',
            columns: [{
                    data: 'product.productName'
                },
                {
                    data: 'qnt'
                },
                {
                    data: 'product.stock', render: function(stock){
                        if(!stock){
                            return 0;
                        }
                        return stock[0].total_qnt;
                    }
                },
                {
                    data: 'product',
                    render(row) {
                        return `
                                 <button type="button" class="btn btn-primary edit-item">Edit</button>
                                 <button type="button" class="btn btn-danger delete-item">Delete</button>
                                `
                    }
                }
            ]
        });

        $('#products').select2({});

        const cart = {

            existsProduct: function(product) {
                return this.items.some(function(item) {
                    return product.id === item.product.id;
                });
            },

            addProduct: function(product) {

                if (this.existsProduct(product)) {
                    return;
                }

                this.items.unshift({
                    product,
                    qnt: 1
                });
                refreshTable();
            },

            removeProduct: function(id) {
                this.items = this.items.filter(function(item) {
                    return item.product.id != id;
                });
                refreshTable();
            },

            items: [],
        }

        function refreshTable() {
            products_table.clear();
            products_table.rows.add(cart.items).draw();
        }

        $('#products').on('change', function(e) {
            if (!e.target.value) {
                return;
            }

            cart.addProduct(JSON.parse(e.target.value));

            $('#products').val('').trigger('change');
        });


        $('#choose_product').on('click', 'tbody .delete-item', function(e) {
            cart.removeProduct(products_table.row($(this).parents('tr')).data().product.id);
        });


        $('#choose_product').on('click', 'tbody .edit-item', function(e) {
            let row = $(this).parents('tr');
            let data = products_table.row(row).data();
            data.qnt = '<input type="number" id="qnt_input" value="' + data.qnt + '"/>'
            products_table.row(row).data(data).invalidate();
            $('#qnt_input').focus();
        });

        $('#choose_product').on('blur', 'tbody #qnt_input', function(e) {
            let row = $(this).parents('tr');
            let data = products_table.row(row).data();
            data.qnt = Number(e.target.value) || 1;
            products_table.row(row).data(data).invalidate();
        });

        function submitCart(event) {
            if (!cart.items.length) {
                return;
            }
            $('#cart').val(JSON.stringify(cart.items));
            $(event.target).parents('form').submit();
        }
    </script>
@endpush
