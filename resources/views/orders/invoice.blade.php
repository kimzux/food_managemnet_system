<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
</head>

<body>
    <div class="col-md-7  mt-4" style="background-color:#f5f5f5;">
        <div class="p-4">
            <div class="text-center">
                <h4>invoice</h4>
            </div>
            <span class="mt-4"> Date : {{ $order->date }} </span>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p> Student Name: {{ $order->student->full_name }} </p>
                    <p> Order No: {{ $order->order_no }}</p>
                </div>
            </div>
            <div class="row">
                <table id="invoice_table" class="table">
                    <thead>
                        <tr>

                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($order->products as $orderProduct)
                            <tr>
                                <td>{{ $orderProduct->product->productName }}</td>
                                <td>{{ $orderProduct->product->productcategory }}</td>
                                <td>{{ $orderProduct->quantity }}</td>
                                <td>{{ $orderProduct->product->productPrice }}</td>
                            </tr>
                        @endforeach
                        <td class="text-right text-dark">
                            <h5><strong>Total: {{ $order->total_price }} </strong></h5>
                        </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
