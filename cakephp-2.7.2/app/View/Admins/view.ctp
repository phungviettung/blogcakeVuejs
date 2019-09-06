<div class="admins view">
<h2><?php echo __('Admin'); ?></h2>
	<dl>
		<dt><?php echo __('Admin Id'); ?></dt>
		<dd>
			<?php echo h($admin['Admin']['admin_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Admin Name'); ?></dt>
		<dd>
			<?php echo h($admin['Admin']['admin_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Admin Pass'); ?></dt>
		<dd>
			<?php echo h($admin['Admin']['admin_pass']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Author'); ?></dt>
		<dd>
			<?php echo h($admin['Admin']['author']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Admin'), array('action' => 'edit', $admin['Admin']['admin_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Admin'), array('action' => 'delete', $admin['Admin']['admin_id']), array('confirm' => __('Are you sure you want to delete # %s?', $admin['Admin']['admin_id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Admins'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Admin'), array('action' => 'add')); ?> </li>
	</ul>
</div>
