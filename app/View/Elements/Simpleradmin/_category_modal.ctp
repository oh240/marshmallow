<div class="modal fade" id="category_add_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div id="category_error_area">

        </div>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">カテゴリーを新規追加</h4>
            </div>
            <div class="modal-body">
                <?=
                    $this->Form->create('Category', [
                        'default' => false
                    ]);
                ?>
                <p class="category_add_modal_label">
                    カテゴリー名
                </p>
                <div class="form-group">
                    <?=
                        $this->Form->input('name', [
                            'class' => 'form-control',
                            'label' => false,
                        ]);
                    ?>
                </div>
            </div>
            <div class="modal-footer">
                <button id ='submit_category_add' class="btn btn-primary btn-lg btn-block">
                    カテゴリーを追加する
                </button>
                <?= $this->Form->end();?>
            </div>
        </div>
    </div>
</div>