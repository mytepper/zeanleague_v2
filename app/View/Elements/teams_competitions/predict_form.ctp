<?php if ($result['status']) :?>
	<div class="row">
		<div class="col-md-12 col-lg-12 col-sm-12">
			วันเวลาการแข่งขัน : <?php  echo date('d/m/Y H:i', strtotime($result['result']['TeamsCompetition']['date_time']));?> น.
			<hr>
			ทีมเหย้า: <?php echo $result['result'][0]['team_a'];?> / ทีมเยือน: <?php echo $result['result'][0]['team_b'];?>
			<hr>
			อัตราการต่อรอง: <?php echo $result['result']['Rate']['name'];?>
			<hr>
			ทีมรอง: <?php echo ($result['result']['TeamsCompetition']['team'] == 'A') ? $result['result'][0]['team_a'] : $result['result'][0]['team_b'];?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-lg-12 col-sm-12">
			<?php echo $this->Flash->render('predicts');?>
			<div class="row">
				<?php
					echo $this->Form->create('Predict', array(
						'method' => 'post',
						'novalidate' => true
					));
				?>
				<div class="col-md-4 col-lg-4 col-sm-4">
					<div class="form-group">
						<?php echo $this->Form->input('teams_competition_id', array(
							'type' => 'hidden',
							'value' => $result['result']['TeamsCompetition']['id']
						));?>
						<?php
							echo $this->Form->input('team_a_score', array(
								'label' => 'สกอทีมเหย้า *',
								'class' => 'form-control'
							));
						?>
					</div>
				</div>
				<div class="col-md-4 col-lg-4 col-sm-4">
					<div class="form-group">
						<?php
							echo $this->Form->input('team_b_score', array(
								'label' => 'สกอทีมเยือน *',
								'class' => 'form-control'
							));
						?>
					</div>
				</div>
				<div class="col-md-4 col-lg-4 col-sm-4">
					<div class="form-group">
						<?php
							echo $this->Form->input('team', array(
								'label' => 'เลือกทีมที่ชนะ',
								'class' => 'form-control',
								'options' => array(
									'A' => 'ทีมเหย้า',
									'B' => 'ทีมเยือน'
								)
							));
						?>
					</div>
				</div>
				<div class="col-md-12 col-lg-12 col-sm-12">
					<div class="form-group">
						<?php
							echo $this->Form->button('ยืนยันการทายผล', array(
								'type' => 'submit',
								'class' => 'btn btn-primary btn-submit'
							));
							echo $this->Form->end();
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php else: ?>
	<div class="row">
		<div class="col-md-12 col-lg-12 col-sm-12 alert alert-danger">
			<?php echo $result['result'];?>
		</div>
	</div>
<?php endif; ?>
