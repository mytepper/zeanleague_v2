<?php $paginator = $this->Paginator; ?>
<table class="table table-hover">
	<thead>
		<th><?php echo $paginator->sort('TeamsCompetition.date_time', 'วันที่แข่งขัน');?></th>
		<th>เวลาแข่งขัน</th>
		<th><?php echo $paginator->sort('CompetitionsType.name', 'ประเภทการแข่งขัน');?></th>
		<th>ทีมเหย้า</th>
		<th>ผลการแข่งขัน</th>
		<th>ทีมเยือน</th>
	</thead>
	<tbody>
	<?php if ($teamsCompetitions) :?>
		<?php
		foreach ($teamsCompetitions as $key => $value) :
		?>
			<tr>
				<td><?php echo date('d/m/Y', strtotime($value['TeamsCompetition']['date_time']));?></td>
				<td><?php echo date('H:i', strtotime($value['TeamsCompetition']['date_time']));?></td>
				<td><?php echo h($value['CompetitionsType']['name']);?></td>
				<td>
					<?php
					if ($value[0]['team_a_logo']) {
						echo $this->Html->image(
						array(
							'controller' => 'images',
							'action' => 'imageThumb',
							'team',
							'logo_image',
							$value['TeamsCompetition']['team_a_id'],
							'thumb_' . $value[0]['team_a_logo']
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
					<?php echo h($value[0]['team_a']);?>
				</td>
				<td>
					<?php echo $value['TeamsCompetition']['team_a_score'];?> -
					<?php echo $value['TeamsCompetition']['team_b_score'];?>
				</td>
				<td>
					<?php
					if ($value[0]['team_b_logo']) {
						echo $this->Html->image(
						array(
							'controller' => 'images',
							'action' => 'imageThumb',
							'team',
							'logo_image',
							$value['TeamsCompetition']['team_b_id'],
							'thumb_' . $value[0]['team_b_logo']
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
					<?php echo h($value[0]['team_b']);?>
				</td>
			</tr>
		<?php endforeach; ?>
	<?php endif; ?>
	</tbody>
</table>
<?php echo $this->element('layouts/paginator_bottom');?>
