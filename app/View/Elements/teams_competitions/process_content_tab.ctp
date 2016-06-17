<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
		  	<h3 class="box-title">ข้อมูลทีมแบบรายการ</h3>
			<?php echo $this->Html->link('<i class="fa fa-plus-square"></i> เพิ่มข้อมูล', '/teams_competitions/add', array('class' => 'btn btn-success', 'escape' => false)) ?>
			<div class="box-tools">
				<div style="width: 150px;" class="input-group input-group-sm">
					<?php
					echo $this->Form->create('TeamsCompetition', array(
						'inputDefaults' => array(
							'label' => false,
							'div' => false
						),
						'novalidate' => true,
						'type' => 'get'
					));
					?>
				  <div class="input-group-btn">
					  <?php echo $this->Form->input('key', array(
						  'class' => 'form-control pull-right',
						  'value' => (isset($this->request->query['key'])) ? $this->request->query['key'] : ''
					  ));?>
				    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
				  </div>
				  <?php echo $this->Form->end();?>
				</div>
			</div>
		</div>
		<div class="box-body" id="teams_competitions-container">
			<?php echo $this->element('teams_competitions/process_content_table'); ?>
		</div>
	</div>
</section>
