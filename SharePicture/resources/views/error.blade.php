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
	@endif
</div>