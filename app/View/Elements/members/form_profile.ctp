<div class="row">
	<div class="col-xs-4 col-lg-4 col-sm-4">
		<br>
		<?php
		echo $this->Form->create('Member', array(
			'inputDefaults' => array(
				'label' => false,
				'div' => true,
			),
			'url' => '/members/uploadLogo',
			'novalidate' => true,
			'type' => 'file',
			'id' => 'upload-logo'
		));
		?>
		<div class="row">
			<?php
				echo '<div class="col-sm-12">';
				if (!empty($user['Member']['avatar_image'])) {
					echo $this->Html->image(
					array(
						'controller' => 'images',
						'action' => 'imageThumb',
						'member',
						'avatar_image',
						$user['Member']['avatar_dir'],
						'thumb_' . $user['Member']['avatar_image']
					)
					, array('width' => '200', 'class' => 'img-thumbnail' ));
				} else {
					echo $this->Html->image('noimagefound.jpg', array('width' => '200', 'class' => 'img-thumbnail'));
				}
				echo '</div>';
			?>
			<div class="col-sm-12">
				<hr>
				<div class="form-group">
					<div class="fileUpload btn btn-success">
						<span>Upload</span>
						<?php echo $this->Form->input('avatar_image', array(
							'id' => 'uploadBtn',
							'class' => 'form-control upload',
							'type' => 'file'
						));?>
					</div>
					<?php echo $this->Form->input('avatar_dir', array(
						'type' => 'hidden'
					));?>
					<?php
					if (isset($user['Member']['id'])) {
						echo $this->Form->input('id');
					}
					?>
					ไฟล์ Avatar ขนาด 100*100 Pixcel
				</div>
			</div>
		</div>
		<?php echo $this->Form->end();?>
	</div>
	<div class="col-xs-8 col-lg-8 col-sm-8">
		<?php echo $this->Flash->render('members');?>
		<?php
			echo $this->Form->create('Member', array(
				'method' => 'put',
				'novalidate' => true
			));
			echo $this->Form->input('id');
		?>
		<div class="form-group">
			<?php
			echo $this->Form->input('alias', array(
				'label' => 'ฉายานาม *',
				'class' => 'form-control'
			));
			?>
		</div>
		<div class="form-group">
			<?php
				echo $this->Form->input('first_name', array(
					'label' => 'ชื่อ *',
					'class' => 'form-control'
				));
			?>
		</div>
		<div class="form-group">
			<?php
				echo $this->Form->input('last_name', array(
					'label' => 'นามสกุล *',
					'class' => 'form-control'
				));
			?>
		</div>
		<div class="form-group">
			<?php
				echo $this->Form->input('email', array(
					'label' => 'อีเมล *',
					'class' => 'form-control'
				));
			?>
		</div>
		<div class="form-group">
			<?php
				echo $this->Form->input('phone', array(
					'label' => 'เบอร์โทรศัพท์ *',
					'class' => 'form-control'
				));
			?>
		</div>
		<div class="form-group">
			<?php
				echo $this->Form->input('line', array(
					'label' => 'ไลน์ไอดี (ถ้ามี)',
					'class' => 'form-control'
				));
			?>
		</div>
		<div class="form-group text-center">
			<?php
				echo $this->Form->button('อัพเดทข้อมูลส่วนตัว', array(
					'class' => 'btn btn-primary'
				));
				echo $this->Form->end();
			?>
		</div>
	</div>
</div>
