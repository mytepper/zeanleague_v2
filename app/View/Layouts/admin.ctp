<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<base href="<?php echo Router::url('/');?>">
<head>
	<?php echo $this->Html->charset('UTF-8'); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->script('lib/require', array(
			'data-main' => 'js/app'
		));
		echo $this->Html->css('bootstrap', array('inline' => true));
		echo $this->Html->css('AdminLTE', array('inline' => true));
		echo $this->Html->css('_all-skins', array('inline' => true));
		echo $this->Html->css('style', array('inline' => true));
		echo $this->Html->css('font-awessome', array('inline' => true));

	?>
</head>
<body class="hold-transition skin-blue sidebar-mini admin">
	<div class="wrapper">

		<?php echo $this->element('layouts/header');?>

		<!-- =============================================== -->

		<?php echo $this->element('menus/admin');?>

		<!-- =============================================== -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<?php echo $this->Flash->render(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<!-- /.content-wrapper -->
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
