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
	<form id="form-newphoto" action="{{ route('savePhoto') }}" method="post" novalidate>{{ csrf_field() }}
	<div class="row pt-2">
		<div class="col-lg-6">
			<h6>Title</h6>
			<input type="text" class="form-control" placeholder="Hôm nay trời đẹp quá hihi" required name="tieude_photo">
			<br>
			<div class="d-lg-none">
				<h6>Description</h6>
				<textarea class="form-control" rows="5" placeholder="Bau troi that xanh <3" required name="mota_photo"></textarea>
			</div>
			<br>
			<h6>Sharing mode</h6>
			<select name="chedo_photo" id="" class="form-control control-select mode">
				<option value="1">Public</option>
				<option value="0">Private</option>
			</select>
			<input type="submit" id="save-photo" name="submit" value="Save" class="btn btn-primary submit-hidden">
		</div>
		<div class="col-lg-6 d-none d-lg-block">
			<h6>Description</h6>
			<textarea class="form-control" rows="5" placeholder="Bau troi that xanh <3" required name="mota_photo"></textarea>
		</div>
	</div>
</form>

<div class="row">
	<div class="col-lg-3 col-md-3 col-sm-6 col-6 mb-3 mt-3 pr-0">
		<form action="{{ route('dropzoneJs') }}" enctype="multipart/form-data" class="dropzone newphoto" id="fileupload" method="POST">
			@csrf
			{{ csrf_field() }}
			<div class="fallback">
				<input name="file" type="files" multiple accept="image/jpeg, image/png, image/jpg" />
			</div>
			<input type="submit" id="target-image" name="submit" value="Save" class="btn btn-primary submit-hidden">
		</form>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="group-btn mb-3">
			<input type="submit" id="submit-main-photo" name="submit" value="Save" class="btn btn-primary">
		</div>
	</div>
</div>
@endsection

@section('script')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
	<script type="text/javascript" src="{{ URL::asset('js/pagination.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
	<script>
		$('#form-newphoto').validate({
			rules:{
				tieude_photo:{
					required:true,
					maxlength:140
				},
				mota_photo:{
					required:true,
					maxlength:300
				},
			},
			messages:{
				tieude_photo:{
					required:"Please enter photo title",
					maxlength:"Please enter the album title more than 140 character"
				},
				mota_photo:{
					required:"Please enter description",
					maxlength:"Please enter the description more than 300 character"
				}
			}
		});
		

		Dropzone.options.fileupload = {
			accept: function (file, done) {
				if (file.type != "application/vnd.ms-excel" && file.type != "image/jpeg, image/png, image/jpg") {
					done("Error! Files of this type are not accepted");
				} else {
					done();
				}
			}
		}

		Dropzone.options.fileupload = {
			acceptedFiles: "image/jpeg, image/png, image/jpg",
			addRemoveLinks: true,
			maxFiles:1,
			dictMaxFilesExceeded: "You can only upload upto 1 images",
			removedfile : function(file){
				var name = file.name;
				$.ajaxSetup({
					headers:{
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					type:'POST', 
					url:'{{ route('deleteFile') }}',
					data:{
						"_token": "{{ csrf_token() }}",
						"name": name
					},
				});
				var _ref;
				return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0; 
			}
		}

		if (typeof Dropzone != 'undefined') {
			Dropzone.autoDiscover = false;
		}

		;
		(function ($, window, undefined) {
			"use strict";

			$(document).ready(function () {
	    if (typeof Dropzone != 'undefined') {
	    	if ($("#fileupload").length) {
	    		var dz = new Dropzone("#fileupload"),
	    		dze_info = $("#dze_info"),
	    		
	    		status = {
	    			uploaded: 0,
	    			errors: 0
	    		};
	    		var $f = $('<tr><td class="name"></td><td class="size"></td><td class="type"></td><td class="status"></td></tr>');
	    		dz.on("success", function (file, responseText) {

	    			var _$f = $f.clone();

	    			_$f.addClass('success');

	    			_$f.find('.name').html(file.name);
	    			if (file.size < 1024) {
	    				_$f.find('.size').html(parseInt(file.size) + ' KB');
	    			} else {
	    				_$f.find('.size').html(parseInt(file.size / 1024, 10) + ' KB');
	    			}
	    			_$f.find('.type').html(file.type);
	    			_$f.find('.status').html('Uploaded <i class="entypo-check"></i>');

	    			dze_info.find('tbody').append(_$f);

	    			status.uploaded++;

	    			dze_info.find('tfoot td').html('<span class="label label-success">' + status.uploaded + ' uploaded</span> <span class="label label-danger">' + status.errors + ' not uploaded</span>');

	        })
	    		.on('error', function (file) {
	    			var _$f = $f.clone();

	    			dze_info.removeClass('hidden');

	    			_$f.addClass('danger');

	    			_$f.find('.name').html(file.name);
	    			_$f.find('.size').html(parseInt(file.size / 1024, 10) + ' KB');
	    			_$f.find('.type').html(file.type);
	    			_$f.find('.status').html('Uploaded <i class="entypo-cancel"></i>');

	    			dze_info.find('tbody').append(_$f);

	    			status.errors++;

	    			dze_info.find('tfoot td').html('<span class="label label-success">' + status.uploaded + ' uploaded</span> <span class="label label-danger">' + status.errors + ' not uploaded</span>');

	        });
	    	}
	    }
	});
		})(jQuery, window); 
	</script>
@endsection
