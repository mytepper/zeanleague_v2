<?php
$this->layout = 'public';
$this->set('title', 'Passed');

$this->start('member_tab');
	echo $this->element('layouts/public/member_tab');
$this->end();
echo $this->element('predicts/list_predicts_member_table');
