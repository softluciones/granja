<div class="pagos index">
	<h2><?php echo __('Pagos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('cliente_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('monto'); ?></th>
			<th><?php echo $this->Paginator->sort('conceptode'); ?></th>
			<th><?php echo $this->Paginator->sort('edodeuda'); ?></th>
			<th><?php echo $this->Paginator->sort('pagointerese_deuda'); ?></th>
			<th><?php echo $this->Paginator->sort('chequeinterese_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cheque_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cheque_estadocheque_id'); ?></th>
			<th><?php echo $this->Paginator->sort('tipopago_id'); ?></th>
			<th><?php echo $this->Paginator->sort('pagotercero_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($pagos as $pago): ?>
	<tr>
		<td><?php echo h($pago['Pago']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pago['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $pago['Cliente']['id'])); ?>
		</td>
		<td><?php echo h($pago['Pago']['created']); ?>&nbsp;</td>
		<td><?php echo h($pago['Pago']['modified']); ?>&nbsp;</td>
		<td><?php echo h($pago['Pago']['monto']); ?>&nbsp;</td>
		<td><?php echo h($pago['Pago']['conceptode']); ?>&nbsp;</td>
		<td><?php echo h($pago['Pago']['edodeuda']); ?>&nbsp;</td>
		<td><?php echo h($pago['Pago']['pagointerese_deuda']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pago['Chequeinterese']['id'], array('controller' => 'chequeinterese', 'action' => 'view', $pago['Chequeinterese']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($pago['Cheque']['numerodecheque'], array('controller' => 'cheques', 'action' => 'view', $pago['Cheque']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($pago['ChequeEstadocheque']['id'], array('controller' => 'cheque_estadocheques', 'action' => 'view', $pago['ChequeEstadocheque']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($pago['Tipopago']['nombre'], array('controller' => 'tipopagos', 'action' => 'view', $pago['Tipopago']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($pago['Pagotercero']['id'], array('controller' => 'pagoterceros', 'action' => 'view', $pago['Pagotercero']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($pago['User']['username'], array('controller' => 'users', 'action' => 'view', $pago['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $pago['Pago']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $pago['Pago']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $pago['Pago']['id']), null, __('Are you sure you want to delete # %s?', $pago['Pago']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Pago'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Chequeinterese'), array('controller' => 'chequeinterese', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chequeinterese'), array('controller' => 'chequeinterese', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cheque'), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cheque Estadocheques'), array('controller' => 'cheque_estadocheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cheque Estadocheque'), array('controller' => 'cheque_estadocheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipopagos'), array('controller' => 'tipopagos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipopago'), array('controller' => 'tipopagos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pagoterceros'), array('controller' => 'pagoterceros', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pagotercero'), array('controller' => 'pagoterceros', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
