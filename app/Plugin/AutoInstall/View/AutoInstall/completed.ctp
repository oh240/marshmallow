<div class="clearfix" style="padding-top:70px; max-width: 920px; margin: 0 auto;">

    <div class="auto_install_wp" style="background-color: #fff; padding: 20px 30px;">
        <h3>
            Marshmallowを使用する準備が完了しました！
        </h3>
        <br/>
        <h5>
            さっそく管理画面へログインしてブログの執筆を始めましょう。
        </h5>
        <hr/>
        <?=
            $this->Form->postLink('管理画面へログイン', [
                'action' => 'completed'
            ], [
                'class' => 'btn btn-primary btn-lg btn-block'
            ]);
        ?>

    </div>

</div>

