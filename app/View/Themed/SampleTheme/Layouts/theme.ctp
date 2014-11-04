
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" lang="ja">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="ja">
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html lang="ja">
<!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<title><?= $title_for_layout ;?></title>
	<?= $this->Html->css('SampleTheme/style');?>
	<?php
		echo $this->Html->meta('keywords',$meta_keyword);
		echo $this->Html->meta('description',$meta_description);
	?>
	<!--[if lt IE 9]>
	<script src="http://fordevelop.devmasso.info/wordpress/wp-content/themes/twentyfourteen/js/html5.js"></script>
	<![endif]-->
	<!--[if lt IE 9]>
	<link rel='stylesheet' id='twentyfourteen-ie-css'  href='http://fordevelop.devmasso.info/wordpress/wp-content/themes/twentyfourteen/css/ie.css?ver=20131205' type='text/css' media='all' />
	<![endif]-->
	<script type='text/javascript' src='http://fordevelop.devmasso.info/wordpress/wp-includes/js/jquery/jquery.js?ver=1.11.0'></script>
	<script type='text/javascript' src='http://fordevelop.devmasso.info/wordpress/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.2.1'></script>
	<?php if ($this->action === 'index') :?>
		<body class="home blog masthead-fixed list-view full-width grid">
	<?php else :?>
		<body class="home blog masthead-fixed full-width grid">
	<?php endif;?>
	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header" role="banner">
			<div class="header-main">
				<h1 class="site-title">
					<?= 
						$this->Html->link($setting['Setting']['site_name'],[
							'controller' => '/',
						]);
					?>
				</h1>
			</div>
		</header><!-- #masthead -->
		<div id="main" class="site-main" role="main">
			<div id="main-content" class="main-content">
				<div id="primary" class="content-area">
					<div id="content" class="site-content">
						<?= $this->fetch('content');?>
					</div><!-- #content -->
				</div><!-- #primary -->
			</div><!-- #main-content -->
			<?= $this->element('sidebar');?>
		</div><!-- #main -->
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="http://ja.wordpress.org/">Powered by Simpler</a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<script type='text/javascript' src='http://fordevelop.devmasso.info/wordpress/wp-content/themes/twentyfourteen/js/functions.js?ver=20140319'></script>
</body>
</html>
