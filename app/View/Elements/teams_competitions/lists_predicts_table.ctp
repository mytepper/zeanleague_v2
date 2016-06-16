<div class="row" id="predict-container">
	<div class="col-sm-4 col-lg-4 col-md-4">
		<div class="row">
			<div class="col-sm-12 col-lg-12 col-md-12">
				<h4>การทายผลในวันนี้</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-sm-12 col-lg-12 col-md-12" id="predicts-member-today">

			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-lg-12 col-md-12">
				<?php echo $this->Html->link('ดูทั้งหมดของฉัน >>', '/predicts/index', array(
					'class' => 'btn btn-default'
				));?>
			</div>
		</div>
	</div>
	<div class="col-sm-8 col-lg-8 col-md-8">
		<div class="row">
			<div class="col-sm-12 col-lg-12 col-md-12">

			</div>
		</div>
		<hr>
		<table class="table table-hover">
			<thead>
				<th>เวลาแข่งขัน</th>
				<th>ทีมเหย้า</th>
				<th>ผลการแข่งขัน</th>
				<th>ทีมเยือน</th>
				<th>อัตราการต่อรอง</th>
				<th>ทีมรอง</th>
				<th>ทายผล</th>
			</thead>
			<tbody>
			<?php if ($teamsCompetitions) :?>
				<?php
				foreach ($teamsCompetitions as $key => $value) :
				?>
					<tr style="background-color:#<?php echo dechex(rand(0xeeeeee, 0xFFFFFF));?>">
						<td colspan="7">
							<?php echo h($value['competitionsType']);?>
						</td>
					</tr>
					<?php foreach ($value['result'] as $index => $teamsCompetition) :?>
					<tr>
						<td><?php echo date('H:i', strtotime($teamsCompetition['TeamsCompetition']['date_time']));?></td>
						<td>
							<?php
							if ($teamsCompetition[0]['team_a_logo']) {
								echo $this->Html->image(
								array(
									'controller' => 'images',
									'action' => 'imageThumb',
									'team',
									'logo_image',
									$teamsCompetition['TeamsCompetition']['team_a_id'],
									'thumb_' . $teamsCompetition[0]['team_a_logo']
								),
								array(
									'width' => '28',
									'height' => '28',
									'class' => 'img-thumbnail'
								));
							} else {
								echo $this->Html->image('noimagefound.jpg', array('width' => '28' ));
							}
							?>
							<?php echo h($teamsCompetition[0]['team_a']);?>
						</td>
						<td>
							<?php if ($teamsCompetition['TeamsCompetition']['date_time'] < date('Y-m-d H:i:s')) :?>
								<?php echo $teamsCompetition['TeamsCompetition']['team_a_score'];?> -
								<?php echo $teamsCompetition['TeamsCompetition']['team_b_score'];?>
							<?php else: ?>
								N/A
							<?php endif; ?>
						</td>
						<td>
							<?php
							if ($teamsCompetition[0]['team_b_logo']) {
								echo $this->Html->image(
								array(
									'controller' => 'images',
									'action' => 'imageThumb',
									'team',
									'logo_image',
									$teamsCompetition['TeamsCompetition']['team_b_id'],
									'thumb_' . $teamsCompetition[0]['team_b_logo']
								),
								array(
									'width' => '28',
									'height' => '28',
									'class' => 'img-thumbnail'
								));
							} else {
								echo $this->Html->image('noimagefound.jpg', array('width' => '28' ));
							}
							?>
							<?php echo h($teamsCompetition[0]['team_b']);?>
						</td>
						<td>
							<?php echo h($teamsCompetition['Rate']['name']);?>
						</td>
						<td>
							<?php echo ($teamsCompetition['TeamsCompetition']['team'] == 'A') ? $teamsCompetition[0]['team_a'] : $teamsCompetition[0]['team_b'];?>
						</td>
						<td>
							<?php if ($teamsCompetition['TeamsCompetition']['date_time'] < date('Y-m-d H:i:s')) :?>
							<button type="button" class="btn btn-default disabled"><i class="fa fa-ban"></i></button>
							<?php else: ?>
							<button type="button" class="btn btn-primary btn-predict" data-id="<?php echo $teamsCompetition['TeamsCompetition']['id']?>" name="button"><i class="fa fa-futbol-o" aria-hidden="true"></i></button>
							<?php endif; ?>
						</td>
					</tr>
					<?php endforeach; ?>
				<?php endforeach; ?>
			<?php endif; ?>
			</tbody>
		</table>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="PredictModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">ทายผลฟุตบอล</h4>
	      </div>
	      <div class="modal-body">

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>
</div>
