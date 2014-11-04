<div class="modal fade" id="ImgAddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">
					画像を投稿する
				</h4>
			</div>

			<div class="modal-body">

                <div id="img_error_area">

                </div>

				<?= 
					$this->Form->create('Img',[
						'type' => 'file',
						'dafault' => false,
						'id' => 'UploadImgForm',
					]);
				?>

				<div class="form-gruop">
					<?php
						echo $this->Form->input(false, array(
							'type' => 'file',
							'class' => 'form-control',
							'label' => false
						));
					?>
				</div>

			</div>
			<div class="modal-footer">
				<button id ='ImgUploadButton' class="btn btn-primary">
					画像を追加
				</button>
				<?= $this->Form->end();?>
			</div>
		</div>
	</div>
</div>
