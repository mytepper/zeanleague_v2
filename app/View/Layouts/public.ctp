<!DOCTYPE html>
<html>
<base href="<?php echo Router::url('/');?>">
<head>
	<?php echo $this->Html->charset('UTF-8'); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->script('lib/require', array(
			'data-main' => 'js/app'
		));
		echo $this->Html->css('public/bootstrap', array('inline' => true));
		echo $this->Html->css('public/carousel', array('inline' => true));
		echo $this->Html->css('public/template', array('inline' => true));
		echo $this->Html->css('font-awessome', array('inline' => true));
	?>
</head>
<body>
		<?php echo $this->element('layouts/public/nav');?>
		<?php echo $this->fetch('carousel');?>
		<?php echo $this->fetch('tab_bottom_carousel');?>
		<!-- =============================================== -->

		<!-- Content Wrapper. Contains page content -->
		<div class="container content-wrapper">
			<?php //echo $this->Flash->render(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<footer>
			<div class="container">
				<?php echo $this->element('layouts/public/footer');?>
			</div>
		</footer>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
