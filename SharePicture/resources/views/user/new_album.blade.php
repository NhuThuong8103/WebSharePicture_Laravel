
 {{--<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>New Album</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
=======
@extends('user.home')

@section('title','New Album')

@section('style')
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	
>>>>>>> 4e31a4af046dd6a991065cb7ea949061f49c0655
	<link href="{{ URL::asset('css/pagination.css') }}" rel="stylesheet" type="text/css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">

	<link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css">
<<<<<<< HEAD
</head>
<body id="new-album">
	@include('user.header')
	<main>
		<div class="container">
			<div class="row">
				<div class="col-lg-2 d-none d-md-block">
					@include('user.sidebar')
				</div>
					<div class="col-lg-8 col-md-12 col-sm-12 col-12 bg-white">
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
								<SECTION>
									<DIV id="dropzone">
										<FORM class="dropzone needsclick" id="demo-upload" action="/up" method="post" enctype="multipart/form-data">
											<DIV class="dz-message needsclick">    
												Drop files here or click to upload <i class="fas fa-cloud-upload-alt"></i>
											</DIV>
										</FORM>
									</DIV>
								</SECTION>
								<br/>
								<DIV id="preview-template" style="display: none;">
									<DIV class="dz-preview dz-file-preview">
										<DIV class="dz-image">
											<IMG data-dz-thumbnail="">
										</DIV>
										<DIV class="dz-details">
											<DIV class="dz-size">
												<SPAN data-dz-size=""></SPAN>
											</DIV>
											<DIV class="dz-filename">
												<SPAN data-dz-name=""></SPAN>
											</DIV>
										</DIV>
										<DIV class="dz-progress">
											<SPAN class="dz-upload" data-dz-uploadprogress=""></SPAN>
										</DIV>
										<DIV class="dz-error-message">
											<SPAN data-dz-errormessage=""></SPAN>
										</DIV>
										<div class="dz-success-mark">
											<svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
												<title>Check</title>
												<desc>Created with Sketch.</desc>
												<defs></defs>
												<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
													<path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF" sketch:type="MSShapeGroup">
															
													</path>
												</g>
											</svg>
										</div>
										<div class="dz-error-mark">
											<svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
												<title>error</title>
												<desc>Created with Sketch.</desc>
												<defs></defs>
												<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
													<g id="Check-+-Oval-2" sketch:type="MSLayerGroup" stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">
														<path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" sketch:type="MSShapeGroup">					
														</path>
													</g>
												</g>
											</svg>
										</div>
									</DIV>
								</DIV>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="group-btn mb-3">
									<input type="submit" name="submit-album"class="btn btn-primary"value="Save">
								</div>
							</div>
						</div>
						<div class="col-lg-2">
						</div>
					</div>

			</div>

		</div>

	</main>
				<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
				<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
				<script type="text/javascript" src="{{ URL::asset('js/pagination.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>


				<script>
						Dropzone.autoDiscover = false;
					var dropzone = new Dropzone('#demo-upload', {
						
						previewTemplate: document.querySelector('#preview-template').innerHTML,
						parallelUploads: 2,
						thumbnailHeight: 120,
						thumbnailWidth: 120,
						maxFilesize: 3,
						filesizeBase: 1000,
						addRemoveLinks: true,
						thumbnail: function(file, dataUrl) {
							if (file.previewElement) {
								file.previewElement.classList.remove("dz-file-preview");
								var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
								for (var i = 0; i < images.length; i++) {
									var thumbnailElement = images[i];
									thumbnailElement.alt = file.name;
									thumbnailElement.src = dataUrl;
								}
								// setTimeout(function() { file.previewElement.classList.add("dz-image-preview"); }, 1);
							}
						}

					});

					var minSteps = 6,
					maxSteps = 60,
					timeBetweenSteps = 100,
					bytesPerStep = 100000;

					dropzone.uploadFiles = function(files) {
						var self = this;

						for (var i = 0; i < files.length; i++) {

							var file = files[i];
							totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));

							for (var step = 0; step < totalSteps; step++) {
								var duration = timeBetweenSteps * (step + 1);
								setTimeout(function(file, totalSteps, step) {
									return function() {
										file.upload = {
											progress: 100 * (step + 1) / totalSteps,
											total: file.size,
											bytesSent: (step + 1) * file.size / totalSteps
										};

										self.emit('uploadprogress', file, file.upload.progress, file.upload.bytesSent);
										if (file.upload.progress == 100) {
											file.status = Dropzone.SUCCESS;
											self.emit("success", file, 'success', null);
											self.emit("complete", file);
											self.processQueue();
							                // document.getElementsByClassName("dz-success-mark").style.opacity = "1";
							            }
							        };
							    }(file, totalSteps, step), duration);
							}
						}
					}
			</script>



		</body>
		</html>
