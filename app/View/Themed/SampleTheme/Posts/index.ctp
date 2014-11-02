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
			<div class="entry-meta">
				<span class="entry-date"><a href="http://fordevelop.devmasso.info/wordpress/?p=1" rel="bookmark">
				<time class="entry-date" datetime="2014-05-26T05:21:36+00:00">2014年5月26日</time></a></span> 
				<span class="byline">
				<span class="author vcard">
					<a class="url fn n" href="http://fordevelop.devmasso.info/wordpress/?author=1" rel="author">nick</a></span></span>			<span class="comments-link"><a href="http://fordevelop.devmasso.info/wordpress/?p=1#respond" title="Hello world! へのコメント">コメントをどうぞ</a>
				</span>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->
		<div class="entry-content">
			<?= h($post['Post']['body']); ?>
		</div><!-- .entry-content -->
	</article>
<?php endforeach;?>
