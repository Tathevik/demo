@extends('layouts.main')

@section('content')
    <div class="col-sm-9 blog-main">
        <h1>Edit Article</h1>
        <form action="{{ url('articles/'. $article->id) }}" method="POST">
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
            <select class="multiple-tags" name="categories[]" multiple="multiple" style="width:100%">
                @foreach($article->categories as $category)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @endforeach
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Update article</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.multiple-tags').select2();
        });
    </script>
@endsection