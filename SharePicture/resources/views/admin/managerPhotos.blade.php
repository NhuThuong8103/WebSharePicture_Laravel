@extends('admin.home')

@section('title','Manage Photos')
@section('style')
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{ URL::asset('css/pagination.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('css/style.css')}}">
@endsection

@section('content')
<div class="row photo-lists">
	@foreach($photo as $value)
		<div class="col-lg-3 col-md-4 col-sm-6 col-6">
			<figure class="one-photo">
				<img src="https://drive.google.com/uc?export=view&id={{ $value['path'] }}" alt="" class="img-thumbnail" title="{{ $value['tieude'] }}">
				<figcaption>
					<h4>
						{{ substr($value['tieude'],0,10).'...' }}
						<a href="{{ url('/admin/managerPhotos/edit') }}/{{ $value['idphoto'] }}"><i class="far fa-edit"></i></a>
					</h4>
				</figcaption>
			</figure>
		</div>
	@endforeach
</div>
</div>
<div class="col-lg-2">
</div>
</div>
@endsection


@section('script')
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