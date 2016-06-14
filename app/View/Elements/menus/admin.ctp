<?php
$active = $this->params['controller'];
$menu = array(
	array(
		'title' => 'Dashboard',
		'url' => '/dashboard',
		'active' => ($active == 'dashboard') ? 'active' : ''
	),
	array(
		'title' => 'จัดการข้อมูลสมาชิก',
		'url' => '/members',
		'active' => ($active == 'members') ? 'active' : ''
	),
	array(
		'title' => 'จัดการข้อมูลประเภททีมฟุตบอล',
		'url' => '/team_types',
		'active' => ($active == 'team_types') ? 'active' : ''
	),
	array(
		'title' => 'จัดการข้อมูลทีมฟุตบอล',
		'url' => '/teams',
		'active' => ($active == 'teams') ? 'active' : ''
	),
	array(
		'title' => 'จัดการข้อมูลประเภทการแข่งขัน',
		'url' => '/competitions_types',
		'active' => ($active == 'competitions_types') ? 'active' : ''
	),
	array(
		'title' => 'จัดการข้อมูลการแข่งขัน',
		'url' => '/teams_competitions',
		'active' => ($active == 'teams_competitions') ? 'active' : ''
	),
	array(
		'title' => 'จัดการข้อมูลกิจกรรมข่าวสาร',
		'url' => '/events',
		'active' => ($active == 'events') ? 'active' : ''
	)
);
?>

<aside class="main-sidebar">
	<section class="sidebar">
	<div class="user-panel">
	</div>
		<ul class="sidebar-menu">
			<li class="header">MAIN NAVIGATION</li>
			<?php
			foreach ($menu as $key => $value) :
			?>
				<li class="treeview <?php echo $value['active'];?>">
				 	<?php echo $this->Html->link($value['title'], $value['url']);?>
				</li>
			<?php endforeach; ?>
		</ul>
	</section>
</aside>
