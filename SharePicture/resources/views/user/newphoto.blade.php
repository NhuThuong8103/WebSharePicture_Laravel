@extends('user.home')

@section('title','New Photo')

@section('style')
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<link href="{{ URL::asset('css/pagination.css') }}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
	<link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
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
@endsection

@section('script')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
	<script type="text/javascript" src="{{ URL::asset('js/pagination.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
@endsection
