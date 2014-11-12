<div class="clearfix">
    <h3 class="fl-l">
        <span class="glyphicon glyphicon-pencil"></span> 記事の編集
    </h3>
    <?php
        if ($this->request->data['Post']['published']){

            echo $this->Html->link('記事を確認する',[
               'controller' => 'posts',
               'action' => 'view',
                'id' => $this->request->data['Post']['id']
            ],[
                'class' => 'btn btn-success btn-sm post-form-preview-button fl-l',
                'role' => 'button',
                'target' => '_blink'
            ]);
        }
    ?>
</div>

<hr>
<?= $this->element('Simpleradmin/_post_form');?>

