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
                              <a class="nav-link active" href="{{ route('stores.index') }}">Shop</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="{{ route('orders.index') }}">Orders</a>
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
                                        <th>Shop ID</th>
                                        <th>Shop Code</th>
                                        <th>Status</th>
                                        <th>Message</th>
                                        <th>Address [More Data]</th>
                                        <th>Contact Person [More Data]</th>
                                        <th>Contact Number [More Data]</th>
                                        <th>Contact Email [More Data]</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stores as $key => $store)                                    
                                        <tr>
                                            <td>{{ $store->id }}</td>
                                            <td>{{ $store->shop_id }}</td>
                                            <td>{{ $store->code }}</td>
                                            <td>{{ $store->status }}</td>
                                            <td>{{ $store->message }}</td>
                                            <td>{{ $store->storeDetails->address }}</td>
                                            <td>{{ $store->storeDetails->conatact_person }}</td>
                                            <td>{{ $store->storeDetails->conatact_number }}</td>
                                            <td>{{ $store->storeDetails->conatact_email }}</td>
                                            <td>{{ date('d M Y', strtotime($store->created_at)) }}</td>
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
