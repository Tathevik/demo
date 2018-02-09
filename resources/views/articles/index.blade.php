@extends('layouts.main')

@section('content')
    @if(session('message'))
        <div class="alert alert-success" role="alert">
            {{session('message')}}
        </div>
    @endif
    <h1 class="my-4">All articles</h1>


    <table id="articles_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
        @include('articles.table')
    </table>

    {{$articles->render()}}



    {{-- @foreach($articles as $article)
       <div class="card mb-4">
           <div class="card-body">
               <h2 class="card-title">
                   <a href="{{ url('/articles/' . $article->id) }}" >{{ $article->title }}</a>
               </h2>
               <p class="card-text">{{ $article->body }}</p>
               @haslikes((object) $article)
                   <p class="card-text">likes-{{ $article->reviews->likes() }}</p>
               @endhaslikes

               @hasmoreDislikesThenLikes((object) $article)
                   <p class="card-text">dislike-{{ $article->reviews->dislikes() }}</p>
               @endhasmoreDislikesThenLikes
           </div>
       </div>
   @endforeach --}}




@endsection