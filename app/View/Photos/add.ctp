<div class="photos form span9">
<?php echo $this->Form->create('Photo', array('type' => 'file', 'inputDefaults' => array('class' => 'span6')));?>
	<fieldset>
		<legend><?php echo __('Add Photo'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('file', array('type' => 'file'));
		echo $this->Form->input('Label');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="span2 offset1">
	<ul class="nav nav-pills nav-stacked">
		<li><?php echo $this->Html->link(__('List Photos'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Uploads'), array('controller' => 'uploads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Upload'), array('controller' => 'uploads', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Labels'), array('controller' => 'labels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Label'), array('controller' => 'labels', 'action' => 'add')); ?> </li>
	</ul>
</div>
