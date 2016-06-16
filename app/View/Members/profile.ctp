<?php
	$this->layout = 'public';
	$this->set('title', 'index');
	$this->Html->scriptStart(array('inline' => true));

	$this->start('member_tab');
		echo $this->element('layouts/public/member_tab');
	$this->end();

	echo $this->element('members/form_profile');
	$this->Html->scriptStart(array('inline' => true));
?>
	requirejs(["app/member_profile"]);
<?php echo $this->Html->scriptEnd(); ?>
