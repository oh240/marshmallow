<h3>
    <span class="glyphicon glyphicon-th-list"></span> カテゴリーの一覧
    <!-- モーダルを呼び出す -->
    <button class="btn btn-success fl-r " data-toggle="modal" data-target="#category_add_modal">
        カテゴリーを追加する
    </button>
    <?= $this->element('Simpleradmin/_category_modal');?>
</h3>
<hr/>
<ul class="list-group clearfix">
    <?php foreach ($categories as $category):?>

        <li class="list-group-item clearfix">

            <span class="admin_list_post_title fl-l">
                <?= h($category['Category']['name']);?>
            </span>

            <?=
                $this->Form->postLink('<span class="glyphicon glyphicon-trash fl-r admin_list_category_del_icon"></span>',[
                    'action' => 'category_delete',
                    'id' => $category['Category']['id']
                ],[
                    'escape' => false
                ],(
                    'カテゴリーを削除しますがよろしいですか？'
                ));
            ?>

            <span class="admin_list_category_count fl-r">
               投稿件数 <?= $category['Category']['count'];?>
            </span>
        </li>
    <?php endforeach;?>
</ul>

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
