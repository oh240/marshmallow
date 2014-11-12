<div class="clearfix">
    <h3 class="fl-l">
        <span class="glyphicon glyphicon-pencil"></span> 記事の編集
    </h3>
    <?php
        echo $this->Spl->previewLink($this->request->data);
    ?>
</div>

<hr>
<?= $this->element('Simpleradmin/_post_form');?>

