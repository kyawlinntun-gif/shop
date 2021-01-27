@extends('app')

@section('content')
    <div class="col-lg-12">
        <h1>Category Edit</h1>
        
        <form action="{{ url('/categories/' . $category->id) }}" method="POST">
            @csrf
            @method('put')
            Name: <br>
            <input type="text" class="form-control" value="{{ $category->name ? $category->name : old('name') }}" name="name">
            <br><br>
            <button type="submit" class="btn btn-primary">Update</button>
            <br><br>
        </form>
    </div>
@endsection