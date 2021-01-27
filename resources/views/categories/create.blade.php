@extends('app')

@section('content')
    <div class="col-lg-12">
        <h1>New Category</h1>
        
        <form action="{{ url('/categories') }}" method="POST">
            @csrf
            Name: <br>
            <input type="text" class="form-control" value="{{ old('name') }}" name="name">
            <br><br>
            <button type="submit" class="btn btn-primary">Save</button>
            <br><br>
        </form>
    </div>
@endsection