<article id="post-1" class="post-1 post type-post status-publish format-standard hentry category-1">
	<header class="entry-header">
		<h1 class="entry-title">
			<?= 
				$this->Html->link($post['Post']['title'],[
					'action' => 'view',
					'id' => $post['Post']['id'],
				]);
			?>
		</h1>
		<hr>
		<div class="entry-meta">
			<span class="entry-date" datetime="2014-05-26T05:21:36+00:00">
				<?= $this->Spl->date_format($post['Post']['modified']);?>
			</span> 
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?= nl2br($post['Post']['body']); ?>
	</div><!-- .entry-content -->
</article>
