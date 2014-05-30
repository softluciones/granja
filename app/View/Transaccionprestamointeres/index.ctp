<div class="transaccionprestamointeres index">
	<h2><?php echo __('Transaccionprestamointeres'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('prestamo_id'); ?></th>
			<th><?php echo $this->Paginator->sort('montointeres'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha'); ?></th>
			<th><?php echo $this->Paginator->sort('montodeuda'); ?></th>
			<th><?php echo $this->Paginator->sort('pagodeprestamo_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($transaccionprestamointeres as $transaccionprestamointere): ?>
	<tr>
		<td><?php echo h($transaccionprestamointere['Transaccionprestamointere']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transaccionprestamointere['Prestamo']['id'], array('controller' => 'prestamos', 'action' => 'view', $transaccionprestamointere['Prestamo']['id'])); ?>
		</td>
		<td><?php echo h($transaccionprestamointere['Transaccionprestamointere']['montointeres']); ?>&nbsp;</td>
		<td><?php echo h($transaccionprestamointere['Transaccionprestamointere']['fecha']); ?>&nbsp;</td>
		<td><?php echo h($transaccionprestamointere['Transaccionprestamointere']['montodeuda']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transaccionprestamointere['Pagodeprestamo']['id'], array('controller' => 'pagodeprestamos', 'action' => 'view', $transaccionprestamointere['Pagodeprestamo']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $transaccionprestamointere['Transaccionprestamointere']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transaccionprestamointere['Transaccionprestamointere']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transaccionprestamointere['Transaccionprestamointere']['id']), null, __('Are you sure you want to delete # %s?', $transaccionprestamointere['Transaccionprestamointere']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Transaccionprestamointere'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Prestamos'), array('controller' => 'prestamos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prestamo'), array('controller' => 'prestamos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pagodeprestamos'), array('controller' => 'pagodeprestamos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pagodeprestamo'), array('controller' => 'pagodeprestamos', 'action' => 'add')); ?> </li>
	</ul>
</div>
