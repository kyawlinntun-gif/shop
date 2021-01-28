@extends('app')

@section('content')
    <div class="col-lg-12">
        <h1>New Product</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ url('/products') }}" method="POST" enctype='multipart/form-data'>
            @csrf
            Name: <br>
            <input type="text" class="form-control" value="{{ old('name') }}" name="name">
            <br><br>

            Price ($): <br>
            <input type="number" step="0.01" class="form-control" name="price" value="{{ old('price') }}">
            <br><br>

            Description: <br>
            <textarea name="description" class="form-control" cols="30" rows="10">{{ old('description') }}</textarea>
            <br><br>

            Category Id: <br>
            <select name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                    @if (old('category_id'))
                        @if ($category->id == old('category_id'))
                            selected
                        @endif
                    @endif    
                    >{{ $category->name }}</option>
                @endforeach
            </select>
            <br><br>

            Photo: <br>
            <input type="file" name="photo">
            <br><br>

            <button type="submit" class="btn btn-primary">Save</button>
            <br><br>
        </form>
    </div>
@endsection