<!DOCTYPE html>
<html>

<head>
	<?php echo $this->Html->charset(); ?>

	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/grids-responsive-min.css">
    <?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('Pure/style');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>

<body>
<div id="layout" class="pure-g">
    <?= $this->element('sidebar'); ?>
    <div class="content pure-u-1 pure-u-md-3-4">
        <div>
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->fetch('content'); ?>
            <div class="footer">
                <div class="pure-menu pure-menu-horizontal pure-menu-open">
                    <ul>
                        <li><a href="http://purecss.io/">About</a></li>
                        <li><a href="http://twitter.com/yuilibrary/">Twitter</a></li>
                        <li><a href="http://github.com/yahoo/pure/">GitHub</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="nk-page-up-button-wp">
        <p id="page-top-button">
        </p>
    </div>
</div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<?= $this->Html->script('Pure/javascript');?>
</body>
</html>
