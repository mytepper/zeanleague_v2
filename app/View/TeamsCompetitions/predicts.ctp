<?php
$this->layout = 'public';
$this->set('title', 'Passed');

$this->start('member_tab');
	echo $this->element('layouts/public/member_tab');
$this->end();

echo $this->element('teams_competitions/lists_predicts_table');
$this->Html->scriptStart(array('inline' => true));
?>
requirejs(["app/predict_main"]);
<?php echo $this->Html->scriptEnd();?>
