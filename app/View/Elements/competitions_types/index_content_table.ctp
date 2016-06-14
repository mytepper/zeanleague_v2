<?php $paginator = $this->Paginator; ?>
<table class="table">
	<thead>
		<th><?php echo $paginator->sort('CompetitionsType.id', 'ID');?></th>
		<th>Logo</th>
		<th><?php echo $paginator->sort('CompetitionsType.name', 'ชื่อ');?></th>
		<th><?php echo $paginator->sort('CompetitionsType.start_date', 'วันที่เริ่มฤดูการกาล');?></th>
		<th><?php echo $paginator->sort('CompetitionsType.end_date', 'วันที่จบฤดูการกาล');?></th>
		<th><?php echo $paginator->sort('CompetitionsType.year', 'ปี');?></th>
		<th></th>
	</thead>
	<tbody>
	<?php if ($compettitionsTypes) :?>
		<?php foreach ($compettitionsTypes as $key => $value) : ?>
			<tr>
				<td><?php echo h($value['CompetitionsType']['id']);?></td>
				<td>
					<?php
					if ($value['CompetitionsType']['logo_image']) {
						echo $this->Html->image(
						array(
							'controller' => 'images',
							'action' => 'imageThumb',
							'competitions_type',
							'logo_image',
							$value['CompetitionsType']['logo_dir'],
							'thumb_' . $value['CompetitionsType']['logo_image']
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
				<td><?php echo h($value['CompetitionsType']['name']);?></td>
				<td><?php echo h($value['CompetitionsType']['start_date']);?></td>
				<td><?php echo h($value['CompetitionsType']['end_date']);?></td>
				<td><?php echo h($value['CompetitionsType']['year']);?></td>
				<td>
					<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', '/competitions_types/edit/' . $value['CompetitionsType']['id'], array(
						'class' => 'btn btn-success',
						'escape' => false
					));?>
					<?php echo $this->Html->link('<i class="fa fa-remove"></i>', '/competitions_types/delete/' . $value['CompetitionsType']['id'], array(
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
