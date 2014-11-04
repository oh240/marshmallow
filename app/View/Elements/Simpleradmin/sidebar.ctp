<div class="col-sm-3 col-md-2 sidebar">
	<ul class="nav nav-sidebar">
		<li>
			<?=
				$this->Html->link('ブログに戻る',[
					'controller' => '/',
				]);
			?>
		</li>
		<li>
			<?=
				$this->Html->link('新しい記事の投稿',[
					'controller' => 'simpleradmin',
					'action' => 'add_post',
				]);
			?>
		</li>
		<li>
			<?=
				$this->Html->link('記事の一覧',[
					'action' => 'posts',
				]);
			?>
		</li>
		<li>
			<?=
				$this->Html->link('設定',[
					'action' => 'setting',
				]);
			?>
		</li>
	</ul>
</div>
