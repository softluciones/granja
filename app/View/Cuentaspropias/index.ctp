<div class="cuentaspropias index">
	<h2><?php echo __('Cuentaspropias'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nrocuenta'); ?></th>
			<th><?php echo $this->Paginator->sort('nombretitular'); ?></th>
			<th><?php echo $this->Paginator->sort('correotitular'); ?></th>
			<th><?php echo $this->Paginator->sort('cedulatitular'); ?></th>
			<th><?php echo $this->Paginator->sort('banco_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cuentaspropias as $cuentaspropia): ?>
	<tr>
		<td><?php echo h($cuentaspropia['Cuentaspropia']['id']); ?>&nbsp;</td>
		<td><?php echo h($cuentaspropia['Cuentaspropia']['nrocuenta']); ?>&nbsp;</td>
		<td><?php echo h($cuentaspropia['Cuentaspropia']['nombretitular']); ?>&nbsp;</td>
		<td><?php echo h($cuentaspropia['Cuentaspropia']['correotitular']); ?>&nbsp;</td>
		<td><?php echo h($cuentaspropia['Cuentaspropia']['cedulatitular']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cuentaspropia['Banco']['codigo'], array('controller' => 'bancos', 'action' => 'view', $cuentaspropia['Banco']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $cuentaspropia['Cuentaspropia']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cuentaspropia['Cuentaspropia']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cuentaspropia['Cuentaspropia']['id']), null, __('Are you sure you want to delete # %s?', $cuentaspropia['Cuentaspropia']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Cuentaspropia'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Bancos'), array('controller' => 'bancos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Banco'), array('controller' => 'bancos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Chequespropios'), array('controller' => 'chequespropios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chequespropio'), array('controller' => 'chequespropios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Depositocajas'), array('controller' => 'depositocajas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Depositocaja'), array('controller' => 'depositocajas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gastos'), array('controller' => 'gastos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gasto'), array('controller' => 'gastos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ingresos'), array('controller' => 'ingresos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ingreso'), array('controller' => 'ingresos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Montocuentas'), array('controller' => 'montocuentas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Montocuenta'), array('controller' => 'montocuentas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pagos'), array('controller' => 'pagos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pago'), array('controller' => 'pagos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transaccioncuentas'), array('controller' => 'transaccioncuentas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaccioncuenta'), array('controller' => 'transaccioncuentas', 'action' => 'add')); ?> </li>
	</ul>
</div>
