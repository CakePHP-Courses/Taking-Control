<div class="labels index span9">
	<h2><?php echo __('Labels');?></h2>
	<table cellpadding="0" cellspacing="0" class="table table-striped">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($labels as $label): ?>
	<tr>
		<td><?php echo h($label['Label']['id']); ?>&nbsp;</td>
		<td><?php echo h($label['Label']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $label['Label']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $label['Label']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $label['Label']['id']), null, __('Are you sure you want to delete # %s?', $label['Label']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<?php echo $this->element('paging'); ?>
</div>
<div class="span2 offset1">
	<ul class="nav nav-pills nav-stacked">
		<li><?php echo $this->Html->link(__('New Label'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Photos'), array('controller' => 'photos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo'), array('controller' => 'photos', 'action' => 'add')); ?> </li>
	</ul>
</div>
