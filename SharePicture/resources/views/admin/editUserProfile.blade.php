@extends('admin.home')

@section('title','Edit User Profile')

@section('style')
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.4.0/dist/sweetalert2.all.min.js" type="text/javascript" charset="utf-8" async defer></script>
	
@endsection

@section('content')
	<div class="row pt-3">
		<div class="col-12">
			<div class="main-title mt-2">
				<h5>Edit User Profile </h5>
			</div>
			<div class="back-btn">
				<a href="{{ route('managerUserProfile') }}" class="btn btn-primary">
					<i class="fas fa-backward mr-2"></i>Back
				</a>
			</div>
			<hr class="border-below mt-5">
		</div>
	</div>
	<div class="row pt-2">
		<div class="col-lg-12">
				@if(Session::get('thongbaosaveUserProfile'))
					<script>
						setTimeout(function() {
					        Swal.fire({
					            title: "Congratulations <3",
					            text: "{{ Session::get('thongbaosaveUserProfile') }}",
					            icon: "success"
					        }, function() {
					            location.reload(true);
					        });
					    }, 500);
					</script>
				@endif
			<form action="{{ url('/admin/managerUsers/edit/save') }}" method="post" id="formUserProfile">
				{{ csrf_field() }}
				<table class=" tb-basic-info" width="100%">
					<tr>
						<td class="basic-info"></td>
						<td>
							<div id="change-avatar">
								<div class="image" style="background-image: url('https://drive.google.com/uc?export=view&id={{$path}}')"></div>
								<input class="img" type="hidden" name="ValueImageUser" value="{{ $data }}">
								<input class="img" type="hidden" name="avatarImageUser" value="{{ $filename }}">
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
							<input type="hidden" name="idUser" value="{{ $user->id }}">
							<input type="text" name="firstname" class="form-control" placeholder="First Name" value="{{ $user->ten }}" required>
						</td>
					</tr>
					<tr>
						<td class="float-right mr-3 pt-2">
							<h6>Last Name</h6>
						</td>
						<td>
							<input type="text" name="lastname" class="form-control" placeholder="Last Name" value="{{ $user->ho }}" required>
						</td>
					</tr>
					<tr>
						<td class="float-right mr-3 pt-2">
							<h6>Email</h6>
						</td>
						<td>
							<input type="email" name="email" class="form-control" placeholder="someone@example.com" value="{{ $user->email }}" required>
						</td>
					</tr>
					<tr>
						<td class="float-right mr-3 pt-2">
							<h6>Password</h6>
						</td>
						<td>
							<input type="password" name="password" class="form-control" placeholder="******" required>
						</td>
					</tr>
					<tr>
						<td class="float-right mr-3 pt-2">
							<h6>Active?</h6>
						</td>
						<td>
							@if( $user->phephoatdong)
								<input type="checkbox" name="ckactive" value="1" class="float-left" checked="true">
							@else
								<input type="checkbox" name="ckactive" value="0" class="float-left" >
							@endif
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<a href="#">
								<input type="submit" name="btnSave" value="Save" class="btn btn-primary float-left">
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

	<script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
	<script>
		$(document).ready(function() {
			$('#formUserProfile').validate({
				rules:{
					firstname:{
						required:true,
						maxlength:25,
					},
					lastname:{
						required:true,
						maxlength:25,
					},
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
					},
					password:{
						required:"Please enter password",
						minlength:"Please enter more than 5 characters",
						maxlength:"Please enter less than 65 characters"
					}
				}
			});
		});
	</script>
@endsection