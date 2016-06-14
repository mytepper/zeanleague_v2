<?php
$this->layout = 'admin';
$this->set('title_for_layout', 'title_for_layout');
echo $this->Html->css('select2.min', array('inline' => true));
echo $this->element('teams_competitions/edit_form');
$this->Html->scriptStart(array('inline' => true));
?>
requirejs(["app/teams_competitions_form"]);
<?php echo $this->Html->scriptEnd();?>
