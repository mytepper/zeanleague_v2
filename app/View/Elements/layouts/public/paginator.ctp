<?php $paginator = $this->Paginator; ?>
<ul class="pagination pagination-sm pull-right">
	<?php
	   echo $this->Paginator->prev(__('ก่อนหน้า'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
	   echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
	   echo $this->Paginator->next(__('ถัดไป'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
	?>
</ul>
