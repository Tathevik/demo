@extends('layouts.main')

@section('content')
	<h1 class="my-4">Categories</h1>
	@foreach($categories as $category)
	    <div class="card mb-4">
	        <div class="card-body">
	            <h2 class="card-title">
	                <a href="{{ url('/categories/'.$category->id) }}" class="btn btn-primary">{{ $category->name }}</a>
	            </h2>
	        </div>
	    </div>
	@endforeach
@endsection
