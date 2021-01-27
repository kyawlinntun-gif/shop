@extends('app')

@section('content')
    <div class="col-lg-12">
        <h1>Categories</h1>
        <a href="{{ url('/categories/create') }}" class="btn btn-primary">New Category</a>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ url('/categories/' . $category->id . '/edit') }}" class="btn btn-primary">Edit</a>
                            <a href="#" class="btn btn-danger" onclick="deleteCategory({{ $category }})">Delete</a>
                            <form action="{{ url('/categories/' . $category->id) }}" method="POST" style="display: none;" id="{{ 'category-delete-' . $category->id }}">
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
        function deleteCategory(category) {
            // console.log(category.id);
            event.preventDefault();
            if(confirm('Are you sure you want to delete ' + category.name))
            {
                $('#category-delete-' + category.id).submit();
            }
        }
    </script>

@endsection