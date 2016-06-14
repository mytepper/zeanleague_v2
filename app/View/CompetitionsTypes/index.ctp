<?php
$this->layout = 'admin';
$this->set('title_for_layout', 'title_for_layout');
echo $this->element('competitions_types/index_content_tab');
$this->Html->scriptStart(array('inline' => true));
?>
requirejs(["app/competitions_type_index"]);
<?php echo $this->Html->scriptEnd();?>
