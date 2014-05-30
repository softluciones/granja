<div class="interesprestamos index">
	<h2><?php echo __('Interesprestamos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('valor'); ?></th>
			<th><?php echo $this->Paginator->sort('tipoprestamo'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($interesprestamos as $interesprestamo): ?>
	<tr>
		<td><?php echo h($interesprestamo['Interesprestamo']['id']); ?>&nbsp;</td>
		<td><?php echo h($interesprestamo['Interesprestamo']['valor']); ?>&nbsp;</td>
		<td><?php echo h($interesprestamo['Interesprestamo']['tipoprestamo']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $interesprestamo['Interesprestamo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $interesprestamo['Interesprestamo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $interesprestamo['Interesprestamo']['id']), null, __('Are you sure you want to delete # %s?', $interesprestamo['Interesprestamo']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Interesprestamo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Prestamos'), array('controller' => 'prestamos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prestamo'), array('controller' => 'prestamos', 'action' => 'add')); ?> </li>
	</ul>
</div>
