@extends('admin.home')

@section('title','Manage Photos')
@section('style')
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<link rel="stylesheet" href="{{ URL::asset('css/pagination.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/style.css')}}">
@endsection

@section('content')
	<div class="row photo-lists">
						<div class="col-lg-3 col-md-4 col-sm-6 col-6">
							<figure class="one-photo">
								<img src="{{URL::asset('image/10.jpeg')}}" alt="" class="img-thumbnail" title="Explanatory caption abccccccc.........">
										<!-- <div class="private-img">
											<h7>
												<i class="fas fa-lock"></i>
											</h7>
										</div> -->
										<figcaption>
											<h4>
												Explanatory caption abccccccc.........
												<a href="../www.facebook.com"><i class="far fa-edit"></i></a>
											</h4>
										</figcaption>
									</figure>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-6">
									<figure class="one-photo">
										<img src="{{URL::asset('image/2.jpeg')}}" alt="" class="img-thumbnail" title="Explanatory caption abccccccc.........">
										<!-- <div class="private-img">
											<h7>
												<i class="fas fa-lock"></i>
											</h7>
										</div> -->
										<figcaption>
											<h4>
												Explanatory caption abccccccc...
												<a href="facebook.com"><i class="far fa-edit"></i></a>
											</h4>
										</figcaption>
									</figure>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-6">
									<figure class="one-photo">
										<img src="{{URL::asset('image/3.jpeg')}}" alt="" class="img-thumbnail">
										<figcaption>
											<h4>
												Explanatory caption abccccccc...
												<a href="facebook.com"><i class="far fa-edit"></i></a>
											</h4>
										</figcaption>
									</figure>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-6">
									<figure class="one-photo">
										<img src="{{URL::asset('image/4.jpeg')}}" alt="" class="img-thumbnail">
										<figcaption>
											<h4>
												Explanatory caption abccccccc...
												<a href="facebook.com"><i class="far fa-edit"></i></a>
											</h4>
										</figcaption>
									</figure>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-6">
									<figure class="one-photo">
										<img src="{{URL::asset('image/5.jpeg')}}" alt="" class="img-thumbnail">
										<figcaption>
											<h4>
												Explanatory caption abccccccc...
												<a href="www.facebook.com"><i class="far fa-edit"></i></a>
											</h4>
										</figcaption>
									</figure>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-6">
									<figure class="one-photo">
										<img src="{{URL::asset('image/6.jpeg')}}" alt="" class="img-thumbnail">
										<figcaption>
											<h4>
												Explanatory caption abccccccc...
												<a href="facebook.com"><i class="far fa-edit"></i></a>
											</h4>
										</figcaption>
									</figure>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-6">
									<figure class="one-photo">
										<img src="{{URL::asset('image/11.jpeg')}}" alt="" class="img-thumbnail" >
										<figcaption>
											<h4>
												Explanatory caption abccccccc...
												<a href="facebook.com"><i class="far fa-edit"></i></a>
											</h4>
										</figcaption>
									</figure>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-6">
									<figure class="one-photo">
										<img src="{{URL::asset('image/8.jpeg')}}" alt="" class="img-thumbnail">
										<figcaption>
											<h4>
												Explanatory caption abccccccc...
												<a href="facebook.com"><i class="far fa-edit"></i></a>
											</h4>
										</figcaption>
									</figure>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-6">
									<figure class="one-photo">
										<img src="{{URL::asset('image/9.jpeg')}}" alt="" class="img-thumbnail">
										<figcaption>
											<h4>
												Explanatory caption abccccccc...
												<a href="facebook.com"><i class="far fa-edit"></i></a>
											</h4>
										</figcaption>
									</figure>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-6">
									<figure class="one-photo">
										<img src="{{URL::asset('image/11.jpeg')}}" alt="" class="img-thumbnail">
										<figcaption>
											<h4>
												Explanatory caption abccccccc...
												<a href="facebook.com"><i class="far fa-edit"></i></a>
											</h4>
										</figcaption>
									</figure>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-6">
									<figure class="one-photo">
										<img src="{{URL::asset('image/11.jpeg')}}" alt="" class="img-thumbnail"> 
										<figcaption>
											<h4>
												Explanatory caption abccccccc...
												<a href="facebook.com"><i class="far fa-edit"></i></a>
											</h4>
										</figcaption>
									</figure>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-6">
									<figure class="one-photo">
										<img src="{{URL::asset('image/11.jpeg')}}" alt="" class="img-thumbnail">
										<figcaption>
											<h4>
												Explanatory caption abccccccc...
												<a href="www.facebook.com"><i class="far fa-edit"></i></a>
											</h4>
										</figcaption>
									</figure>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-6">
									<figure class="one-photo">
										<img src="{{URL::asset('image/11.jpeg')}}" alt="" class="img-thumbnail">
										<figcaption>
											<h4>
												Explanatory caption abccccccc...
												<a href="facebook.com"><i class="far fa-edit"></i></a>
											</h4>
										</figcaption>
									</figure>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-6">
									<figure class="one-photo">
										<img src="{{URL::asset('image/11.jpeg')}}" alt="" class="img-thumbnail">
										<figcaption>
											<h4>
												Explanatory caption abccccccc...
												<a href="facebook.com"><i class="far fa-edit"></i></a>
											</h4>
										</figcaption>
									</figure>
								</div>
							</div>
						</div>
						<div class="col-lg-2">
						</div>
	</div>
@endsection


@section('script')
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
	<script src="{{URL::asset('js/pagination.js')}}"></script>
	<script src="{{URL::asset('js/main.js')}}"></script>
	<script>
		//phaan trang 
		$("#tab").pagination({
			items: 12,
			contents: 'photo-lists',
			previous: 'Previous',
			next: 'Next',
			position: 'bottom',
		});
	</script>
@endsection