$(function(){

    /**
     * モーダルの出力ボタンを押した時にデフォルトのSubmit処理を無効にする。
     */
    $('#ImgUpModalButton').click(function(e) {
        e.preventDefault();
    });

	/**
	 * 画像の非同期でのアップロード処理
	 */
	$('#ImgUploadButton').click(function(e){
        e.preventDefault();
        var input_data = new FormData($('#UploadImgForm')[0]);
		$.ajax({
			type: "POST",
			url: "/simpleradmin/ajax_img_upload",
			data: input_data,
			contentType: false,
			processData: false,
		}).done(function(data) {
			data = JSON.parse(data);
			addImgTag(data);
			$('#ImgAddModal').modal('hide');
		});
		return false;
	});


	$('#ImgAppendButton').click(function(e){
        e.preventDefault();
		var img_area = $('#img_list_area');
		img_area.empty();
        $.ajax({
			type: "POST",
			url: "/simpleradmin/ajax_img_load",
			contentType: false,
			processData: false
		}).done(function(data){
			imgs = JSON.parse(data);
			var imgs_length = imgs.length;
			var imgtag = '';
			//foreachもどき
			for(img_key=0;img_key<imgs_length;img_key++){
				img_name = imgs[img_key].Img.name;
				imgtag = imgtag + "<img class='chose_img_box' src='" + img_name + "' width=125 height=125 >";
			}
			img_area.append(imgtag);
		});
	});

	/**
	 * 画像をクリックした時
	 */
	$('body').on("click",".chose_img_box",function(){
		var img_dir = $(this).attr('src');
		addImgTag(img_dir);
		$('#ImgListModal').modal('hide');
	});

	/**
	 * imgタグをラッピングして返す
	 */
	function returnImgHtml(img_dir,width,height){
		return "<img class='spl_post_image' src='" + img_dir + "' width=" + width + " height=" + height + ">";
	}

	/**
	 * 入力内容の末尾に画像のImgタグを追加する
	 */
	function addImgTag(img_dir){
		var img_tag = "<a href='" + img_dir + "'> <img class='spl_post_image' src='" + img_dir + "'> </a>";
		var target_val = $('#PostBody').val();
		$('#PostBody').val(target_val+img_tag);
	}

});

