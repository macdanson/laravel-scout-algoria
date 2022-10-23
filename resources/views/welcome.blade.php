<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Algolia Scout Full Text Search Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{ route('createProduct') }}" autocomplete="off">
                @if(count($errors))
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Error occured
                        <br/>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="product_name" class="d-none">Product</label>
                            <input type="text" id="product_name" name="name" class="form-control"
                                   placeholder="Enter Name" value="{{ old('name') }}">
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <button class="btn btn-outline-danger">Add Product</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>


        <div class="col-md-6">
            <form method="GET" action="{{ route('products') }}">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" name="product_search" class="form-control"
                                   placeholder="Search by name" value="{{ old('product_search') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <button class="btn btn-success">Search</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <div class="panel panel-primary mt-4">
        <div class="panel-heading mb-2"><strong>Maange products:</strong></div>
        <table class="table text-center">
            <thead>
            <th>#Id</th>
            <th>Name</th>
            <th>Create Date</th>
            <th>Updated Date</th>
            </thead>
            <tbody>
            @if($products->count())
                @foreach($products as $key => $product)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->created_at }}</td>
                        <td>{{ $product->updated_at }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">There are no data.</td>
                </tr>
            @endif
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
</div>
</body>
</html>
