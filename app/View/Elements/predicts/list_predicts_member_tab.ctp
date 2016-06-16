<div class="row">
	<div class="col-lg-4 col-lg-4 col-sm-4 text-right">
		<?php
		echo $this->Form->create('Predict', array(
			'inputDefaults' => array(
				'label' => false,
				'div' => false
			),
			'novalidate' => true,
			'type' => 'get'
		));
		?>
		<div class="input-group-btn">
		  <?php echo $this->Form->input('key', array(
			  'type' => 'search',
			  'class' => 'form-control pull-right',
			  'value' => (isset($this->request->query['key'])) ? $this->request->query['key'] : ''
		  ));?>
		<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
		</div>
		<?php echo $this->Form->end();?>
	</div>
	<div class="col-lg-4 col-lg-4 col-sm-4 text-right">

	</div>
	<div class="col-lg-4 col-lg-4 col-sm-4 text-right">
		<?php echo  $this->element('layouts/public/paginator');?>
	</div>
</div>
