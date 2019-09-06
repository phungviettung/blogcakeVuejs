<div class="admins index">
	<h2><?php echo __('Admins'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('admin_id'); ?></th>
			<th><?php echo $this->Paginator->sort('admin_name'); ?></th>
			<th><?php echo $this->Paginator->sort('admin_pass'); ?></th>
			<th><?php echo $this->Paginator->sort('author'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($admins as $admin): ?>
	<tr>
		<td><?php echo h($admin['Admin']['admin_id']); ?>&nbsp;</td>
		<td><?php echo h($admin['Admin']['admin_name']); ?>&nbsp;</td>
		<td><?php echo h($admin['Admin']['admin_pass']); ?>&nbsp;</td>
		<td><?php echo h($admin['Admin']['author']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $admin['Admin']['admin_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $admin['Admin']['admin_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $admin['Admin']['admin_id']), array('confirm' => __('Are you sure you want to delete # %s?', $admin['Admin']['admin_id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Admin'), array('action' => 'add')); ?></li>
	</ul>
</div>
