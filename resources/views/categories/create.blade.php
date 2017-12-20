@extends('layouts.main')

@section('content')
    <div class="col-sm-9 blog-main">
        <h1>Create New Category</h1>
        <form action="{{ url('/categories') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="name" name="name" value="">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection