@extends('layouts.main')

@section('content')
    <br>
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
    </div>
@endsection