<?php
$this->layout = 'admin';
$this->set('title_for_layout', 'title_for_layout');
echo $this->element('teams/edit_form');
$this->Html->scriptStart(array('inline' => true));
?>
requirejs(["app/team_form_index"]);
<?php echo $this->Html->scriptEnd();?>
