<h2>投稿記事一覧</h2>
<hr/>
<div class="list-group">
    <?php foreach ($posts as $post):?>

        <a href="edit_post/<?=$post['Post']['id'];?>" class="list-group-item">

            <?php
                    if ($post['Post']['published']){
                        echo '<span class="label label-success publish_status">公開中</span>';
                    } else {
                        echo '<span class="label label-default publish_status">下書き</span>';
                    }
            ?>

            <span class="admin_list_post_title">
                <?= h($post['Post']['title']);?>
            </span>

        </a>
    <?php endforeach;?>
</div>
