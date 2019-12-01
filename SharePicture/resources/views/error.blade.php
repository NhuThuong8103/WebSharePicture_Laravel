<div>
	@if(count($errors) >0)
	<script>
		setTimeout(function() {
	        Swal.fire({
	            title: "Oop...",
	            text: "@foreach($errors->all() as $error){{ $error }}@endforeach",
	            icon: "error"
	        });
	    }, 500);
	</script>
	{{-- <div class="alert alert-danger">
		<ul style="list-style-type: none">
			@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div> --}}
	@endif
</div>