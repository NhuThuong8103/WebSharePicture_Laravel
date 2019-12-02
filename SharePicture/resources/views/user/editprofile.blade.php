@extends('user.home')

@section('title','Edit Profile')
@section('style')
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<link href="{{ URL::asset('css/pagination.css') }}" rel="stylesheet" type="text/css">
	<link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.4.0/dist/sweetalert2.all.min.js" type="text/javascript" charset="utf-8" async defer></script>
@endsection
@section('content')
	<div class="row pt-3">
		<div class="col-12">
			<div class="main-title mt-2">
				<h5>Edit Profile</h5>
			</div>
			<hr class="border-below mt-5">
		</div>
	</div>
	<div class="row pt-2">
		<div class="col-lg-12">
			<div>
				@include('error')
				@if(Session::get('thongbao'))
					<script>
						setTimeout(function() {
					        Swal.fire({
					            title: "Congratulations <3",
					            text: "{{ Session::get('thongbao') }}",
					            icon: "success"
					        }, function() {
					            location.reload(true);
					        });
					    }, 500);
					</script>
				@endif
				@if(Session::get('thongbaofail'))
					<script>
						setTimeout(function() {
					        Swal.fire({
					            title: "Oop...",
					            text: "{{ Session::get('thongbaofail') }}",
					            icon: "error"
					        });
					    }, 500);
					</script>
				@endif
			</div>
			<form action="{{ route('usereditinfo')}}" method="post" id="form-basic-info">
				{{ csrf_field() }}
				<table class="tb-basic-info" width="100%">
					<tr>
						<td class="basic-info"></td>
						<td>
							<div id="change">
								<div class="image" style="background-image: url('{{ URL::asset('image/avatar.png') }}')"></div>
								<input class="img" type="hidden" name="ValueImageUser" value="">
								<input class="img" type="hidden" name="avatarImageUser" value="avatar.png">
								<a href="#" class="btn-overlay btn btn-default">
									Change
								</a>
							</div>
						</td>
					</tr>
					<tr>
						<td>
						</td>
						<td class="float-left">
							<h6 class="title">Basic Infomation</h6>
							
						</td>
					</tr>
					<tr>
						<td class="float-right mr-3 pt-2">
							<h6>First Name</h6>
						</td>
						<td>
							<input type="text" name="firstname" class="form-control" placeholder="First Name" value="{{ Auth::user()->ten }}" required>
						</td>
					</tr>
					<tr>
						<td class="float-right mr-3 pt-2">
							<h6>Last Name</h6>
						</td>
						<td>
							<input type="text" name="lastname" class="form-control" placeholder="Last Name" value="{{ Auth::user()->ho }}" required>
						</td>
					</tr>
					<tr>
						<td class="float-right mr-3 pt-2">
							<h6>Email</h6>
						</td>
						<td>
							<input type="email" name="email" class="form-control" placeholder="someone@example.com" value="{{ Auth::user()->email }}" required>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<a href="#">
								<input type="submit" value="Save" class="btn btn-primary float-left">
							</a>
						</td>
					</tr>
				</table>
			</form>

			<form action="{{ route('usereditpassword')}}" method="post" class="mt-5 mb-5" id="form-password">
				{{ csrf_field() }}
				<table class=" tb-basic-info" width="100%">
					<tr>
						<td class="basic-info">
						</td>
						<td class="float-left">
							<h6 class="title">Password</h6>
							
						</td>
					</tr>
					<tr>
						<td class="float-right mr-3 pt-2">
							<h6>Current Password</h6>
						</td>
						<td>
							<input type="password" name="password" class="form-control" placeholder="******" required>
						</td>
					</tr>
					<tr>
						<td class="float-right mr-3 pt-2">
							<h6>New Password</h6>
						</td>
						<td>
							<input type="password" name="newpassword" id="new-password" class="form-control" placeholder="******" required>
						</td>
					</tr>
					<tr>
						<td class="float-right mr-3 pt-2">
							<h6>Password Confirmation</h6>
						</td>
						<td>
							<input type="password" name="passwordconfirm" id="password-confirm" class="form-control" placeholder="******" required>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<a href="#">
								<input type="submit" id="submit-password" value="Save" class="btn btn-primary float-left">
							</a>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
@endsection

@section('script')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
	<script type="text/javascript" src="{{ URL::asset('js/pagination.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
	<script>
		$(document).ready(function() {
			$('#form-basic-info').validate({
				rules:{
					firstname:{
						required:true,
						maxlength:25,
					},
					lastname:{
						required:true,
						maxlength:25
					},
					email:{
						required:true,
						email:true
					}
				},
				messages:{
					firstname:{
						required:"Please enter firstname",
						maxlength:"Please enter firstname less than 25 characters"
					},
					lastname:{
						required:"Please enter lastname",
						maxlength:"Please enter lastname less than 25 characters"
					},
					email:{
						required:"Please enter email",
						email:"Please enter the correct email"
					}
				}
			});

			$('#form-password').validate({
				rules:{
					password:{
						required:true,
						minlength:6,
						maxlength:64
					},
					newpassword:{
						required:true,
						minlength:6,
						maxlength:64
					},
					passwordconfirm:{
						required:true,
						minlength:6,
						maxlength:64
					}
				},
				messages:{
					password:{
						required:"Please enter current password",
						minlength:"Please enter current more than 5 characters",
						maxlength:"Please enter current password less than 65 characters"
					},
					newpassword:{
						required:"Please enter new password",
						minlength:"Please enter new password more than 5 characters",
						maxlength:"Please enter new password less than 65 characters"
					},
					passwordconfirm:{
						required:"Please enter password confirmation",
						minlength:"Please enter password confirm more than 5 characters",
						maxlength:"Please enter password confirm less than 65 characters"
					}
				}
			});

			$('#submit-password').click(function(event) {
				/* Act on the event */
				var password=$('#new-password').val();
				var passwordconfirm=$('#password-confirm').val();
				if(passwordconfirm != password){
					setTimeout(function() {
						Swal.fire({
				            title: "Oop...",
				            text: "The password confirm must be similar to the new password!",
				            icon: "error"
				        });
			         }, 500);
				}
			});
		});
	</script>
@endsection
