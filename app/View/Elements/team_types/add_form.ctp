<?php
$title = (isset($this->request->data['TeamType']['id'])) ? 'แก้ไขข้อมูล' : 'เพิ่มข้อมูล';
?>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
		  <h3 class="box-title"><?php echo $title;?></h3>
		  <?php echo $this->Flash->render('team_types');?>
		</div>
		<div class="box-body">
			<?php
			echo $this->Form->create('TeamType', array(
				'inputDefaults' => array(
					'label' => false,
					'div' => true,
				),
				'novalidate' => true,
			));
			?>
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<?php echo $this->Form->input('name', array(
							'class' => 'form-control',
							'placeholder' => 'ชื่อ *'
						));?>
						<?php
						if (isset($this->request->data['TeamType']['id'])) {
							echo $this->Form->input('id');
						}
						?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<?php echo $this->Form->input('country',
						    array(
						      'label'=> 'ประเทศ' ,
						      'type'=>'checkbox',
						      'before' => '<label></lablel>',
						      'div' => true
						 )); ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<?php echo $this->Form->input('leage',
						    array(
						      'label'=> 'สโมสร' ,
						      'type'=>'checkbox',
						      'before' => '<label></lablel>',
						      'div' => true
						 )); ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<?php echo $this->Form->input('division', array(
							'class' => 'form-control',
							'label' => false,
							'options' => array(
								'0' => 'ไม่มี',
								'1' => 1,
								'2' => 2,
								'3' => 3,
							)
						));?>
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
						 <?php echo $this->Html->link('ยกเลิก', '/team_types/index', array(
							'class' => 'btn btn-default'
						 ));?>
					</div>
				</div>
			</div>
			<?php echo $this->Form->end();?>
			</div>
	</div>
</section>
