@extends('admin.home')

@section('title','Manage Users')

@section('style')
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.semanticui.min.css">
	<link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
	<div class="row mt-4">
		<form action="{{ route('deleteUser') }}" action="post" id="form_user">
			@csrf
			<table id="example" class="ui celled table" style="width:100%">
				<thead>
					<tr>
						<th width="15%">First Name</th>
						<th width="13%">Last Name</th>
						<th width="28%">Email</th>
						<th width="20%">Last Login</th>
						<th width="19%"></th>
					</tr>
				</thead>
				<tbody>
					@foreach($array as $user)
					<tr>
						<td>{{ $user->ten }} </td>
						<td>{{ $user->ho }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->thoigian_dncuoi }}</td>
						<td>
							<a href="{{ url('/admin/managerUsers/edit').'/'.$user->id }}" class="btn btn-primary edit" data-id="{{ $user->id }}">Edit</a>
							<a href="" class="btn btn-danger delete" data-id="{{ $user->id }}">Delete</a>
						</td>
					</tr>
					@endforeach
				</tbody>
					</table>
				</form>
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
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/dataTables.semanticui.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
	<script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
	<script>
		$(document).ready(function() {
			var table=$('#example').DataTable();
			
			$('.delete').click(function(event) {
				event.preventDefault();
				/* Act on the event */
				var result=confirm("Are You sure want to delete !");

				if(result){
					var id=$(this).data("id");
					$.ajaxSetup({
					    headers: {
					        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					    }
					});
					$.ajax({
						url: '{{ route('deleteUser') }}',
						type: 'POST',
						data: {"id":id},
					})
					.done(function() {
						location.reload(true);
						alert("delete user success");
					})
					.fail(function() {
						console.log("error");
					})
					.always(function() {
						console.log("complete");
					});
					
				}
			});
		} );
	</script>
@endsection