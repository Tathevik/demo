<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="_token" content="{{ csrf_token() }}" />

	<title>
		Article 
	</title>

	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/top-nav.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
@include('partials.top-nav')
<div class="container">
	 <div class="row">
        <div class="col-md-8">
            @yield('content')
        </div>
        <div class="col-md-4">
            @include('partials.sidebar')
        </div>
	</div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="js/sort.js"></script>

@yield('scripts')

</body>
</html>