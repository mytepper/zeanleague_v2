<?php
$this->layout = 'public';
$this->set('title', 'index');
$this->Html->scriptStart(array('inline' => true));
?>
requirejs(["app/index"]);
<?php echo $this->Html->scriptEnd();?>
<div class="row">
	<div class="col-xs-12 col-md-12 col-sm-12">
		<?php
			echo $this->Form->create();

			echo $this->Form->input('username');   //text
			echo $this->Form->input('password');   //password
			echo $this->Form->input('approved');   //day, month, year, hour, minute,
			                               //meridian
			echo $this->Form->input('quote');      //textarea

			echo $this->Form->end('Add');
		?>
	</div>
</div>
