<?php
$this->layout = 'public';
$this->set('title', 'Passed');
echo $this->element('teams_competitions/lists_predicts_table');
$this->Html->scriptStart(array('inline' => true));
?>
requirejs(["app/predict_main"]);
<?php echo $this->Html->scriptEnd();?>
