<div class="clearfix" style="padding-top:70px; max-width: 920px; margin: 0 auto;">
    <h2>
        Marshallowにようこそ。
    </h2>

    <h3>使用するデータベースの設定を記載してインストールを完了させましょう。</h3>
    <hr/>

    <?=
        $this->Form->create('User',[
            'class' => 'clearfix',
        ]);
    ?>

    <div class="form-group">

        <p class="post-form-input-title">Marshmalowの管理ユーザー名</p>

        <?php
            echo $this->Form->input('User.database_name',[
                'class' => 'form-control',
                'label' => false,
                'value' => 'localhost'
            ]);
        ?>
    </div>

    <div class="form-group">
        <p class="post-form-input-title">管理ユーザーのパスワード</p>
        <?php
        echo $this->Form->input('db.user_password',[
            'type' => 'password',
            'class' => 'form-control',
            'label' => false,
        ]);
        ?>
    </div>

    <div class="row clearfix post_button_area fl-r">
        <?=
            $this->Form->submit('投稿する',[
                'class' => 'btn btn-primary',
                'name' => 'publish'
            ]);
        ?>
    </div>

</div>
