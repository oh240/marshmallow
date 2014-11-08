<div class="clearfix" style="padding-top:70px; max-width: 920px; margin: 0 auto;">

    <h2>
        Marshallowにようこそ。
    </h2>

    <h3>使用するデータベースの設定を記載してインストールを完了させましょう。</h3>
    <hr/>
    <?=
        $this->Form->create('Db',[
            'class' => 'clearfix',
        ]);
    ?>

    <div class="form-group">

        <p class="post-form-input-title">データベースのホスト名</p>

        <?=
            $this->Form->input('host',[
                'class' => 'form-control',
                'label' => false,
                'value' => 'localhost'
            ]);
        ?>
    </div>

    <div class="form-group">
        <p class="post-form-input-title">データベース名</p>
        <?=
        $this->Form->input('database_name',[
            'class' => 'form-control',
            'label' => false,
        ]);
        ?>
    </div>

    <div class="form-group">
        <p class="post-form-input-title">Marshmallow用のユーザーの名前</p>
        <?=
            $this->Form->input('user_name',[
                'class' => 'form-control',
                'label' => false,
            ]);
        ?>
    </div>

    <div class="form-group">
        <p class="post-form-input-title">Marshmallow用のユーザーのパスワード</p>
        <?=
            $this->Form->input('user_password',[
                'type' => 'password',
                'class' => 'form-control',
                'label' => false,
            ]);
        ?>
    </div>

    <hr/>
    <?=
        $this->Form->submit('次のステップへ',[
            'id' => 'auto_install_index_submit',
            'class' => 'btn btn-primary btn-lg btn-block',
            'name' => 'publish'
        ]);
    ?>
    <div class="clearfix post_button_area fl-r">

    </div>

</div>
