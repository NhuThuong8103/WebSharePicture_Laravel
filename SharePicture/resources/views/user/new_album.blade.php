@extends('user.home')

@section('title','My Album')

@section('style')
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<link href="{{ URL::asset('css/pagination.css') }}" rel="stylesheet" type="text/css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">

	<link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css">

@endsection

@section('content')
	<div class="row pt-3">
		<div class="col-12">
			<div class="main-title mt-2">
				<h5>New Album</h5>
			</div>
			<hr class="border-below mt-5">
		</div>
	</div>

	<div class="row pt-2">
		<div class="col-lg-6">
			<h6>Title</h6>
			<input type="text" class="form-control" placeholder="Hôm nay trời đẹp quá hihi" required name="tieude_album">
			<br>
			<div class="d-lg-none">
				<h6>Description</h6>
				<textarea class="form-control" rows="5" placeholder="Bau troi that xanh <3" required name="mota_album"></textarea>
			</div>
			<br>
			<h6>Sharing mode</h6>
			<select name="chedo_album" id="" class="form-control control-select">
				<option value="1">Public</option>
				<option value="2">Private</option>
			</select>


		</div>
		<div class="col-lg-6 d-none d-lg-block">
			<h6>Description</h6>
			<textarea class="form-control" rows="5" placeholder="Bau troi that xanh <3" required name="mota_album"></textarea>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 mb-3 mt-3">
 			<form action="{{ route('dropzoneJs') }}" enctype="multipart/form-data" class="dropzone" id="fileupload" method="POST">
            @csrf
            <div class="fallback">
              <input name="file" type="files" multiple accept="image/jpeg, image/png, image/jpg" />
            </div>
          </form>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="group-btn mb-3">
				<a href="#" class="btn btn-primary">
					<i class="fas fa-save mr-2"></i>Save
				</a>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
	<script type="text/javascript" src="{{ URL::asset('js/pagination.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>

	<script type="text/javascript">
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

