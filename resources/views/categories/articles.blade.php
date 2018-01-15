@extends('layouts.main')

@section('content')
    <h1 class="my-4">Articles in specified category</h1>
    @foreach($categoriesArticles as $article)
        <div class="card mb-4">
            <div class="card-body">
                <a href="{{ url('/articles/'. $article->id) }}" >{{ $article->title }}</a>
            </div>
        </div>
    @endforeach
@endsection