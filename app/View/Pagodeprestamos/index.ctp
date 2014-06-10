<div class="pagodeprestamos index">
	<h2><?php echo __('Pagodeprestamos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('montopagado'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha'); ?></th>
			<th><?php echo $this->Paginator->sort('nroreferencia'); ?></th>
			<th><?php echo $this->Paginator->sort('cuotas_id'); ?></th>
			<th><?php echo $this->Paginator->sort('diaspagados'); ?></th>
			<th><?php echo $this->Paginator->sort('montodeuda'); ?></th>
			<th><?php echo $this->Paginator->sort('tipopago_id'); ?></th>
			<th><?php echo $this->Paginator->sort('descri'); ?></th>
			<th><?php echo $this->Paginator->sort('descuento'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($pagodeprestamos as $pagodeprestamo): ?>
	<tr>
		<td><?php echo h($pagodeprestamo['Pagodeprestamo']['id']); ?>&nbsp;</td>
		<td><?php echo h($pagodeprestamo['Pagodeprestamo']['montopagado']); ?>&nbsp;</td>
		<td><?php echo h($pagodeprestamo['Pagodeprestamo']['fecha']); ?>&nbsp;</td>
		<td><?php echo h($pagodeprestamo['Pagodeprestamo']['nroreferencia']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pagodeprestamo['Cuotas']['id'], array('controller' => 'cuotas', 'action' => 'view', $pagodeprestamo['Cuotas']['id'])); ?>
		</td>
		<td><?php echo h($pagodeprestamo['Pagodeprestamo']['diaspagados']); ?>&nbsp;</td>
		<td><?php echo h($pagodeprestamo['Pagodeprestamo']['montodeuda']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pagodeprestamo['Tipopago']['nombre'], array('controller' => 'tipopagos', 'action' => 'view', $pagodeprestamo['Tipopago']['id'])); ?>
		</td>
		<td><?php echo h($pagodeprestamo['Pagodeprestamo']['descri']); ?>&nbsp;</td>
		<td><?php echo h($pagodeprestamo['Pagodeprestamo']['descuento']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pagodeprestamo['User']['username'], array('controller' => 'users', 'action' => 'view', $pagodeprestamo['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $pagodeprestamo['Pagodeprestamo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $pagodeprestamo['Pagodeprestamo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $pagodeprestamo['Pagodeprestamo']['id']), null, __('Are you sure you want to delete # %s?', $pagodeprestamo['Pagodeprestamo']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Pagodeprestamo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cuotas'), array('controller' => 'cuotas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cuotas'), array('controller' => 'cuotas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipopagos'), array('controller' => 'tipopagos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipopago'), array('controller' => 'tipopagos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transaccionprestamointeres'), array('controller' => 'transaccionprestamointeres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaccionprestamointere'), array('controller' => 'transaccionprestamointeres', 'action' => 'add')); ?> </li>
	</ul>
</div>
