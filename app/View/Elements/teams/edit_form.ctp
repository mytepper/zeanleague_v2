<?php
$title = (isset($this->request->data['Team']['id'])) ? 'แก้ไขข้อมูล' : 'เพิ่มข้อมูล';
?>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
		  <h3 class="box-title"><?php echo $title;?></h3>
		  <?php echo $this->Flash->render('teams');?>
		</div>
		<div class="box-body">
			<?php
			echo $this->Form->create('Team', array(
				'inputDefaults' => array(
					'label' => false,
					'div' => true,
				),
				'url' => '/teams/uploadLogo',
				'novalidate' => true,
				'type' => 'file',
				'id' => 'upload-logo'
			));
			?>
			<div class="row">
				<?php
				if (isset($this->request->data['Team']['id'])) {
					echo '<div class="col-sm-1">';
					if ($this->request->data['Team']['logo_image']) {
						echo $this->Html->image(
						array(
							'controller' => 'images',
							'action' => 'imageThumb',
							'team',
							'logo_image',
							$this->request->data['Team']['logo_dir'],
							'thumb_' . $this->request->data['Team']['logo_image']
						)
						, array('width' => '100', 'class' => 'img-thumbnail' ));
					} else {
						echo $this->Html->image('noimagefound.jpg', array('width' => '100', 'class' => 'img-thumbnail'));
					}
					echo '</div>';
				}
				?>
				<div class="col-sm-4">
					<div class="form-group">
						<?php echo $this->Form->input('logo_image', array(
							'class' => 'form-control',
							'type' => 'file'
						));?>
						<?php echo $this->Form->input('logo_dir', array(
							'type' => 'hidden'
						));?>
						<?php
						if (isset($this->request->data['Team']['id'])) {
							echo $this->Form->input('id');
						}
						?>
						<i>ไฟล์ Logo ขนาด 100*100 Pixcel</i>
					</div>
				</div>
			</div>
			<?php echo $this->Form->end();?>
			<?php
			echo $this->Form->create('Team', array(
				'inputDefaults' => array(
					'label' => false,
					'div' => true,
				),
				'novalidate' => true,
				'type' => 'file'
			));
			?>
			<div class="row">
				<div class="col-sm-12">
					<br>
					<div class="form-group">
						<?php echo $this->Form->input('name', array(
							'class' => 'form-control',
							'placeholder' => 'ชื่อ *'
						));?>
						<?php
						if (isset($this->request->data['Team']['id'])) {
							echo $this->Form->input('id');
						}
						?>
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
						<?php echo $this->Form->input('team_type_id', array(
							'class' => 'form-control',
							'label' => false,
							'empty' => 'กรุณาเลือกประเภททีม',
							'options' => $teamTypes
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
						 <?php echo $this->Html->link('ยกเลิก', '/teams/index', array(
							'class' => 'btn btn-default'
						 ));?>
					</div>
				</div>
			</div>
			<?php echo $this->Form->end();?>
			</div>
	</div>
</section>
