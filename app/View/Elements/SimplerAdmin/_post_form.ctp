
<?=
    $this->Form->create('Post',[
        'class' => 'clearfix',
    ]);
$this->Form->hidden('Post.id');
?>

<div class="form-group">

    <p class="post-form-input-title">記事のタイトル</p>
    <?php
    echo $this->Form->input('Post.title',[
        'class' => 'form-control',
        'label' => false,
    ]);
    ?>
</div>

<div class="form-group">
    <p class="post-form-input-title">記事の本文</p>
    <?=
    $this->Form->textarea('Post.body',[
        'class' => 'form-control',
        'label' => false,
        'rows' => 20
    ]);
    ?>
</div>

<div class="clearfix post_button_area">

    <?=
    $this->Form->submit('下書き保存する',[
        'class' => 'btn btn-default fl-l',
        'name' => 'draft'
    ]);
    ?>

    <?=
    $this->Form->submit('投稿する',[
        'class' => 'btn btn-primary fl-r',
        'name' => 'publish'
    ]);
    ?>
</div>


<?= $this->Form->end();?>
