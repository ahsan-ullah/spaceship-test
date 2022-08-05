<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    </head>
    <body class="antialiased">
        <div class="container py-4 px-3 mx-auto">
            <div class="row">
                <div class="col-md-12">
                    <div class="card text-center">
                        <div class="card-header">
                          <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item">
                              <a class="nav-link" href="{{ route('stores.index') }}">Shop</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link active" href="{{ route('orders.index') }}">Orders</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="{{ route('stores.create') }}">Get Shop from Source</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('orders.create') }}">Get Orders from Source</a>
                              </li>
                          </ul>
                        </div>
                        <div class="card-body">
                            <table class="table table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Seller ID</th>
                                        <th>Message Type</th>
                                        <th>Site</th>
                                        <th>Status [Data]</th>
                                        <th>Trede Order Number [Data]</th>
                                        <th>Trade Order Line ID [More Data]</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $key => $order)                                    
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->seller_id }}</td>
                                            <td>{{ $order->message_type }}</td>
                                            <td>{{ $order->site }}</td>
                                            <td>{{ $order->orderDetails->status }}</td>
                                            <td>{{ $order->orderDetails->trade_order_id }}</td>
                                            <td>{{ $order->orderDetails->trade_order_line_id }}</td>
                                            <td>{{ date('d M Y', strtotime($order->created_at)) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                      </div>
                </div>
            </div>
            
        </div>
    </body>
</html>
