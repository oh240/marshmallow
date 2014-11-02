<?php
    echo $this->Form->create('User',[
    'class' => 'form-signin',
    'role' => 'form'
    ]);
?>


<div class="text-center">
    <h4 class="login-title">
        Simpler
    </h4>
</div>


<div class="clearfix">
    <?php
        echo $this->Form->input('User.nickname',[
            'class' => 'form-control',
            'label' => false,
            'placeholder' => 'アカウント名'
        ]);
        echo $this->Form->input('User.password',[
            'class' => 'form-control',
            'label' => false,
            'placeholder' => 'パスワード'
        ]);
    ?>
</div>
<br>
<?php
    echo $this->Form->submit('ログイン',[
        'class' => 'btn btn-lg btn-primary btn-block'
    ]);
?>
<?php echo $this->Form->end();?>
