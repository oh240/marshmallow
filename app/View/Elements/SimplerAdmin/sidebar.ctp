<div class="col-sm-3 col-md-2 sidebar">
	<ul class="nav nav-sidebar">
		<li>
			<?=
				$this->Html->link('記事の管理',[
					'controller' => 'simpleradmin',
					'action' => 'posts',
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
			<a href="#">設定</a>
		</li>
	</ul>
</div>
