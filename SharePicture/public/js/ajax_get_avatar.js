$(document).ready(function() {
	$('.avatar .boder-icon').remove();
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		url: '/iconUser',
		type: 'GET',
		dataType: 'text',
	})
	.done(function(result) {
		$('.avatar').prepend('<img src="https://drive.google.com/uc?export=view&id='+result+'" class="boder-icon" >');
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
});