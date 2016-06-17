<?php
	$menuTab = array(
		array(
			'name' => 'โปรไฟล์',
			'link' => '/members/profile',
			'active' => ($this->params['action'] == 'profile') ? true : false
		),
		array(
			'name' => '<i class="fa fa-futbol-o"></i> ทายผลบอล >>',
			'link' => '/teams_competitions/predicts',
			'active' => ($this->params['action'] == 'predicts') ? true : false
		),
		array(
			'name' => 'การทายผลทั้งหมดของฉัน',
			'link' => '/predicts/member',
			'active' => ($this->params['action'] == 'member') ? true : false
		),
		array(
			'name' => 'การทายผลทั้งหมดของสมาชิก',
			'link' => '/predicts/all',
			'active' => ($this->params['action'] == 'all') ? true : false
		),
		array(
			'name' => 'แลกของรางวัล',
			'link' => '/awards/lists',
			'active' => ($this->params['action'] == 'lists' || $this->params['action'] == 'exchange') ? true : false
		)
	);
?>
<div class="row member-tab">
	<div class="col-md-12 col-lg-12 col-sm-12">
		<ul class="nav nav-pills">
			<?php foreach ($menuTab as $key => $value) :?>
				<li role="presentation">
					<?php
						echo $this->Html->link($value['name'], $value['link'], array(
							'class' => ($value['active']) ? 'active' : '',
							'escape' => false
						));
					?>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
้<hr>
