<!-- A wrapper for all the blog posts -->
<div class="posts">
<?php foreach($posts as $post):?>
    <h1 class="content-subhead">
        <?= $post['Post']['release_date'] ;?>
    </h1>

    <section class="post">
        <header class="post-header">
            <h2 class="post-title">
                <?=
                    $this->Html->link($post['Post']['title'],[
                        'action' => 'view',
                        'id' => $post['Post']['id']
                    ]);
                ?>
            </h2>
        </header>
        <div class="post-description">
            <p>
                <?= $this->Spl->Ellipsis($post['Post']['body']);?>
            </p>
        </div>
    </section>
<?php endforeach;?>
</div>
