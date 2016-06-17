<table class="table table-hover">
	<thead>
		<th>เวลาแข่งขัน</th>
		<th>ทีมเหย้า</th>
		<th>ทีมเยือน</th>
		<th>สกอที่ทาย</th>
		<th>ทีมที่เลือก</th>
		<th>ยกเลิก</th>
	</thead>
	<tbody>
	<?php if ($predicts) :?>
		<?php foreach ($predicts as $index => $predict) :?>
		<tr>
			<td><?php echo date('H:i', strtotime($predict['TeamsCompetition']['date_time']));?></td>
			<td>
				<?php
				if ($predict[0]['team_a_logo']) {
					echo $this->Html->image(
					array(
						'controller' => 'images',
						'action' => 'imageThumb',
						'team',
						'logo_image',
						$predict['TeamsCompetition']['team_a_id'],
						'thumb_' . $predict[0]['team_a_logo']
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
				<?php echo h($predict[0]['team_a']);?>
			</td>
			<td>
				<?php
				if ($predict[0]['team_b_logo']) {
					echo $this->Html->image(
					array(
						'controller' => 'images',
						'action' => 'imageThumb',
						'team',
						'logo_image',
						$predict['TeamsCompetition']['team_b_id'],
						'thumb_' . $predict[0]['team_b_logo']
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
				<?php echo h($predict[0]['team_b']);?>
			</td>
			<td>
				<?php echo $predict['Predict']['team_a_score'];?> - <?php echo $predict['Predict']['team_b_score'];?>
			</td>
			<td>
				<?php echo ($predict['Predict']['team'] == 'A') ? $predict[0]['team_a'] : '';?>
				<?php echo ($predict['Predict']['team'] == 'B') ? $predict[0]['team_b'] : '';?>
				<?php echo ($predict['Predict']['team'] == 'C') ? 'เสมอ' : '';?>
			</td>
			<td>
				<?php if ($predict['TeamsCompetition']['date_time'] < date('Y-m-d H:i:s')) :?>
				<i class="fa fa-lock text-danger"></i>
				<?php else: ?>
				<button type="button" class="btn btn-danger btn-predict-remove btn-xs" data-id="<?php echo $predict['Predict']['id']?>" name="button"><i class="fa fa-remove" aria-hidden="true"></i></button>
				<?php endif; ?>
			</td>
		</tr>
		<?php endforeach; ?>
	<?php endif; ?>
	</tbody>
</table>
