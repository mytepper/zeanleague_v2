<?php $paginator = $this->Paginator; ?>
<table class="table">
	<thead>
		<th>ประเภทการแข่งขัน</th>
		<th>ทีมเหย้า</th>
		<th>ทีมเยือน</th>
		<th>ทีมรอง</th>
		<th>อัตราการต่อรอง</th>
		<th>ทายผล</th>
	</thead>
	<tbody>
	<?php if ($teamsCompetitions) :?>
		<?php foreach ($teamsCompetitions as $key => $value) : ?>
			<tr>
				<td><?php echo h($value['CompetitionsType']['name']);?></td>
				<td><?php echo h($value[0]['team_a']);?></td>
				<td><?php echo h($value[0]['team_b']);?></td>
				<td>
					<?php echo ($value['TeamsCompetition']['team'] == 'A') ? $value[0]['team_a'] : $value[0]['team_b'];?>
				</td>
				<td><?php echo h($value['Rate']['name']);?></td>
				<td>
					<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', '/teams_competitions/edit/' . $value['TeamsCompetition']['id'], array(
						'class' => 'btn btn-success',
						'escape' => false
					));?>
				</td>
			</tr>
		<?php endforeach; ?>
	<?php endif; ?>
	</tbody>
</table>
