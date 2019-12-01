<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Acount</title>

	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js" type="text/javascript" charset="utf-8" async defer></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.css">

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
				
				@include('user_auth')

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
						<div class="messages"></div>
						<div class="account-wall">
							<div class="tab-content">
								<div id="login" class="tab-pane active">
									<h2 class="text-center login-title">Fotobook Login</h2>
									<img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120" alt="">

									@include('error')

									<div>
										@if(Session::get('thongbaoerror'))
											<script>
												setTimeout(function() {
													Swal.fire({
													  icon: 'error',
													  title: 'Oops...',
													  text: '{{ Session::get('thongbaoerror') }}',
													})
												},500);
											</script>
										@endif
										@if(Session::get('thongbao_activesuccess'))
											<script>
												setTimeout(function() {
													Swal.fire(
													  'Congratulations <3',
													  '{{ Session::get('thongbao_activesuccess') }}',
													  'success'
													)
												},500);
											</script>
										@endif
									</div>
									<form class="form-login" method="post" action="{{ url('/login/checkLogin') }}" id="form-login">
										{{ csrf_field() }}
										<input type="Email" name="email" id="email" class="form-control input-log" placeholder="Email" required autofocus>
										<input type="password" name="password" id="password" class="form-control input-log" placeholder="Password" required>
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

								<div id="signup" class="tab-pane">
									<h2 class="text-center login-title">Fotobook Signup</h2>

									@include('error')

									<div>
										@if(Session::get('thongbao_register'))
											<script>
												setTimeout(function() {
													Swal.fire({
														  icon: 'error',
														  title: 'Oops...',
														  text: '{{ Session::get('thongbao_register') }}',
														})
												},500);
											</script>
										@endif

										@if(Session::get('thongbao_registersuccess'))
											<script>
												setTimeout(function() {
													Swal.fire(
													  'Congratulations <3',
													  '{{ Session::get('thongbao_registersuccess') }}',
													  'success'
													)
												},500);
											</script>
										@endif
									</div>
									<form class="form-signin" method="post" action="{{ url('/login/register') }}" id="form-register">
										{{ csrf_field() }}
										<label class="label-signup">Email</label>
										<input type="Email" name="emailre" id="emailre" class="form-control" placeholder="example@gmail.com" required autofocus>
										<label class="label-signup">First Name &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</label>
										<input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name" required>
										<label class="label-signup">Last Name &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</label>
										<input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name" required>
										<label class="label-signup">New Password &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</label>
										<input type="password" name="passwordre" id="passwordre" class="form-control" placeholder="******" required>
										<label class="label-signup">Password Confirmation</label>
										<input type="password" name="passconfirm" id="passconfirm" class="form-control" placeholder="******" required>
										<input type="submit" class="btn btn-lg btn-primary btn-block w-50 btn-login" value="Sign Up">
										{{-- <button class="btn btn-lg btn-primary btn-block w-50 btn-login" type="submit">Signup</button> --}}
									</form>					              
								</div>

								<div id="forgot" class="tab-pane">
									<h2 class="text-center login-title">Forgot password</h2>

									@include('error')

									@if(Session::get('thongbao_forgot'))
										<script>
											setTimeout(function() {
												Swal.fire({
													  icon: 'error',
													  title: 'Oops...',
													  text: '{{Session::get('thongbao_forgot')}}',
													})
											},500);
										</script>
									@endif
									<div>
										@if(Session::get('thongbao_forgotsuccess'))
											<script>
												setTimeout(function() {
													Swal.fire(
													  'Congratulations <3',
													  '{{ Session::get('thongbao_forgotsuccess') }}',
													  'success'
													)
												},500);
											</script>
										@endif
									</div>
									<form class="form-signin" method="post" action="{{ url('/password/reset')}}">
										{{ csrf_field() }} 
										<label>Enter your valid Email</label>
										<input type="text" class="form-control" placeholder="Email" required autofocus name="email_reset">
										<input class="btn btn-lg btn-primary btn-block w-50 btn-login" type="submit" value="Recovery">
									</form>					              
								</div>
							</div>
							<div class="text-center mt-2">
								<ul class="list-inline mb-0" id="myTab">
									<li class="mt-2">
										<a class="text-muted " href="#login" data-toggle="tab" onclick="location.reload(true); ">Login</a>
									</li>
									<li class="mt-2">
										<a class="text-muted" href="#forgot" data-toggle="tab" onclick="location.reload(true); ">Forgot password</a>
									</li>
									<li class="mt-2">
										<a class="text-muted" href="#signup" data-toggle="tab" onclick="location.reload(true); ">Create an account</a>
									</li>
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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
		
		<script >
			$('#form-login').validate({
				rules:{
					email:{
						required:true,
						email:true
					},
					password:{
						required:true,
						minlength:6,
						maxlength:64
					}
				},
				messages:{
					email:{
						required:"Please enter email",
						email:"Please enter the correct email"
					},
					password:{
						required:"Please enter password",
						minlength:"Please enter more than 5 characters",
						maxlength:"Please enter less than 65 characters"
					}
				}
			});

			$('#form-register').validate({
				rules:{
					emailre:{
						required:true,
						email:true
					},
					firstname:{
						required:true,
						maxlength:25
					},
					lastname:{
						required:true,
						maxlength:25
					},
					passwordre:{
						required:true,
						minlength:6,
						maxlength:64
					},
					passconfirm:{
						required:true,
						minlength:6,
						maxlength:64
					}
				},
				messages:{
					emailre:{
						required:"Please enter email",
						email:"Please enter the correct email"
					},
					firstname:{
						required:"Please enter firstname",
						maxlength:"Please enter firstname less than 25 characters"
					},
					lastname:{
						required:"Please enter lastname",
						maxlength:"Please enter lastname less than 25 characters"
					},
					passwordre:{
						required:"Please enter password",
						minlength:"Please enter more than 5 characters",
						maxlength:"Please enter less than 65 characters"
					},
					passconfirm:{
						required:"Please enter password confirm",
						minlength:"Please enter more than 5 characters",
						maxlength:"Please enter less than 65 characters"
					}
				}
			});
		</script>
		<script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
	</body>
	</html>