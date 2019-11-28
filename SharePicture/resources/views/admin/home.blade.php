<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
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