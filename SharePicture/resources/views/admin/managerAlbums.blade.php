@extends('admin.home')

@section('title','Manage Albums')


@section('style')
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

	<link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css">

	<link href="{{ URL::asset('css/main_hover_album.css') }}" rel="stylesheet" type="text/css"/>

	<link href="{{ URL::asset('css/sim-prev-anim.css') }}" rel="stylesheet" type="text/css" />

	<link href="{{ URL::asset('css/pagination.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
	<div class="row album-lists">
		@foreach($album as $value)
			<div class="col-lg-3 col-md-4 col-sm-6 col-6">
				<div class="one-album">
					<div class="albums">
						<div class="albums-inner">
							
							<div class="albums-tab-thumb sim-anim-1">

								<img src="https://drive.google.com/uc?export=view&id={{ $value['path'] }}" class="all studio img-thumbnail"/>
								<img src="https://drive.google.com/uc?export=view&id={{ $value['path'] }}" class="all studio img-thumbnail"/>
								<img src="https://drive.google.com/uc?export=view&id={{ $value['path'] }}" class="all studio img-thumbnail"/>			
							</div>
							<div class="title-album">
								<p class="info-album">{{ substr($value['mota'],0,10).'...' }}</p>
								<a href="{{ url('/admin/managerAlbums/edit') }}/{{ $value['idalbum'] }}"><i class="far fa-edit edit-icon"></i></a>
							</div>
							<div class="albums-tab-text">
								{{ substr($value['tieude'],0,20) }}
							</div>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>
	<div class="row pagi">
	 {{ $album->links() }}
	</div>
@endsection

@section('script')
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>

		<script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
@endsection
