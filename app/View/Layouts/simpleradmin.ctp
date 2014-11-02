<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $this->fetch('title'); ?>
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css('simpleradmin/style');
        echo $this->Html->css('simpleradmin/dashboard');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">
</head>
<body id="sing-in">
    <div>
        <?= $this->element('SimplerAdmin/header');?>
        <div class="container">
            <?php echo $this->Session->flash(); ?>
            <?php if ($this->Session->check('Auth.User.id')) :?>
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li class="active">
                            <a href="#">新しい記事の投稿</a>
                        </li>
                        <li>
                            <a href="#">記事の管理</a>
                        </li>
                        <li>
                            <a href="#">コメントの管理</a>
                        </li>
                        <li>
                            <a href="#">設定</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <?php echo $this->fetch('content'); ?>
                </div>
            <?php else :?>
                <?php echo $this->fetch('content'); ?>
            <?php endif;?>
        </div>
        <div id="footer">
        </div>
    </div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</body>
</html>
