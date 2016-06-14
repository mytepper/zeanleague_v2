<?php $paginator = $this->Paginator; ?>
<table class="table">
	<thead>
		<th><?php echo $paginator->sort('TeamType.id', 'ID');?></th>
		<th><?php echo $paginator->sort('TeamType.name', 'ชื่อ');?></th>
		<th><?php echo $paginator->sort('TeamType.country', 'ประเภทประเทศ');?></th>
		<th><?php echo $paginator->sort('TeamType.leage', 'ประเภทลีค');?></th>
		<th><?php echo $paginator->sort('TeamType.division', 'ระดับชั้น');?></th>
		<th></th>
	</thead>
	<tbody>
	<?php if ($teamTypes) :?>
		<?php foreach ($teamTypes as $key => $value) : ?>
			<tr>
				<td><?php echo $value['TeamType']['id'];?></td>
				<td><?php echo h($value['TeamType']['name']);?></td>
				<td><?php echo ($value['TeamType']['country']) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-remove text-danger"></i>';?></td>
				<td><?php echo ($value['TeamType']['leage']) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-remove text-danger"></i>';?></td>
				<td><?php echo ($value['TeamType']['division']) ? $value['TeamType']['division'] : '<i class="fa fa-remove text-danger"></i>';?></td>
				<td>
					<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', '/team_types/edit/' . $value['TeamType']['id'], array(
						'class' => 'btn btn-success',
						'escape' => false
					));?>
					<?php echo $this->Html->link('<i class="fa fa-remove"></i>', '/team_types/delete/' . $value['TeamType']['id'], array(
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
