@extends('layouts.main')

@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title">
                <a href="{{ url('/categories/'.$category->id.'/edit') }}" >{{ $category->name }}</a>  
            </h2>
            <form action="{{ url('categories/'.$category->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <p class="card-title">
            </p>
        </div>
    </div>
@endsection