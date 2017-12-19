@extends('layouts.main')

@section('content')
    <div class="col-sm-9 blog-main">
        <h1>Edit Article</h1>
        <form action="{{ url('articles/' . $article->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" placeholder="title" name="title" value="{{ $article->title }}">
            </div>
            <div class="form-group">
                <label for="body">Text:</label>
                <textarea class="form-control" id="body" placeholder="body" name="body">{!! $article->body !!}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update article</button>
        </form>
    </div>
@endsection