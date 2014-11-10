<div class="clearfix" style="padding-top:70px; max-width: 920px; margin: 0 auto;">

    <div class="auto_install_wp" style="background-color: #fff; padding: 20px 30px;">
        <h3>
            Marshmallowをインストールしてくれてありがとう！
        </h3>
        <br/>
        <h5>
            使用するデータベースの設定を行って、次のステップへすすみましょう!
        </h5>
        <hr/>
        <?=
        $this->Form->create('Db', [
            'class' => 'clearfix',
        ]);
        ?>

        <div class="form-group">

            <p class="post-form-input-title">データベースのホスト名</p>

            <?=
            $this->Form->input('host', [
                'class' => 'form-control',
                'label' => false,
                'value' => 'localhost'
            ]);
            ?>
        </div>

        <div class="form-group">
            <p class="post-form-input-title">データベース名</p>
            <?=
            $this->Form->input('database_name', [
                'class' => 'form-control',
                'label' => false,
            ]);
            ?>
        </div>

        <div class="form-group">
            <p class="post-form-input-title">Marshmallow用のユーザーの名前</p>
            <?=
            $this->Form->input('user_name', [
                'class' => 'form-control',
                'label' => false,
            ]);
            ?>
        </div>

        <div class="form-group">
            <p class="post-form-input-title">Marshmallow用のユーザーのパスワード</p>
            <?=
            $this->Form->input('user_password', [
                'type' => 'password',
                'class' => 'form-control',
                'label' => false,
            ]);
            ?>
        </div>
        <hr/>

        <?=
            $this->Form->submit('次のステップへ', [
                'class' => 'btn btn-primary btn-lg btn-block',
                'name' => 'publish'
            ]);
        ?>

        <?= $this->Form->end(); ?>

    </div>

</div>

