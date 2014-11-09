<div class="clearfix" style="padding-top:70px; max-width: 920px; margin: 0 auto;">
    <h2>
        Marshallowにようこそ。
    </h2>

    <h3>次に管理ユーザーの登録を行ってください。</h3>
    <hr/>

    <?=
        $this->Form->create('User',[
            'class' => 'clearfix',
        ]);
    ?>

    <div class="form-group">

        <p class="post-form-input-title">Marshmalowの管理ユーザー名</p>

        <?php
            echo $this->Form->input('User.nickname',[
                'class' => 'form-control',
                'label' => false,
            ]);
        ?>
    </div>

    <div class="form-group">
        <p class="post-form-input-title">管理ユーザーのパスワード</p>
        <?php
        echo $this->Form->input('User.password',[
            'type' => 'password',
            'class' => 'form-control',
            'label' => false,
        ]);
        ?>
    </div>

    <div class="clearfix post_button_area fl-r">
        <?=
            $this->Form->submit('作成する',[
                'class' => 'btn btn-primary',
                'name' => 'publish'
            ]);
        ?>
    </div>

</div>
