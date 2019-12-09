@extends('user.home')

@section('title','Feeds Album')


@section('style')
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="{{URL::asset('css/heart.css')}}">

	<link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css">

	<link href="{{ URL::asset('css/main_hover_album.css') }}" rel="stylesheet" type="text/css"/>

	<link href="{{ URL::asset('css/sim-prev-anim.css') }}" rel="stylesheet" type="text/css" />

	<link href="{{ URL::asset('css/pagination.css') }}" rel="stylesheet" type="text/css">
	
	

@endsection

@section('content')
	<div class="row">
		<div class="first-row-body p-3 text-center">
			<div class="btn-group btn-group-toggle">
				<a href="{{ url('/')}}" class="btn btn-secondary radio-seentype">Photo</a>
				<a href="{{ url('/feedsalbum')}}" class="btn btn-secondary radio-seentype active">Album</a>
			</div>
		</div>
	</div>

	<div class="row feeds-album">



		 @foreach ($value1 as $feedAlbum)
		<div class="col-lg-6 col-md-6 col-12">
			<div class="card mb-3 one-news-album">
				<div class="row no-gutters">
					<div class="col-lg-6 col-md-6 col-6">
						<div class="albums-tab-thumb sim-anim-2 p-3" data-target="#exampleModal{{$feedAlbum['idalbum']}}" data-toggle="modal">
							<img src="https://drive.google.com/uc?export=view&id={{$feedAlbum['path'][0]['img']}}" class="all studio img-thumbnail album-feeds"/>
							<img src="https://drive.google.com/uc?export=view&id={{$feedAlbum['path'][0]['img']}}" class="all studio img-thumbnail album-feeds"/>
							<img src="https://drive.google.com/uc?export=view&id={{$feedAlbum['path'][0]['img']}}" class="all studio img-thumbnail album-feeds"/>
						</div>
						<div class="modal fade" id="exampleModal{{$feedAlbum['idalbum']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h6 class="modal-title" id="exampleModalLabel">{{$feedAlbum['tieude']}}</h6>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										
									</div>
									<div class="modal-body">
										<div id="myCarousel{{$feedAlbum['idalbum']}}" class="carousel slide" data-ride="carousel">  
										                                
											<div class="carousel-inner">
												
												 @foreach($feedAlbum['path'] as $img)
												 	
												       <div class="carousel-item {{$img['stt'] == 0 ? 'active' : '' }}">
												           <img class="img-fluid" src="https://drive.google.com/uc?export=view&id={{ $img['img']}}">
												       </div>
												     
											    @endforeach
												
											</div>
											
											<a class="left carousel-control" href="#myCarousel{{$feedAlbum['idalbum']}}" data-slide="prev">
												<i class="fas fa-chevron-left"></i>
												<span class="sr-only">Previous</span>
											</a>
											<a class="right carousel-control" href="#myCarousel{{$feedAlbum['idalbum']}}" data-slide="next">
												<i class="fas fa-chevron-right"></i>
												<span class="sr-only">Next</span>
											</a>
										</div>                                                                                                         
									</div>

									<div class="modal-footer" style="justify-content: normal">
										<p class="modal-detail" id="exampleModalLabel">{{$feedAlbum['mota']}}</p>
									</div>
								</div>
							</div>
						</div>
						
						
					</div>
					<div class="col-6">
						<div class="card-body">
							<div class="name-user user-in-feeds-title">
								<a href="google.com" title="Trang ca nhan" class="title-name">
									<span><img class="img-avatar" src="https://drive.google.com/uc?export=view&id={{ $feedAlbum['avatar'] }}" alt=""></span>
									<span class="name-acount">
										{{$feedAlbum['username']}}
									</span>
								</a>
							</div>
							<label class="strong-title-news">
								<strong class="mt-2 mb-2">{{$feedAlbum['tieude']}} </strong>
							</label>
							<p class="card-text description">{{$feedAlbum['mota']}}</p>
						</div>
						<div class="info-card-album">
                        @if($feedAlbum['checklike']!=0)
							<input type="checkbox" name="checkbox{{ $feedAlbum['idalbum'] }}" id="checkbox{{ $feedAlbum['idalbum'] }}" class="css-checkbox" data-id="{{ $feedAlbum['idalbum'] }}" checked />
                            <label for="checkbox{{ $feedAlbum['idalbum'] }}" class="css-label"> 
                                <a href="">
                                    <p id="count{{ $feedAlbum['idalbum'] }}">{{ $feedAlbum['likecount'] }}</p>
                                </a>
                            </label>
						@else
							<input type="checkbox" name="checkbox{{ $feedAlbum['idalbum'] }}" id="checkbox{{$feedAlbum['idalbum'] }}" class="css-checkbox" data-id="{{ $feedAlbum['idalbum'] }}" />
                            <label for="checkbox{{ $feedAlbum['idalbum'] }}" class="css-label"> 
                                <a href="">
                                    <p id="count{{ $feedAlbum['idalbum'] }}">{{ $feedAlbum['likecount'] }}</p>
                                </a>
                            </label>
						@endif
							<p class="info-album time-album">
								<small class="text-muted text-right">
									{{ $feedAlbum['ngaygio']->format('d-m-Y H:i') }}
								</small>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	<div class="row pagi">
	  {{ $value1->links() }}
	</div>
@endsection

@section('script')
	<script>
        $(document).ready(function() {
            $('input[type=checkbox]').click(function() {
                @if(Auth::check())
                    var id=$(this).data('id');
                    var value=Number($('#count'+id).text());
                    if($(this).is(':checked')){
                        $.ajaxSetup({
                            headers:{
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: '{{ route('likealbum') }}',
                            type: 'POST',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "idAlbumLike": id
                            },
                        })
                        .done(function() {
                            $('#count'+id).text(value+1);
                            console.log("success");
                        })
                        .fail(function() {
                            console.log("error");
                        })
                        .always(function() {
                            console.log("complete");
                        });
                        
                    }
                    else{
                        $.ajaxSetup({
                            headers:{
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: '{{ route('removelikealbum') }}',
                            type: 'POST',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "idAlbumLike": id
                            },
                        })
                        .done(function() {
                            $('#count'+id).text(value-1);
                            console.log("success");
                        })
                        .fail(function() {
                            console.log("error");
                        })
                        .always(function() {
                            console.log("complete");
                        });
                    }
                @else
                    location.reload(true);
                    $(location).attr('href','{{ url('/login') }}');
                @endif
            });
        });
    </script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>


	<script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
@endsection
