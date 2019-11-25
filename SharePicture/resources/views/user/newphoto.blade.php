<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>New Photos</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<!-- <link rel="stylesheet" href="css/pagination.css"> -->
	<link href="{{ URL::asset('css/pagination.css') }}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
	<link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css">
</head>
<body id="new-photo">
	<header>
		<div class="container">
			<div class="row p-1">
				<div class="col-lg-2 col-md-3 col-sm-4 col-4">
					<div class="logo-head">
						<span class="title-header">Fotobook</span>
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
							<img src="{{ URL::asset('image/icon-user.jpg') }}" class="boder-icon">
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
								<li>Feeds</li>
								<li>My Photos</li>
								<li>My Albums</li>
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
									<li>Feeds</li>
									<li>My Photos</li>
									<li>My Albums</li>
								</ul>
							</div>
						</div>
						<div class="col-lg-8 col-md-12 col-sm-12 col-12 bg-white">
							<div class="row pt-3">
								<div class="col-12">
									<div class="main-title mt-2">
										<h5>New Photo</h5>
									</div>
									<hr class="border-below mt-5">
								</div>
							</div>
							<div class="row pt-2">
								<div class="col-lg-6">
									<h6>Title</h6>
									<input type="text" class="form-control" placeholder="Hôm nay trời đẹp quá hihi" required>
									<br>
									<div class="d-lg-none">
										<h6>Description</h6>
										<textarea class="form-control" rows="5" placeholder="Bau troi that xanh <3" required></textarea>
									</div>
									<br>
									<h6>Sharing mode</h6>
									<select name="" id="" class="form-control control-select">
										<option value="1">Public</option>
										<option value="2">Private</option>
									</select>
									<div class="upload-images">
										<div class="pic">
											add image <i class="fas fa-cloud-upload-alt"></i>
										</div>
									</div>
									<div class="group-btn">
										<a href="#" class="btn btn-primary">
											<i class="fas fa-save mr-2"></i>Save
										</a>
									</div>
								</div>
								<div class="col-lg-6 d-none d-lg-block">
									<h6>Description</h6>
									<textarea class="form-control" rows="5" placeholder="Bau troi that xanh <3" required></textarea>
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
				<script src="js/pagination.js"></script>
				<script src="js/main.js"></script>
			</body>
			</html>