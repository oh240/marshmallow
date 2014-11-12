<div class="clearfix">
	<?=
		$this->Form->create('Post',[
			'class' => 'clearfix',
		]);
		$this->Form->hidden('Post.id');
	?>

	<div class="form-group">

		<p class="post-form-input-title">
            記事のタイトル
        </p>

		<?php
			echo $this->Form->input('Post.title',[
				'class' => 'form-control',
				'label' => false,
			]);
		?>

		<div class="img_button_area">

			<button id="ImgUpModalButton" class="btn btn-default" data-toggle="modal" data-target="#ImgAddModal">
				<span class="glyphicon glyphicon-upload"></span> 画像をアップロードして追加
			</button>

			<button id="ImgAppendButton" class="btn btn-default" data-toggle="modal" data-target="#ImgListModal">
				<span class="glyphicon glyphicon-camera"></span> 既存の画像から追加
			</button>
        </div>
	</div>

	<div class="form-group">
		<p class="post-form-input-title">記事の本文</p>
		<?=
			$this->Form->textarea('Post.body',[
				'class' => 'form-control',
				'label' => false,
				'rows' => 20
			]);
		?>
	</div>

	<div class="row clearfix post_button_area fl-r">
        <div class="col-md-6 clearfix">
            <?=
                $this->Form->submit('下書き保存する',[
                    'class' => 'btn btn-default fl-l',
                    'name' => 'draft',
                ]);
            ?>
        </div>
        <div class="col-md-6">
            <?=
                $this->Form->submit('投稿する',[
                    'class' => 'btn btn-primary fl-r',
                    'name' => 'publish'
                ]);
            ?>
        </div>
	</div>

	<?= $this->Form->end();?>
	<hr>
	<?php if ($this->action == 'edit_post'):?>
		<div class="post_delete_button_area fl-r">
			<?php
				echo $this->Form->postLink('記事を削除する',[
					'action' => 'post_delete',
					$this->request->data['Post']['id']
				],[
					'class' => 'btn btn-danger',
				],(
					'本当に削除していいですか?'
				));
			?>
		</div>
	<?php endif ;?>

	<?= $this->element('Simpleradmin/img_add_modal');?>
	<?= $this->element('Simpleradmin/img_list_modal');?>

</div>
