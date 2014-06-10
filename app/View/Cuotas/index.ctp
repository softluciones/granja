<div class="cuotas index">
	<h2><?php echo __('Cuotas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('fechaini'); ?></th>
			<th><?php echo $this->Paginator->sort('fechafin'); ?></th>
			<th><?php echo $this->Paginator->sort('nrocuotas'); ?></th>
			<th><?php echo $this->Paginator->sort('montocuota'); ?></th>
			<th><?php echo $this->Paginator->sort('prestamo_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cuotas as $cuota): ?>
	<tr>
		<td><?php echo h($cuota['Cuota']['id']); ?>&nbsp;</td>
		<td><?php echo h($cuota['Cuota']['fechaini']); ?>&nbsp;</td>
		<td><?php echo h($cuota['Cuota']['fechafin']); ?>&nbsp;</td>
		<td><?php echo h($cuota['Cuota']['nrocuotas']); ?>&nbsp;</td>
		<td><?php echo h($cuota['Cuota']['montocuota']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cuota['Prestamo']['id'], array('controller' => 'prestamos', 'action' => 'view', $cuota['Prestamo']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $cuota['Cuota']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cuota['Cuota']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cuota['Cuota']['id']), null, __('Are you sure you want to delete # %s?', $cuota['Cuota']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Cuota'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Prestamos'), array('controller' => 'prestamos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prestamo'), array('controller' => 'prestamos', 'action' => 'add')); ?> </li>
	</ul>
</div>
