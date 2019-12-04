
@extends('user.home')

@section('title','My Album')
@section('title','Edit Album')

@section('style')
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js" type="text/javascript" charset="utf-8" async defer></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.css">
<link href="{{ URL::asset('css/pagination.css') }}" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">

<link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css">

@endsection


@section('content')
<div class="row pt-3">
	<div class="col-12">
		<div class="main-title mt-2">
			<h5>Edit Album</h5>
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
<form id="form-updatealbum" action="{{ url('/myalbums/updatealbum') }}" method="post" novalidate>{{ csrf_field() }}
	<div class="row pt-2">
		<div class="col-lg-6">
			<h6>Title</h6>
			<input type="hidden" id="idAlbum" value="{{ $value['idAlbum'] }}">
			<input type="text" class="form-control" placeholder="Hôm nay trời đẹp quá hihi" required name="tieude_album" value="{{ $value['tieude_album'] }}">
			<br>
			<div class="d-lg-none">
				<h6>Description</h6>
				<textarea class="form-control" rows="5" placeholder="Bau troi that xanh <3" required name="mota_album">{{ $value['mota_album'] }}</textarea>
			</div>
			<br>
			<h6>Sharing mode</h6>
			<select name="chedo_album" id="" class="form-control control-select mode">
				<option value="1">Public</option>
				<option value="0">Private</option>
			</select>

			<input type="submit" id="save" name="submit" value="Save" class="btn btn-primary submit-hidden">
		</div>
		<div class="col-lg-6 d-none d-lg-block">
			<h6>Description</h6>
			<textarea class="form-control" rows="5" placeholder="Bau troi that xanh <3" required name="mota_album">{{ $value['mota_album'] }}</textarea>
		</div>
	</div>
</form>

<div class="row">
	<div class="col-lg-12 mb-3 mt-3">
		<form action="{{ route('dropzoneJs') }}" enctype="multipart/form-data" class="dropzone" id="fileupload" method="POST">
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
				<input type="submit" id="save-album" class="btn btn-primary" value="Save">
				<a href="" id="delete-album" class="btn btn-danger float-right">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
<script type="text/javascript" src="{{ URL::asset('js/pagination.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>

<script>
	$('#save-album').click(function(event) {
		/* Act on the event */
		$('#save').click();
	});

	$('#delete-album').click(function(event) {
			/* Act on the event */
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
			  	var id=$('#idAlbum').val();
				$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});
				$.ajax({
					url: '{{ route('deleteAlbum') }}',
					type: 'POST',
					data: {"_token": "{{ csrf_token() }}","id":id},
				})
				.done(function() {
					Swal.fire(
				      'Deleted!',
				      'Your Album has been deleted.',
				      'success'
				    ).then(function() {
						$(location).attr('href','{{ url('/myalbums') }}');
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

	$('#form-updatealbum').validate({
		rules:{
			tieude_album:{
				required:true,
				maxlength:140
			},
			mota_album:{
				required:true,
				maxlength:300
			},
		},
		messages:{
			tieude_album:{
				required:"Please enter album title",
				maxlength:"Please enter the album title more than 140 character"
			},
			mota_album:{
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
    // Dropzone Example
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

            // toastr.success('Your File Uploaded Successfully!!', 'Success Alert', {
            //   timeOut: 50000000
            // });

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

            // toastr.error('Your File Uploaded Not Successfully!!', 'Error Alert', {
            //   timeOut: 5000
            // });
        });
    	}
    }
});
	})(jQuery, window); 
</script>
@endsection

