<?php
	$this->layout = 'public';
	$this->set('title', 'index');
	$this->Html->scriptStart(array('inline' => true));
	echo $this->element('users/form_login');
	$this->Html->scriptStart(array('inline' => true));
?>
	requirejs(["app/index"]);
<?php echo $this->Html->scriptEnd();?>
