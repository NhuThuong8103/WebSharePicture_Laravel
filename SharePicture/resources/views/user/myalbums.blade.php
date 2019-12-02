@extends('user.home')

@section('title','My Album')

@section('style')
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

	<link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css">

	<link href="{{ URL::asset('css/main_hover_album.css') }}" rel="stylesheet" type="text/css"/>

	<link href="{{ URL::asset('css/sim-prev-anim.css') }}" rel="stylesheet" type="text/css" />

	<link href="{{ URL::asset('css/pagination.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('content')
	<div class="row">
		<div class="first-row-body">
			<a href="{{url('/myalbums/newalbum_upload')}}" class="btn btn-success add-Album">Add new Album</a>
			<hr class="highlight-bt mb-0 ml-3 mr-3">
		</div>
	</div>
	<div class="row album-lists">
		@foreach ($array as $album)		
		<div class="col-lg-3 col-md-4 col-sm-6 col-6">
			<div class="one-album">
				<div class="albums">
					<div class="albums-inner">						
						<div class="albums-tab-thumb sim-anim-1">
							<img src="{{ $album['data']}}" class="all studio img-thumbnail"/>
							<img src="{{ $album['data']}}" class="all studio img-thumbnail"/>
							<img src="{{ $album['data'] }}" class="all studio img-thumbnail"/>			
						</div>
						<div class="title-album">
							<p class="info-album">{{ substr($album['mota_album'],0,10).' ...'}}</p>
							<a href="https://www.google.com.vn/?hl=vi" target="_blank"><i class="far fa-edit edit-icon"></i></a>
						</div>
						<div class="albums-tab-text">
							{{ $album['tieude_album'] }}
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
@endsection

@section('script')
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>

	<script type="text/javascript" src="{{ URL::asset('js/pagination.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
	
	<script>
		$('#tab').pagination({ // phaan trang danh sach album cua user
			items: 12,
			contents: 'album-lists', 
			previous: 'Previous',
			next: 'Next',
			position: 'bottom',
		});
	</script>
@endsection
