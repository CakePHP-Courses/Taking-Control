<div class="pagination pagination-centered">
	<ul>
<?php
	echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
	echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li'));
	echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
?>
	</ul>
</div>
