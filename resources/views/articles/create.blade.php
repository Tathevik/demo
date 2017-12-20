@extends('layouts.main')

@section('content')
    <div class="col-sm-9 blog-main">
        <h1>Create New Article</h1>
        <form action="{{ url('/articles') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" placeholder="title" name="title" value="">
            </div>
            <div class="form-group">
                <label for="body">Text:</label>
                <textarea class="form-control" id="body" placeholder="body" name="body"></textarea>
            </div>
            <select class="multiple-tags" name="categories[]" multiple="multiple">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.multiple-tags').select2();
        });
    </script>
@endsection

