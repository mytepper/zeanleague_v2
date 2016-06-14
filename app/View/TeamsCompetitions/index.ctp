<?php
$this->layout = 'admin';
$this->set('title_for_layout', 'title_for_layout');
echo $this->element('teams_competitions/index_content_tab');
$this->Html->scriptStart(array('inline' => true));
?>
requirejs(["app/teams_competitions_index"]);
<?php echo $this->Html->scriptEnd();?>
