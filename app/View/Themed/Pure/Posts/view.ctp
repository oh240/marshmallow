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
            <p class="post-meta">
                <a class="post-category post-category-design" href="#">CSS</a>
                <a class="post-category post-category-pure" href="#">Pure</a>
            </p>
        </header>
        <div class="post-description">
            <p>
                <?= nl2br($post['Post']['body']);?>
            </p>
        </div>
    </section>
</div>
