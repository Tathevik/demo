@extends('layouts.main')

@section('content')
    <h1 class="my-4">All articles</h1>
    @foreach($articles as $article)
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">
                    <a href="{{ url('/articles/' . $article->id) }}" class="btn btn-primary">{{ $article->title }}</a>
                </h2>
                <p class="card-text">{{ $article->body }}</p>
            </div>
        </div>
    @endforeach
@endsection