--}}



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>New Album</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<link href="{{ URL::asset('css/pagination.css') }}" rel="stylesheet" type="text/css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">

	<link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css">
</head>
<body id="new-album">
	@include('user.header')
	<main>
		<div class="container">
			<div class="row">
				<div class="col-lg-2 d-none d-md-block">
					@include('user.sidebar')
				</div>
					<div class="col-lg-8 col-md-12 col-sm-12 col-12 bg-white">
						<FORM action="{{url('/myalbums/newalbum_upload')}}" method="post" enctype="multipart/form-data" novalidate id="fileupload">
						{{csrf_field()}}
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
								<SECTION>
									<DIV id="dropzone">
										<div class="needsclick dropzone" id="document-dropzone">
											
        								</div>
									</DIV>
									
								</SECTION>
								<br/>
								<DIV id="preview-template" style="display: none;">
									<DIV class="dz-preview dz-file-preview">
										<DIV class="dz-image">
											<IMG data-dz-thumbnail="">
										</DIV>
										<DIV class="dz-details">
											<DIV class="dz-size">
												<SPAN data-dz-size=""></SPAN>
											</DIV>
											<DIV class="dz-filename">
												<SPAN data-dz-name=""></SPAN>
											</DIV>
										</DIV>
										<DIV class="dz-progress">
											<SPAN class="dz-upload" data-dz-uploadprogress=""></SPAN>
										</DIV>
										<DIV class="dz-error-message">
											<SPAN data-dz-errormessage=""></SPAN>
										</DIV>
										<div class="dz-success-mark">
											<svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
												<title>Check</title>
												<desc>Created with Sketch.</desc>
												<defs></defs>
												<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
													<path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF" sketch:type="MSShapeGroup">
															
													</path>
												</g>
											</svg>
										</div>
										<div class="dz-error-mark">
											<svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
												<title>error</title>
												<desc>Created with Sketch.</desc>
												<defs></defs>
												<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
													<g id="Check-+-Oval-2" sketch:type="MSLayerGroup" stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">
														<path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" sketch:type="MSShapeGroup">					
														</path>
													</g>
												</g>
											</svg>
										</div>
									</DIV>
								</DIV>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="group-btn mb-3">
									<input type="submit" class="btn btn-primary"value="Save">
								</div>
							</div>
						</div>
						<div class="col-lg-2">
						</div>
					</form>
					</div>

			</div>

		</div>

	</main>
				<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
				<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
				<script type="text/javascript" src="{{ URL::asset('js/pagination.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>


				<script>

				var uploadedDocumentMap = {}
				Dropzone.options.documentDropzone = {
				    url: '{{ route('projects.storeMedia') }}',
				    method: "POST",
				    maxFilesize: 5, // MB
				    addRemoveLinks: true,
				    headers: {
				      'X-CSRF-TOKEN': "{{ csrf_token() }}"
				    },
				    success: function (file, response) {
				      $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
				      uploadedDocumentMap[file.name] = response.name
				    },
				    removedfile: function (file) {
				      file.previewElement.remove()
				      var name = ''
				      if (typeof file.file_name !== 'undefined') {
				        name = file.file_name
				      } else {
				        name = uploadedDocumentMap[file.name]
				      }
				      $('form').find('input[name="document[]"][value="' + name + '"]').remove()
				    },
				    init: function () {
				      @if(isset($project) && $project->document)
				        var files =
				          {!! json_encode($project->document) !!}
				        for (var i in files) {
				          var file = files[i]
				          this.options.addedfile.call(this, file)
				          file.previewElement.classList.add('dz-complete')
				          $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
				        }
				      @endif
				    }
				}
			</script>

		</body>
		</html>



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

