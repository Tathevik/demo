@extends('layouts.app')

@section('content')

<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <a class="blog-nav-item" href="{{ url('/') }}">@lang('menu.home')</a>

            <a class="blog-nav-item" href="{{ url('/') }}">@lang('menu.aboutUs')</a>
            <a class="blog-nav-item" href="{{ url('/') }}">@lang('menu.products')</a>
            <a class="blog-nav-item" href="{{ url('/') }}">@lang('menu.contactUs')</a>
        </nav>
    </div>
</div>
@endsection