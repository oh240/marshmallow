<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?= $action_name .' | '. $title_for_layout; ?>
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
        <?= $this->element('SimplerAdmin/header');?>
        <div class="container">
            <?php if ($this->Session->check('Auth.User.id')) :?>
				<?= $this->element('SimplerAdmin/sidebar');?>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <?php echo $this->Session->flash(); ?>
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
<?= $this->Html->script('SimplerAdmin/javascript.js');?>
</body>
</html>
