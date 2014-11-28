<!-- A wrapper for all the blog posts -->
<div class="posts">
    <h1 class="content-subhead">
        <?= $post['Post']['release_date'] ;?>
    </h1>
    <section class="post">
        <header class="post-header">
            <h2 class="post-title">
              <?= $post['Post']['title']; ?>
            </h2>
        </header>
        <div class="post-description">
            <p>
                <?= nl2br($post['Post']['body']);?>
            </p>
        </div>
    </section>
</div>
