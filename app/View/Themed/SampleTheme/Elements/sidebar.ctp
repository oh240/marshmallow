	<div id="secondary">
		<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
			<aside class="widget widget_recent_entries">
				<h1 class="widget-title">最近の投稿</h1>
				<ul>
					<?php foreach ($recent_posts as $recent_post) :?>
					<li>
						<?= 
							$this->Html->link($recent_post['Post']['title'],[
								'controller' => 'posts',
								'action' => 'view',
								'id' => $recent_post['Post']['id']
							]);
						?>
					</li>
					<?php endforeach ;?>
				</ul>
			</aside>
			<aside class="widget widget_archive">
				<h1 class="widget-title">アーカイブ</h1>
				<ul>
                    <?php foreach ($archives as $archive) : ?>
                        <li>
                            <?= $this->Spl->archiveLink($archive);?>
                        </li>
                    <?php endforeach; ?>
				</ul>
			</aside>
				<aside class="widget widget_archive">
					<h1 class="widget-title">管理ツール</h1>
					<ul>
						<li>
							<?= 
								$this->Html->link('ログインする',[
									'controller' => 'simpleradmin',
									'action' => 'login'
								]);
							?>
						</li>
						<?php if ($this->Session->check('Auth.User.id')) :?>
							<?php if ($this->action === 'view') :?>
								<li>
									<?= 
										$this->Html->link('この記事を編集する',[
											'controller' => 'simpleradmin',
											'action' => '/edit_post',
											$this->params['pass'][0]
										]);
									?>
								</li>
							<?php endif;?>
						<?php endif;?>
					</ul>
				</aside>
		</div><!-- #primary-sidebar -->
	</div><!-- #secondary -->
