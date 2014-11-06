<h3>
	<span class="glyphicon glyphicon-th-list"></span> 記事の一覧
</h3>
<hr/>
<div class="list-group clearfix">
    <?php foreach ($posts as $post):?>

        <a href="edit_post/<?=$post['Post']['id'];?>" class="list-group-item clearfix">

            <?php
				if ($post['Post']['published']){
					echo '<span class="label label-success publish_status fl-l">公開中</span>';
				} else {
					echo '<span class="label label-default publish_status fl-l">下書き</span>';
				}
            ?>

            <span class="admin_list_post_title fl-l">
                <?= h($post['Post']['title']);?>
            </span>

            <span class="admin_list_post_date fl-r">
				更新日:
				<?= $this->Spl->date_format($post['Post']['modified']);?>
            </span>

        </a>
    <?php endforeach;?>
</div>

<ul class="pager">
  <?php if ($this->Paginator->hasPrev()):?>
	  <li class="previous">
			<?php echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled')); ?>
	  </li>
  <?php endif;?>
  <?php if ($this->Paginator->hasNext()):?>
	  <li class="next">
			<?php echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));?>
	  </li>
  <?php endif;?>
</ul>
