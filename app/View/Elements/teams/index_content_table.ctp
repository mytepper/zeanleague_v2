<?php $paginator = $this->Paginator; ?>
<table class="table">
	<thead>
		<th><?php echo $paginator->sort('Team.id', 'ID');?></th>
		<th>Logo</th>
		<th><?php echo $paginator->sort('Team.name', 'ชื่อ');?></th>
		<th><?php echo $paginator->sort('TeamType.name', 'ประเภททีม');?></th>
		<th><?php echo $paginator->sort('Team.division', 'ระดับชั้น');?></th>
		<th></th>
	</thead>
	<tbody>
	<?php if ($teams) :?>
		<?php foreach ($teams as $key => $value) : ?>
			<tr>
				<td><?php echo h($value['Team']['id']);?></td>
				<td>
					<?php
					if ($value['Team']['logo_image']) {
						echo $this->Html->image(
						array(
							'controller' => 'images',
							'action' => 'imageThumb',
							'team',
							'logo_image',
							$value['Team']['logo_dir'],
							'thumb_' . $value['Team']['logo_image']
						),
						array(
							'width' => '50',
							'height' => '50',
							'class' => 'img-thumbnail'
						));
					} else {
						echo $this->Html->image('noimagefound.jpg', array('width' => '50' ));
					}
					?>
				</td>
				<td><?php echo h($value['Team']['name']);?></td>
				<td><?php echo h($value['TeamType']['name']);?></td>
				<td>
					<?php echo ($value['TeamType']['leage'] == 1 && $value['TeamType']['country'] == 0) ? $value['TeamType']['leage'] : 'ทีมชาติ'; ?>
				</td>
				<td>
					<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', '/teams/edit/' . $value['Team']['id'], array(
						'class' => 'btn btn-success',
						'escape' => false
					));?>
					<?php echo $this->Html->link('<i class="fa fa-remove"></i>', '/teams/delete/' . $value['Team']['id'], array(
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
