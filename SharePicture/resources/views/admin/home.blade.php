<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Manage Photos</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<link rel="stylesheet" href="{{ URL::asset('css/pagination.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/style.css')}}">
</head>
<body id="manage-photo">
	<header>
		<div class="container">
			<div class="row p-1">
				<div class="col-lg-2 col-md-3 col-sm-4 col-4">
					<div class="logo-head">
						<span class="title-header">Fotobook Admin</span>
					</div>
				</div>
				<div class="col-lg-6 col-md-5 col-sm-5 col-6 pl-0">
					<form>
						<div class="form-group">
							<input type="text" class="form-control input-search" id="search-foto" placeholder="Search Photo / Album">
						</div>
					</form>
				</div>
				<div class="col-lg-3 col-md-3 d-none d-md-block">
					<div class="name-user">
						<a href="google.com" title="Trang ca nhan">
							<span class="icon-user">
								Nhu Thuong
							</span>
							<img src="{{URL::asset('image/icon-user.jpg')}}" class="boder-icon">
						</a>
					</div>
				</div>
				<div class="col-lg-1 col-md-1 d-none d-md-block">
					<div class="logout-acount">
						<a href="#" title="Logout">
							<span class="link-log">Logout</span>
						</a>
					</div>
				</div>
					<!-- <div class="col-sm-3 d-md-none d-none d-sm-block">
						<div class="name-user">
							<a href="google.com" title="Trang ca nhan">
								<img src="image/icon-user.jpg" class="boder-icon">
								<img src="image/icon-user.jpg" class="boder-icon">
							</a>
						</div>
					</div> -->
					<div class="col-2 d-md-none">
						<a href="#" title="Menu quản lý">
							<!-- <h6 style="font-size: 16px;margin-top: 2%;float: right;">menu</h6> -->
							<span class="navTrigger">
								<i></i>
								<i></i>
								<i></i>
							</span>
						</a>
						
					</div>
					<div id="menu-mobile" class="menu-lists d-md-none">
						<ul>
							<li>Hi, Nhu Thuong <3 </li>
								<li>Manage Photos </li>
								<li>Manage Albums</li>
								<li>Manage Users</li>
								<li>Sign In</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="backdrop"></div>
			</header>
			<main>
				<div class="container">
					<div class="row">
						<div class="col-lg-2 d-none d-md-block">
							<div class="sidebar">
								<ul>
									<li>Manage Photos</li>
									<li>Manage Albums</li>
									<li>Manage Users</li>
								</ul>
							</div>
						</div>
						<div class="col-lg-8 col-md-12 col-sm-12 col-12 bg-white">
							<div class="row photo-lists">
								<div class="col-lg-3 col-md-4 col-sm-6 col-6">
									<figure class="one-photo">
										<img src="{{URL::asset('image/10.jpeg')}}" alt="" class="img-thumbnail" title="Explanatory caption abccccccc.........">
										<!-- <div class="private-img">
											<h7>
												<i class="fas fa-lock"></i>
											</h7>
										</div> -->
										<figcaption>
											<h4>
												Explanatory caption abccccccc.........
												<a href="../www.facebook.com"><i class="far fa-edit"></i></a>
											</h4>
										</figcaption>
									</figure>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-6">
									<figure class="one-photo">
										<img src="{{URL::asset('image/2.jpeg')}}" alt="" class="img-thumbnail" title="Explanatory caption abccccccc.........">
										<!-- <div class="private-img">
											<h7>
												<i class="fas fa-lock"></i>
											</h7>
										</div> -->
										<figcaption>
											<h4>
												Explanatory caption abccccccc...
												<a href="facebook.com"><i class="far fa-edit"></i></a>
											</h4>
										</figcaption>
									</figure>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-6">
									<figure class="one-photo">
										<img src="{{URL::asset('image/3.jpeg')}}" alt="" class="img-thumbnail">
										<figcaption>
											<h4>
												Explanatory caption abccccccc...
												<a href="facebook.com"><i class="far fa-edit"></i></a>
											</h4>
										</figcaption>
									</figure>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-6">
									<figure class="one-photo">
										<img src="{{URL::asset('image/4.jpeg')}}" alt="" class="img-thumbnail">
										<figcaption>
											<h4>
												Explanatory caption abccccccc...
												<a href="facebook.com"><i class="far fa-edit"></i></a>
											</h4>
										</figcaption>
									</figure>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-6">
									<figure class="one-photo">
										<img src="{{URL::asset('image/5.jpeg')}}" alt="" class="img-thumbnail">
										<figcaption>
											<h4>
												Explanatory caption abccccccc...
												<a href="www.facebook.com"><i class="far fa-edit"></i></a>
											</h4>
										</figcaption>
									</figure>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-6">
									<figure class="one-photo">
										<img src="{{URL::asset('image/6.jpeg')}}" alt="" class="img-thumbnail">
										<figcaption>
											<h4>
												Explanatory caption abccccccc...
												<a href="facebook.com"><i class="far fa-edit"></i></a>
											</h4>
										</figcaption>
									</figure>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-6">
									<figure class="one-photo">
										<img src="{{URL::asset('image/11.jpeg')}}" alt="" class="img-thumbnail" >
										<figcaption>
											<h4>
												Explanatory caption abccccccc...
												<a href="facebook.com"><i class="far fa-edit"></i></a>
											</h4>
										</figcaption>
									</figure>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-6">
									<figure class="one-photo">
										<img src="{{URL::asset('image/8.jpeg')}}" alt="" class="img-thumbnail">
										<figcaption>
											<h4>
												Explanatory caption abccccccc...
												<a href="facebook.com"><i class="far fa-edit"></i></a>
											</h4>
										</figcaption>
									</figure>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-6">
									<figure class="one-photo">
										<img src="{{URL::asset('image/9.jpeg')}}" alt="" class="img-thumbnail">
										<figcaption>
											<h4>
												Explanatory caption abccccccc...
												<a href="facebook.com"><i class="far fa-edit"></i></a>
											</h4>
										</figcaption>
									</figure>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-6">
									<figure class="one-photo">
										<img src="{{URL::asset('image/11.jpeg')}}" alt="" class="img-thumbnail">
										<figcaption>
											<h4>
												Explanatory caption abccccccc...
												<a href="facebook.com"><i class="far fa-edit"></i></a>
											</h4>
										</figcaption>
									</figure>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-6">
									<figure class="one-photo">
										<img src="{{URL::asset('image/11.jpeg')}}" alt="" class="img-thumbnail"> 
										<figcaption>
											<h4>
												Explanatory caption abccccccc...
												<a href="facebook.com"><i class="far fa-edit"></i></a>
											</h4>
										</figcaption>
									</figure>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-6">
									<figure class="one-photo">
										<img src="{{URL::asset('image/11.jpeg')}}" alt="" class="img-thumbnail">
										<figcaption>
											<h4>
												Explanatory caption abccccccc...
												<a href="www.facebook.com"><i class="far fa-edit"></i></a>
											</h4>
										</figcaption>
									</figure>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-6">
									<figure class="one-photo">
										<img src="{{URL::asset('image/11.jpeg')}}" alt="" class="img-thumbnail">
										<figcaption>
											<h4>
												Explanatory caption abccccccc...
												<a href="facebook.com"><i class="far fa-edit"></i></a>
											</h4>
										</figcaption>
									</figure>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-6">
									<figure class="one-photo">
										<img src="{{URL::asset('image/11.jpeg')}}" alt="" class="img-thumbnail">
										<figcaption>
											<h4>
												Explanatory caption abccccccc...
												<a href="facebook.com"><i class="far fa-edit"></i></a>
											</h4>
										</figcaption>
									</figure>
								</div>
							</div>
						</div>
						<div class="col-lg-2">
						</div>
					</div>
				</div>
			</main>
			<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
			<script src="{{URL::asset('js/pagination.js')}}"></script>
			<script src="{{URL::asset('js/main.js')}}"></script>
			<script>
				//phaan trang 
				$("#tab").pagination({
					items: 12,
					contents: 'photo-lists',
					previous: 'Previous',
					next: 'Next',
					position: 'bottom',
				});
			</script>
		</body>
		</html>