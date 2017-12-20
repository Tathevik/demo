@extends('layouts.main')


@section('content')
    <div class="col-sm-9">
        <br>
        <h1>Edit Category</h1>
        <hr>
        <form action="{{ url('categories/'. $category->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{$category->name}}">
            </div>
            <button type="submit" class="btn btn-default">Update</button>
        </form>
    </div>
@endsection