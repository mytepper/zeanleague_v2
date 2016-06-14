<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
		  <h3 class="box-title">เพิ่มข้อมูล</h3>
		  <?php echo $this->Flash->render('competitions_types');?>
		</div>
		<div class="box-body">
			<?php
			echo $this->Form->create('CompetitionsType', array(
				'inputDefaults' => array(
					'label' => false,
					'div' => true,
				),
				'novalidate' => true,
				'type' => 'file'
			));
			?>
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<?php echo $this->Form->input('logo_image', array(
							'class' => 'form-control',
							'type' => 'file'
						));?>
						<?php echo $this->Form->input('logo_dir', array(
							'type' => 'hidden'
						));?>
						<i>ไฟล์ Logo ขนาด 100*100 Pixcel</i>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-2">
					วันที่เริ่มฤดูกาลแข่งขัน/วันที่เริ่มการแข่งขัน
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<?php echo $this->Form->input('start_date', array(
							'class' => 'form-control'
						));?>
					</div>
				</div>
				<div class="col-sm-2">
					วันที่จบฤดูกาลแข่งขัน/วันที่จบการแข่งขัน
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<?php echo $this->Form->input('end_date', array(
							'class' => 'form-control'
						));?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<?php echo $this->Form->input('year', array(
							'class' => 'form-control',
							'placeholder' => 'ปี *'
						));?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<br>
					<div class="form-group">
						<?php echo $this->Form->input('name', array(
							'class' => 'form-control',
							'placeholder' => 'ชื่อ *'
						));?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<?php echo $this->Form->input('description',
						    array(
								'type' => 'textarea',
								'class' => 'form-control',
								'placeholder' => 'ข้อมูลรายละเอียดทีม *'
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
						 <?php echo $this->Html->link('ยกเลิก', '/competitions_types/index', array(
							'class' => 'btn btn-default'
						 ));?>
					</div>
				</div>
			</div>
			<?php echo $this->Form->end();?>
			</div>
	</div>
</section>
