<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Login now'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Login'));?>
</div>