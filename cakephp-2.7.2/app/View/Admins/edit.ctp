<div class="admins form">
<?php echo $this->Form->create('Admin'); ?>
	<fieldset>
		<legend><?php echo __('Edit Admin'); ?></legend>
	<?php
		echo $this->Form->input('admin_id');
		echo $this->Form->input('admin_name');
		echo $this->Form->input('admin_pass');
		echo $this->Form->input('author');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Admin.admin_id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Admin.admin_id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Admins'), array('action' => 'index')); ?></li>
	</ul>
</div>
