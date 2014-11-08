<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        Marshmallow  オートインストーラー
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
    <meta name="viewport" content="initial-scale=1.0">
</head>
<body id="sing-in">
<div>
    <?= $this->element('Simpleradmin/header');?>
    <div class="container">
        <?= $this->Session->flash(); ?>
        <?= $this->fetch('content'); ?>
    </div>
    <div id="footer">
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</body>
</html>
