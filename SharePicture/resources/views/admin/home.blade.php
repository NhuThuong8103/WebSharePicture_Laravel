<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	@yield('style')
	
</head>
<body>
	@include('admin.header')
	<main>
		<div class="container">
			<div class="row">
				<div class="col-lg-2 d-none d-md-block">
					@include('admin.sidebar')
				</div>
				<div class="col-lg-8 col-md-12 col-sm-12 col-12 bg-white">
					@yield('content')
				</div>
			</main>


			@yield('script')
		</body>
		</html>