<?php
	echo $this->Html->link('Link', '/' . Router::url('/', true) . 'users/registerConfirm?token=' . $user['User']['token'], array(
		'target' => '_blank'
	));
?>
