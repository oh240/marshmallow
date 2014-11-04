<div class="clearfix">
	<?=
		$this->Form->create('Post',[
			'class' => 'clearfix',
		]);
		$this->Form->hidden('Post.id');
	?>

	<div class="form-group">

		<p class="post-form-input-title">記事のタイトル</p>
		<?php
		echo $this->Form->input('Post.title',[
			'class' => 'form-control',
			'label' => false,
		]);
		?>
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


	<div class="clearfix post_button_area fl-r">

		<?=
			$this->Form->submit('下書き保存する',[
				'class' => 'btn btn-default fl-l',
				'name' => 'draft'
			]);
		?>

		<?=
			$this->Form->submit('投稿する',[
				'class' => 'btn btn-primary fl-r',
				'name' => 'publish'
			]);
		?>
	</div>

	<?= $this->Form->end();?>

	<div class="">
		<!-- Button trigger modal -->
		<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ImgAddModal">
			新しく画像をアップロードして挿入する
		</button>
	</div>


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

	<?= $this->element('SimplerAdmin/img_add_modal');?>

</div>
