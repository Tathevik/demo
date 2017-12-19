@extends('layouts.main')

@section('content')
    <div class="col-sm-9 blog-main">
        <h1>Create New Article</h1>
        <form action="{{ url('/articles') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" placeholder="title" name="title" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="body">Text:</label>
                <textarea class="form-control" id="body" placeholder="body" name="body">{{ old('body') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection