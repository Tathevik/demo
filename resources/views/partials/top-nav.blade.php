<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    Logout {{Auth::user()->name}}
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
<div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item" href="{{ url('/articles') }}">Articles</a>
          <a class="blog-nav-item" href="{{ url('/articles/create') }}">Create Articles</a>
          <a class="blog-nav-item" href="{{ url('/categories') }}">Categories</a>
          <a class="blog-nav-item" href="{{ url('/categories/create') }}">Create Categories</a>
        </nav>
      </div>
 </div>