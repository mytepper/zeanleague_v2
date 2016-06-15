<?php
$this->layout = 'public';
$this->set('title', 'index');

$this->start('carousel');
	echo $this->element('layouts/public/carousel');
$this->end('carousel');

$this->start('tab_bottom_carousel');
 echo $this->element('menus/public/tab_bottom_carousel');
$this->end('tab_bottom_carousel');

$this->Html->scriptStart(array('inline' => true));
?>
requirejs(["app/index"]);
<?php echo $this->Html->scriptEnd();?>

<div class="row">
	<div class="col-xs-12 col-md-12 col-sm-12">
		<?php echo $this->element('teams_competitions/lists_today_table');?>
	</div>
</div>
