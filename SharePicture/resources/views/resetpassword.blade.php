<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reset Password</title>


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
							<div id="reset">
					            <h2 class="text-center login-title">Reset password</h2>					            
					            <div>
					            	<img class="profile-img" src="https://www.iconsdb.com/icons/preview/color/CCCCCC/key-xxl.png" alt="">
					            </div>
					            <div id="thongbao_reset">
									@if(Session::get('thongbaoerror'))
									<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert">x</button>
										<strong>{{ Session::get('thongbao_resetorror') }}</strong>
									</div>
									@endif
									@if(Session::get('thongbao_resetsuccess'))
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">x</button>
										<strong>{{ Session::get('thongbao_resetsuccess') }}</strong>
									</div>
									@endif
								</div>
								<!-- <div id="loading_reset">

								</div> -->
					            <form class="form-reset" method="post" action="{{url('/password/reset_success')}}">
					            	{{ csrf_field() }}
					            	<!-- <div class="form-group"> -->
					            	<input type="email" class="form-control" value="{{ $email }}" readonly name="email_reset">
							        <input type="password" class="form-control" placeholder="New password" required autofocus name="new_password">
							        <input type="password" class="form-control" placeholder="Password Confirm" required name="confirm_password">
							    <!-- </div> -->
					                <input class="btn btn-lg btn-primary btn-block w-50 btn-reset" type="submit" value="Reset" id="reset_button" />				
					            </form>
					        </div>
					    </div>					    
					</div>
		        </div>
		        <div class="col-1 col-sm-2 col-md-3 col-lg-4"></div>
		    </div>
		</div>
	</section>

		<footer>
		
	</footer>

	<script src="js/jquery.js"></script>

    <script src="js/bootstrap.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>

    <script type="text/javascript" src="js/main.js"></script>
	
</body>
</html>