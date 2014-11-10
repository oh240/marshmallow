<div class="clearfix" style="padding-top:70px; max-width: 920px; margin: 0 auto;">

    <div class="auto_install_wp" style="background-color: #fff; padding: 20px 30px;">
        <h3>
            管理ユーザーの登録を行ってください。
        </h3>
        <br/>
        <h5>
            次のステップで準備が完了します!
        </h5>
        <hr/>

        <?=
        $this->Form->create('User', [
            'class' => 'clearfix',
        ]);
        ?>

        <div class="form-group">

            <p class="post-form-input-title">Marshmalowの管理ユーザー名</p>

            <?php
            echo $this->Form->input('User.nickname', [
                'class' => 'form-control',
                'label' => false,
            ]);
            ?>
        </div>

        <div class="form-group">
            <p class="post-form-input-title">管理ユーザーのパスワード</p>
            <?php
            echo $this->Form->input('User.password', [
                'type' => 'password',
                'class' => 'form-control',
                'label' => false,
            ]);
            ?>
        </div>
        <hr/>
        <?=
        $this->Form->submit('最後のステップへ', [
            'class' => 'btn btn-primary btn-lg btn-block',
            'name' => 'publish'
        ]);
        ?>

        <?= $this->Form->end(); ?>

    </div>

</div>
