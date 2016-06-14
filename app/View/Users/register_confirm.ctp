<?php
$this->layout = 'public';
$this->set('title', 'index');
$this->Html->scriptStart(array('inline' => true));
echo $this->element('users/register_confirm');
$this->Html->scriptStart(array('inline' => true));
?>
requirejs(["app/index"]);
<?php echo $this->Html->scriptEnd();?>
