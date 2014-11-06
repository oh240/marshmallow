<div class="col-sm-3 col-md-2 sidebar">
	<ul class="nav nav-sidebar">
		<li>
			
			<?=
				$this->Html->link('<span class="glyphicon glyphicon-pencil"></span> 新しい記事の投稿',[
					'controller' => 'simpleradmin',
					'action' => 'add_post',
				],[
					'escape' => false
				]);
			?>
		</li>
		<li>
			<?=
				$this->Html->link('<span class="glyphicon glyphicon-th-list"></span> 記事の一覧',[
					'action' => 'posts',
				],[
					'escape' => false
				]);
			?>
		</li>
		<li>
			<?=
				$this->Html->link('<span class="glyphicon glyphicon-wrench"></span> 設定',[
					'action' => 'setting',
				],[
					'escape' => false
				]);
			?>
		</li>
		<li>
			<?=
				$this->Html->link('<span class="glyphicon glyphicon-share-alt"></span> ブログに戻る',[
					'controller' => '/',
				],[
					'escape' => false
				]);
			?>
		</li>
	</ul>
</div>
