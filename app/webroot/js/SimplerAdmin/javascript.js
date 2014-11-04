$(function(){

	/**
	 * 画像の非同期でのアップロード処理
	 */
	$('#ImgUploadButton').click(function(){
		var input_data = new FormData($('#UploadImgForm')[0]);
		$.ajax({
			type: "POST",
			url: "/simpleradmin/ajax_img_upload",
			data: input_data,
			contentType: false,
			processData: false
		}).done(function(data) {
			data = JSON.parse(data);
			addImgTag(data);
		});
		return false;
	});

	/**
	 * 入力内容の末尾に画像のImgタグを追加する
	 */
	function addImgTag(img_dir){
		var img_tag = "<img src='"+img_dir+"'>";
		var target_val = $('#PostBody').val();
		$('#PostBody').val(target_val+img_tag);
		$('#ImgAddModal').modal('hide');
	}

});

