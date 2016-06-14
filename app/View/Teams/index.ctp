<?php
$this->layout = 'admin';
$this->set('title_for_layout', 'title_for_layout');
echo $this->element('teams/index_content_tab');
$this->Html->scriptStart(array('inline' => true));
?>
requirejs(["app/team_types_index"]);
<?php echo $this->Html->scriptEnd();?>
