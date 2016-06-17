<?php $paginator = $this->Paginator; ?>
<table class="table">
	<thead>
		<th><?php echo $paginator->sort('TeamsCompetition.id', 'ID');?></th>
		<th><?php echo $paginator->sort('CompetitionsType.name', 'ประเภทการแข่งขัน');?></th>
		<th>ทีมเหย้า</th>
		<th>ทีมเยือน</th>
		<th>ทีมรอง</th>
		<th><?php echo $paginator->sort('Rate.name', 'อัตราการต่อรอง');?></th>
		<th><?php echo $paginator->sort('TeamsCompetition.team_a_score', 'สกอร์ทีมเหย้า');?></th>
		<th><?php echo $paginator->sort('TeamsCompetition.team_b_score', 'สกอร์ทีมเยือน');?></th>
		<th></th>
	</thead>
	<tbody>
	<?php if ($teamsCompetitions) :?>
		<?php foreach ($teamsCompetitions as $key => $value) : ?>
			<tr>
				<td><?php echo h($value['TeamsCompetition']['id']);?></td>
				<td><?php echo h($value['CompetitionsType']['name']);?></td>
				<td><?php echo h($value[0]['team_a']);?></td>
				<td><?php echo h($value[0]['team_b']);?></td>
				<td>
					<?php echo ($value['TeamsCompetition']['team'] == 'A') ? $value[0]['team_a'] : $value[0]['team_b'];?>
				</td>
				<td><?php echo h($value['Rate']['name']);?></td>
				<td><?php echo h($value['TeamsCompetition']['team_a_score']);?></td>
				<td><?php echo h($value['TeamsCompetition']['team_b_score']);?></td>
				<td>
					<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', '/teams_competitions/edit/' . $value['TeamsCompetition']['id'], array(
						'class' => 'btn btn-success',
						'escape' => false
					));?>
					<?php echo $this->Html->link('<i class="fa fa-remove"></i>', '/teams_competitions/delete/' . $value['TeamsCompetition']['id'], array(
						'class' => 'btn btn-danger delete',
						'escape' => false
					));?>
				</td>
			</tr>
		<?php endforeach; ?>
	<?php endif; ?>
	</tbody>
</table>
<?php echo $this->element('layouts/paginator_bottom');?>
