<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
		  <h3 class="box-title">แก้ไขข้อมูล</h3>
		  <?php echo $this->Flash->render('teams_competitions');?>
		</div>
		<div class="box-body">
			<?php
			echo $this->Form->create('TeamsCompetition', array(
				'inputDefaults' => array(
					'label' => false,
					'div' => true,
				),
				'novalidate' => true,
				'type' => 'file'
			));
			echo $this->Form->input('id');
			?>
			<div class="row">
				<div class="col-sm-2">
					วัน/เวลา ที่เริ่มการแข่งขัน
				</div>
				<div class="col-sm-8">
					<div class="form-group">
						<?php echo $this->Form->input('date_time', array(
							'class' => ''
						));?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-2">
					ประเภทการแข่งขัน
				</div>
				<div class="col-sm-10">
					<div class="form-group">
						<?php echo $this->Form->input('competitions_type_id', array(
							'class' => 'form-control',
							'empty' => 'ประเภทการแข่งขัน',
							'options' => $competitionsTypes
						));?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-2">
					ทีมเหย้า
				</div>
				<div class="col-sm-10">
					<div class="form-group">
						<?php echo $this->Form->input('team_a_id', array(
							'class' => 'form-control',
							'empty' => 'ทีมเหย้า *',
							'options' => $teams
						));?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-2">
					ทีมเยือน
				</div>
				<div class="col-sm-10">
					<div class="form-group">
						<?php echo $this->Form->input('team_b_id', array(
							'class' => 'form-control',
							'empty' => 'ทีมเยือน *',
							'options' => $teams
						));?>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-2">
					คะแนนสูงสุดที่จะได้รับ
				</div>
				<div class="col-sm-10">
					<br>
					<div class="form-group">
						<?php echo $this->Form->input('max_score', array(
							'class' => 'form-control',
							'placeholder' => 'คะแนนสูงสุดที่จะได้รับ *',
							'value' => 5
						));?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-2">
					การต่อรอง
				</div>
				<div class="col-sm-10">
					<div class="form-group">
						<?php echo $this->Form->input('rate_id', array(
							'type' => 'select',
							'class' => 'form-control',
							'empty' => 'อัตราการต่อรอง',
							'options' => $rates
						));?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-2">
					ทีมรอง
				</div>
				<div class="col-sm-10">
					<div class="form-group">
						<?php echo $this->Form->input('team',
						    array(
								'type' => 'select',
								'class' => 'form-control',
								'placeholder' => 'ทีมรอง *',
								'options' => array(
									'A' => 'A',
									'B' => 'B'
								)
						 )); ?>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<?php echo $this->Form->button('บันทึก', array(
							  'class' => 'btn btn-primary',
							  'type' => 'submit'
						 ));?>
						 <?php echo $this->Html->link('ยกเลิก', '/teams_competitions/index', array(
							'class' => 'btn btn-default'
						 ));?>
					</div>
				</div>
			</div>
			<?php echo $this->Form->end();?>
			</div>
	</div>
</section>
