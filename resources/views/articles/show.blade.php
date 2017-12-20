@extends('layouts.main')

@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title">
                <a href="{{ url('/articles/'.$article->id.'/edit') }}" class="btn btn-primary">{{ $article->title }}</a>  
            </h2>
            <p class="card-text">{{ $article->body }}</p>
            <form action="{{ url('articles/'.$article->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <p class="card-title">
            </p>
        </div>
         <div class="col-md-9">
            <h3>Categories: </h3>
            @foreach($categories as $category)
                <a href="{{ url('/categories/'.$category->id.'/articles') }}">{{ $category->name }}</a>
            @endforeach
        </div>
        <div class="container">
        <h2>Comments</h2>
        <div class="card-text">
            <ul class="list-group">
                @foreach($comments as $comment)
                    <li >
                        {{ $comment->body }}
                    </li>
                @endforeach
            </ul>
        </div>
        <br>
        <form action="{{ url('/articles/'. $article->id .'/comments') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <textarea name="body" rows="5" id="comment" placeholder="Your Comment"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Comment</button>
        </form>
    </div>
    </div>
@endsection