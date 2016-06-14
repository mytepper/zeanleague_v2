<?php
	$this->layout = 'public';
	$this->set('title', 'index');
	$this->Html->scriptStart(array('inline' => true));
	echo $this->element('members/member_menu');
	echo $this->element('members/form_profile');
	$this->Html->scriptStart(array('inline' => true));
?>
	requirejs(["app/member_profile"]);
<?php echo $this->Html->scriptEnd(); ?>
