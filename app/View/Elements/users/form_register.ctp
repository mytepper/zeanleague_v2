<div class="row">
	<div class="col-md-6 col-lg-6 col-sm-6">

	</div>
	<div class="col-md-6 col-lg-6 col-sm-6">
		<div class="row">
			<div class="col-md-12 col-lg-12 col-sm-12">
				<?php
					echo $this->Form->create('User', array(
						'method' => 'post',
						'novalidate' => true
					));
				?>
				<div class="form-group">
					<?php
						echo $this->Form->input('email', array(
							'class' => 'form-control'
						));
					?>
				</div>
				<div class="form-group">
					<?php
						echo $this->Form->input('password', array(
							'class' => 'form-control'
						));
					?>
				</div>
				<div class="form-group">
					<?php
						echo $this->Form->input('password_confirm', array(
							'class' => 'form-control',
							'type' => 'password'
						));
					?>
				</div>
				<div class="form-group">
					<?php
						echo $this->Form->button('Register', array(
							'class' => 'btn btn-default'
						));
						echo $this->Form->end();
					?>
				</div>
			</div>
		</div>
	</div>
</div>
