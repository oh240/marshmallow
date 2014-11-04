$(function(){
	$('#ImgTestUploadForm').submit(function(){
		var input_data = new FormData($(this)[0]);
		$.ajax({
			type: "POST",
			url: "/simpleradmin/ajax_img_upload",
			data: input_data,
			contentType: false,
			processData: false
		}).done(function(data) {
			data = JSON.parse(data);
			console.log('<img src="'+data+'>');
		});
		return false;
	});
});

