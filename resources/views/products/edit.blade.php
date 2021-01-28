@extends('app')

@section('content')
    <div class="col-lg-12">
        <h1>Product Edit</h1>
        
        <form action="{{ url('/products/' . $product->id) }}" method="POST" enctype='multipart/form-data'>
            @csrf
            @method('put')
            Name: <br>
            <input type="text" class="form-control" value="{{ old('name') ? old('name') : $product->name }}" name="name">
            <br><br>

            Price ($): <br>
            <input type="number" step="0.01" class="form-control" name="price" value="{{ old('price') ? old('price') : $product->price }}">
            <br><br>

            Description: <br>
            <textarea name="description" class="form-control" cols="30" rows="10">{{ old('description') ? old('description') : $product->description }}</textarea>
            <br><br>

            Category Id: <br>
            <select name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                    @if ($product->category_id)
                        @if ($category->id == $product->category_id)
                            selected
                        @endif
                    @elseif(old('category_id'))
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

            <button type="submit" class="btn btn-primary">Update</button>
            <br><br>
        </form>
    </div>
@endsection