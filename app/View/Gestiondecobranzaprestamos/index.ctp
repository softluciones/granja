<div class="gestiondecobranzaprestamos index">
	<h2><?php echo __('Gestiondecobranzaprestamos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion'); ?></th>
			<th><?php echo $this->Paginator->sort('prestamo_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($gestiondecobranzaprestamos as $gestiondecobranzaprestamo): ?>
	<tr>
		<td><?php echo h($gestiondecobranzaprestamo['Gestiondecobranzaprestamo']['id']); ?>&nbsp;</td>
		<td><?php echo h($gestiondecobranzaprestamo['Gestiondecobranzaprestamo']['created']); ?>&nbsp;</td>
		<td><?php echo h($gestiondecobranzaprestamo['Gestiondecobranzaprestamo']['descripcion']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($gestiondecobranzaprestamo['Prestamo']['id'], array('controller' => 'prestamos', 'action' => 'view', $gestiondecobranzaprestamo['Prestamo']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $gestiondecobranzaprestamo['Gestiondecobranzaprestamo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $gestiondecobranzaprestamo['Gestiondecobranzaprestamo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $gestiondecobranzaprestamo['Gestiondecobranzaprestamo']['id']), null, __('Are you sure you want to delete # %s?', $gestiondecobranzaprestamo['Gestiondecobranzaprestamo']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Gestiondecobranzaprestamo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Prestamos'), array('controller' => 'prestamos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prestamo'), array('controller' => 'prestamos', 'action' => 'add')); ?> </li>
	</ul>
</div>
