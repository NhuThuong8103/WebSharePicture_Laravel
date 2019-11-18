<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Acount</title>

	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/style.css')}}">


	<link rel="stylesheet" href="{{URL::asset('css/main_login.css')}}"> 


	<link rel="stylesheet" href="{{URL::asset('css/animate.css')}}">

</head>
<body>
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
					<!-- <div class="name-user">
						<a href="google.com" title="Trang ca nhan">
							<span class="icon-user">
								Nhu Thuong
							</span>
							<img src="image/icon-user.jpg" class="boder-icon">
						</a>
					</div> -->
				</div>
				<div class="col-lg-1 col-md-1 d-none d-md-block">
					<div class="logout-acount">
						<a href="{{ url('/login')}}" title="Logout">
							<span class="link-log">Login</span>
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
							<li>Hello <3 </li>
								<li>Sign In</li>
								<li>Sign Up With Facebook</li>
								<li>Sign Up With Facebook</li>
								<li>Create An Account</li>
								<li>Forgot Password</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="backdrop"></div>
			</header>
			<section>
				<div class="container">
					<div class="row">
						<div class="col-1 col-sm-2 col-md-3 col-lg-4"></div>
						<div class="col-10 col-sm-8 col-md-6 col-md-offset-4 col-lg-4">
							<div class="account-wall">
								<div class="tab-content">
									@if(Session::get('kt')==''  || Session::get('kt')=='login' )
										<div id="login" class="tab-pane active">
									@else
										<div id="login" class="tab-pane">
									@endif
									
										<h2 class="text-center login-title">Fotobook Login</h2>
										<img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120" alt="">
										@if(Session::get('kt')=='login')
											@include('error')
										@endif
										<div>
											@if(Session::get('thongbaoerror'))
											<div class="alert alert-danger">
												<button type="button" class="close" data-dismiss="alert">x</button>
												<strong>{{ Session::get('thongbaoerror') }}</strong>
											</div>
											@endif
											@if(Session::get('thongbao_activesuccess'))
											<div class="alert alert-success">
												<button type="button" class="close" data-dismiss="alert">x</button>
												<strong>{{ Session::get('thongbao_activesuccess') }}</strong>
											</div>
											@endif
										</div>
										<form class="form-login" method="post" action="{{ url('/login/checkLogin') }}">
											{{ csrf_field() }}
											<input type="Email" name="email" class="form-control input-log" placeholder="Email" required autofocus>
											<input type="password" name="password" class="form-control input-log" placeholder="Password" required>
											<!-- <input class="btn btn-lg btn-primary btn-block w-50 btn-login" type="submit">Sign in</button> -->	
											<input type="submit" class="btn btn-lg btn-primary btn-block w-50 btn-login" value="Sign In">			
											<div class="text-info-login text-center mt-3">
												<span class="text-center mt-2">Or Sign up Using</span>
											</div>					                		
											<div class="icon-login mt-3 text-center">
												<a href="feedsAlbum.html"><i class="fab fa-facebook"></i></a>
												<a href="#"><i class="fab fa-google-plus"></i></a>
											</div>
										</form>
									</div> 

									@if( Session::get('kt')=='register' )
										<div id="signup" class="tab-pane active">
									@else
										<div id="signup" class="tab-pane">
									@endif
										<h2 class="text-center login-title">Fotobook Signup</h2>
										@if(Session::get('kt')=='register')
											@include('error')
										@endif
										<div>
											@if(Session::get('thongbao_register'))
											<div class="alert alert-danger">
												<button type="button" class="close" data-dismiss="alert">x</button>
												<strong>{{ Session::get('thongbao_register') }}</strong>
											</div>
											@endif
											
											@if(Session::get('thongbao_registersuccess'))
											<div class="alert alert-success">
												<button type="button" class="close" data-dismiss="alert">x</button>
												<strong>{{ Session::get('thongbao_registersuccess') }}</strong>
											</div>
											@endif
										</div>
										<form class="form-signin" method="post" action="{{ url('/login/register') }}">
											{{ csrf_field() }}
											<label class="label-signup">Email</label>
											<input type="Email" name="emailre" class="form-control" placeholder="example@gmail.com" required autofocus>
											<label class="label-signup">First Name</label>
											<input type="text" name="firstname" class="form-control" placeholder="First Name" required>
											<label class="label-signup">Last Name</label>
											<input type="text" name="lastname" class="form-control" placeholder="Last Name" required>
											<label class="label-signup">New Password</label>
											<input type="password" name="password" class="form-control" placeholder="******" required>
											<label class="label-signup">Password Confirmation</label>
											<input type="password" name="passconfirm" class="form-control" placeholder="******" required>
											<input type="submit" class="btn btn-lg btn-primary btn-block w-50 btn-login" value="Sign Up">
											{{-- <button class="btn btn-lg btn-primary btn-block w-50 btn-login" type="submit">Signup</button> --}}
										</form>					              
									</div>

									<div id="forgot" class="tab-pane">
										<h2 class="text-center login-title">Forgot password</h2>
										<form class="form-signin" method="post">
											<label>Enter your valid Email</label>
											<input type="text" class="form-control" placeholder="Email" required autofocus>
											<button class="btn btn-lg btn-primary btn-block w-50 btn-login" type="submit">Recovery</button>
										</form>					              
									</div>
								</div>

								<div class="text-center mt-2">
									<ul class="list-inline mb-0">
										<li class="mt-2">
											<a class="text-muted" href="#login" data-toggle="tab">Login</a></li>
										<li class="mt-2">
											<a class="text-muted" href="#forgot" data-toggle="tab">Forgot password</a></li>
										<li class="mt-2">
											<a class="text-muted" href="#signup" data-toggle="tab">Create an account</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-1 col-sm-2 col-md-3 col-lg-4"></div>
					</div>
				</div>
			</section>

			<footer>

			</footer>

			<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->

			<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>

			<script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
		</body>
		</html>