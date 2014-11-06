<h3>
	<span class="glyphicon glyphicon-wrench"></span> サイト設定
</h3>
<hr>

<div class="clearfix">
	<?=
		$this->Form->create('Setting',[
			'class' => 'clearfix',
		]);
		$this->Form->hidden('Setting.id');
	?>

	<div class="form-group">
		<?=
			$this->Form->input('Setting.site_name',[
				'class' => 'form-control',
				'label' => 'サイト名',
			]);
		?>
	</div>

	<div class="form-group">
		<?=
			$this->Form->input('Setting.theme_name',[
				'class' => 'form-control',
				'label' => 'テーマ名',
			]);
		?>
	</div>

	<div class="form-group">
		<?=
			$this->Form->input('Setting.email',[
				'class' => 'form-control',
				'label' => 'メールアドレス',
			]);
		?>
	</div>

	<div class="form-group">
		<?=
			$this->Form->input('Setting.disqus_user_id',[
				'type' => 'text',
				'class' => 'form-control',
				'label' => 'Disqus User ID',
			]);
		?>
	</div>

	<div class="clearfix post_button_area fl-r">
		<?=
			$this->Form->submit('設定を保存',[
				'class' => 'btn btn-primary fl-r',
			]);
		?>
	</div>

	<?= $this->Form->end();?>

</div>
