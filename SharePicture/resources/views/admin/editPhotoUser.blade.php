@extends('admin.home')

@section('title','Edit Photo User')

@section('style')
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.4.0/dist/sweetalert2.all.min.js" type="text/javascript" charset="utf-8" async defer></script>
	<link href="{{ URL::asset('css/pagination.css') }}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
	<link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
	<div class="row pt-3">
		<div class="col-12">
			<div class="main-title mt-2">
				<h5>Edit Photo</h5>
			</div>
			<div class="back-btn">
				<a href="{{ url('/admin/index') }}" class="btn btn-primary">
					<i class="fas fa-backward mr-2"></i>Back
				</a>
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
	<form id="form-editphoto" action="{{ url('/admin/managerPhotos/edit/save') }}" method="post" novalidate>{{ csrf_field() }}
	<div class="row pt-2">
		<div class="col-lg-6">
			<input type="hidden" name="idUser_Photo" value="{{ $value['taikhoan_id_photo'] }}">
			<input type="hidden" id="id" name="idPhoto" value="{{ $value['id'] }}">
			<h6>Title</h6>
			<input type="text" class="form-control" placeholder="Hôm nay trời đẹp quá hihi" value="{{ $value['tieude'] }}" required name="tieude_photo">
			<br>
			<div class="d-lg-none">
				<h6>Description</h6>
				<textarea class="form-control" rows="5" placeholder="Bau troi that xanh <3" required name="mota_photo">{{ $value['mota'] }}</textarea>
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
			<textarea class="form-control" rows="5" placeholder="Bau troi that xanh <3" required name="mota_photo">{{ $value['mota'] }}</textarea>
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
			<div class="group-btn">
				<input type="submit" id="submit-main-photo" class="btn btn-primary" value="Save">
				<a href="" id="delete-photo" class="btn btn-danger float-right">
					<i class="far fa-trash-alt mr-1"></i>Delete
				</a>
			</div>
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
		var ck=0;
		  $('#submit-main-photo').click(function(){
		    if(ck!=0){
			$('#save-photo').click();
			}
			else{
				setTimeout(function() {
					Swal.fire({
						title: "Oop...",
						text: "Please select photo",
						icon: "error",
					}, function() {
						
					});
				}, 500);
		  };
		});
		$('#delete-photo').click(function(event) {
			event.preventDefault();
			Swal.fire({
			  title: 'Are you sure?',
			  text: "Are You sure want to delete?",
			  icon: 'question',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
			  if (result.value) {
			  	var id=$('#id').val();
				$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});
				$.ajax({
					url: '{{ route('deletePhotoUser') }}',
					type: 'POST',
					data: {"_token": "{{ csrf_token() }}","id":id},
				})
				.done(function() {
					Swal.fire(
				      'Deleted!',
				      'Photo has been deleted.',
				      'success'
				    ).then(function() {
						$(location).attr('href','{{ url('/admin/') }}');
				    });
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
				});
			  }
			})
		});

		$('#form-editphoto').validate({
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
		};

		Dropzone.options.fileupload = {
			acceptedFiles: "image/jpeg, image/png, image/jpg",
			addRemoveLinks: true,
			maxFiles:1,
			removedfile : function(file){
				ck--;
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
			},
		};

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
	    			ck++;

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

