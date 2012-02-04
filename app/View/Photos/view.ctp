<div class="photos view span9">
<h2><?php  echo $photo['Photo']['title']; ?></h2>
	<?php echo $this->Html->image('../uploads/' . $photo['Upload']['id'], array('width' => 300)); ?>
	<h3>Labels</h3>
	<ul>
		<?php foreach ($photo['Label'] as $label) : ?>
			<li><?php echo h($label['name']); ?></li>
		<?php endforeach; ?>
	</ul>
</div>
<div class="span2 offset1">
	<ul class="nav nav-pills nav-stacked">
		<li><?php echo $this->Html->link(__('Edit Photo'), array('action' => 'edit', $photo['Photo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Photo'), array('action' => 'delete', $photo['Photo']['id']), null, __('Are you sure you want to delete # %s?', $photo['Photo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Photos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Uploads'), array('controller' => 'uploads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Upload'), array('controller' => 'uploads', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Labels'), array('controller' => 'labels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Label'), array('controller' => 'labels', 'action' => 'add')); ?> </li>
	</ul>
</div>