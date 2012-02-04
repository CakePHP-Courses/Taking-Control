<div class="labels form span9">
<?php echo $this->Form->create('Label');?>
	<fieldset>
		<legend><?php echo __('Add Label'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('Photo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="span2 offset1">
	<ul class="nav nav-pills nav-stacked">

		<li><?php echo $this->Html->link(__('List Labels'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Photos'), array('controller' => 'photos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo'), array('controller' => 'photos', 'action' => 'add')); ?> </li>
	</ul>
</div>
