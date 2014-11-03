<?php foreach ($posts as $post) :?>
	<article id="post-1" class="post-1 post type-post status-publish format-standard hentry category-1">
		<header class="entry-header">
			<h1 class="entry-title">
				<?= 
					$this->Html->link($post['Post']['title'],[
						'action' => 'view',
						$post['Post']['id'],
					]);
				?>
			</h1>
			<hr>
			<div class="entry-meta">
				<span class="entry-date">
					<?= $this->Spl->date_format($post['Post']['modified']);?>
				</span> 
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->
		<div class="entry-content">
			<?= h($post['Post']['body']); ?>
		</div><!-- .entry-content -->
	</article>
<?php endforeach;?>
