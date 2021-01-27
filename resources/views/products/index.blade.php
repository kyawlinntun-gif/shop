@extends('app')

@section('content')
    <div class="col-lg-12">
        <h1>Products</h1>
        <a href="{{ url('/products/create') }}" class="btn btn-primary">New Product</a>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <a href="{{ url('/products/' . $product->id . '/edit') }}" class="btn btn-primary">Edit</a>
                            <a href="#" class="btn btn-danger" onclick="deleteProduct({{ $product }})">Delete</a>
                            <form action="{{ url('/products/' . $product->id) }}" method="POST" style="display: none;" id="{{ 'product-delete-' . $product->id }}">
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('script')

    <script>
        function deleteProduct(product) {
            // console.log(product.id);
            event.preventDefault();
            if(confirm('Are you sure you want to delete ' + product.name))
            {
                $('#product-delete-' + product.id).submit();
            }
        }
    </script>

@endsection