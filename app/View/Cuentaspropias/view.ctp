<div class="cuentaspropias view">
<h2><?php echo __('Cuentaspropia'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cuentaspropia['Cuentaspropia']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nrocuenta'); ?></dt>
		<dd>
			<?php echo h($cuentaspropia['Cuentaspropia']['nrocuenta']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombretitular'); ?></dt>
		<dd>
			<?php echo h($cuentaspropia['Cuentaspropia']['nombretitular']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Correotitular'); ?></dt>
		<dd>
			<?php echo h($cuentaspropia['Cuentaspropia']['correotitular']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cedulatitular'); ?></dt>
		<dd>
			<?php echo h($cuentaspropia['Cuentaspropia']['cedulatitular']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Banco'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cuentaspropia['Banco']['codigo'], array('controller' => 'bancos', 'action' => 'view', $cuentaspropia['Banco']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cuentaspropia'), array('action' => 'edit', $cuentaspropia['Cuentaspropia']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cuentaspropia'), array('action' => 'delete', $cuentaspropia['Cuentaspropia']['id']), null, __('Are you sure you want to delete # %s?', $cuentaspropia['Cuentaspropia']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cuentaspropias'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cuentaspropia'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Chequespropios'); ?></h3>
	<?php if (!empty($cuentaspropia['Chequespropio'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Recibido'); ?></th>
		<th><?php echo __('Cobrado'); ?></th>
		<th><?php echo __('Monto'); ?></th>
		<th><?php echo __('Nrocheque'); ?></th>
		<th><?php echo __('Nrocuenta'); ?></th>
		<th><?php echo __('Cuentaspropia Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cuentaspropia['Chequespropio'] as $chequespropio): ?>
		<tr>
			<td><?php echo $chequespropio['id']; ?></td>
			<td><?php echo $chequespropio['recibido']; ?></td>
			<td><?php echo $chequespropio['cobrado']; ?></td>
			<td><?php echo $chequespropio['monto']; ?></td>
			<td><?php echo $chequespropio['nrocheque']; ?></td>
			<td><?php echo $chequespropio['nrocuenta']; ?></td>
			<td><?php echo $chequespropio['cuentaspropia_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'chequespropios', 'action' => 'view', $chequespropio['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'chequespropios', 'action' => 'edit', $chequespropio['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'chequespropios', 'action' => 'delete', $chequespropio['id']), null, __('Are you sure you want to delete # %s?', $chequespropio['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Chequespropio'), array('controller' => 'chequespropios', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Depositocajas'); ?></h3>
	<?php if (!empty($cuentaspropia['Depositocaja'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Monto'); ?></th>
		<th><?php echo __('Cierrecaja Id'); ?></th>
		<th><?php echo __('Cuentaspropia Id'); ?></th>
		<th><?php echo __('Nroplanilla'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cuentaspropia['Depositocaja'] as $depositocaja): ?>
		<tr>
			<td><?php echo $depositocaja['id']; ?></td>
			<td><?php echo $depositocaja['monto']; ?></td>
			<td><?php echo $depositocaja['cierrecaja_id']; ?></td>
			<td><?php echo $depositocaja['cuentaspropia_id']; ?></td>
			<td><?php echo $depositocaja['nroplanilla']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'depositocajas', 'action' => 'view', $depositocaja['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'depositocajas', 'action' => 'edit', $depositocaja['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'depositocajas', 'action' => 'delete', $depositocaja['id']), null, __('Are you sure you want to delete # %s?', $depositocaja['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Depositocaja'), array('controller' => 'depositocajas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Gastos'); ?></h3>
	<?php if (!empty($cuentaspropia['Gasto'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Monto'); ?></th>
		<th><?php echo __('Observacion'); ?></th>
		<th><?php echo __('Fecha'); ?></th>
		<th><?php echo __('Tipogasto Id'); ?></th>
		<th><?php echo __('Cierrecaja Id'); ?></th>
		<th><?php echo __('Cuentaspropia Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cuentaspropia['Gasto'] as $gasto): ?>
		<tr>
			<td><?php echo $gasto['id']; ?></td>
			<td><?php echo $gasto['monto']; ?></td>
			<td><?php echo $gasto['observacion']; ?></td>
			<td><?php echo $gasto['fecha']; ?></td>
			<td><?php echo $gasto['tipogasto_id']; ?></td>
			<td><?php echo $gasto['cierrecaja_id']; ?></td>
			<td><?php echo $gasto['cuentaspropia_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'gastos', 'action' => 'view', $gasto['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'gastos', 'action' => 'edit', $gasto['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'gastos', 'action' => 'delete', $gasto['id']), null, __('Are you sure you want to delete # %s?', $gasto['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Gasto'), array('controller' => 'gastos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Ingresos'); ?></h3>
	<?php if (!empty($cuentaspropia['Ingreso'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Monto'); ?></th>
		<th><?php echo __('Observacion'); ?></th>
		<th><?php echo __('Tipoingreso Id'); ?></th>
		<th><?php echo __('Cierrecaja Id'); ?></th>
		<th><?php echo __('Cuentaspropia Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cuentaspropia['Ingreso'] as $ingreso): ?>
		<tr>
			<td><?php echo $ingreso['id']; ?></td>
			<td><?php echo $ingreso['monto']; ?></td>
			<td><?php echo $ingreso['observacion']; ?></td>
			<td><?php echo $ingreso['tipoingreso_id']; ?></td>
			<td><?php echo $ingreso['cierrecaja_id']; ?></td>
			<td><?php echo $ingreso['cuentaspropia_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'ingresos', 'action' => 'view', $ingreso['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'ingresos', 'action' => 'edit', $ingreso['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'ingresos', 'action' => 'delete', $ingreso['id']), null, __('Are you sure you want to delete # %s?', $ingreso['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Ingreso'), array('controller' => 'ingresos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Montocuentas'); ?></h3>
	<?php if (!empty($cuentaspropia['Montocuenta'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Monto'); ?></th>
		<th><?php echo __('Fecha'); ?></th>
		<th><?php echo __('Cuentaspropia Id'); ?></th>
		<th><?php echo __('Observacion'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cuentaspropia['Montocuenta'] as $montocuenta): ?>
		<tr>
			<td><?php echo $montocuenta['id']; ?></td>
			<td><?php echo $montocuenta['monto']; ?></td>
			<td><?php echo $montocuenta['fecha']; ?></td>
			<td><?php echo $montocuenta['cuentaspropia_id']; ?></td>
			<td><?php echo $montocuenta['observacion']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'montocuentas', 'action' => 'view', $montocuenta['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'montocuentas', 'action' => 'edit', $montocuenta['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'montocuentas', 'action' => 'delete', $montocuenta['id']), null, __('Are you sure you want to delete # %s?', $montocuenta['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Montocuenta'), array('controller' => 'montocuentas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Pagos'); ?></h3>
	<?php if (!empty($cuentaspropia['Pago'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Monto'); ?></th>
		<th><?php echo __('Conceptode'); ?></th>
		<th><?php echo __('Edodeuda'); ?></th>
		<th><?php echo __('Pagointerese Deuda'); ?></th>
		<th><?php echo __('Cheque Id'); ?></th>
		<th><?php echo __('Tipopago Id'); ?></th>
		<th><?php echo __('Pagotercero Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Nrotransferencia'); ?></th>
		<th><?php echo __('Cuentaspropia Id'); ?></th>
		<th><?php echo __('Cliente Id'); ?></th>
		<th><?php echo __('Cheque Estadocheque Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cuentaspropia['Pago'] as $pago): ?>
		<tr>
			<td><?php echo $pago['id']; ?></td>
			<td><?php echo $pago['created']; ?></td>
			<td><?php echo $pago['monto']; ?></td>
			<td><?php echo $pago['conceptode']; ?></td>
			<td><?php echo $pago['edodeuda']; ?></td>
			<td><?php echo $pago['pagointerese_deuda']; ?></td>
			<td><?php echo $pago['cheque_id']; ?></td>
			<td><?php echo $pago['tipopago_id']; ?></td>
			<td><?php echo $pago['pagotercero_id']; ?></td>
			<td><?php echo $pago['user_id']; ?></td>
			<td><?php echo $pago['nrotransferencia']; ?></td>
			<td><?php echo $pago['cuentaspropia_id']; ?></td>
			<td><?php echo $pago['cliente_id']; ?></td>
			<td><?php echo $pago['cheque_estadocheque_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'pagos', 'action' => 'view', $pago['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'pagos', 'action' => 'edit', $pago['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'pagos', 'action' => 'delete', $pago['id']), null, __('Are you sure you want to delete # %s?', $pago['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Pago'), array('controller' => 'pagos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Transaccioncuentas'); ?></h3>
	<?php if (!empty($cuentaspropia['Transaccioncuenta'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Monto'); ?></th>
		<th><?php echo __('Deposito'); ?></th>
		<th><?php echo __('Cuentaspropia Id'); ?></th>
		<th><?php echo __('Nroreferencia'); ?></th>
		<th><?php echo __('Fecha'); ?></th>
		<th><?php echo __('Cuentaspropias Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cuentaspropia['Transaccioncuenta'] as $transaccioncuenta): ?>
		<tr>
			<td><?php echo $transaccioncuenta['id']; ?></td>
			<td><?php echo $transaccioncuenta['monto']; ?></td>
			<td><?php echo $transaccioncuenta['deposito']; ?></td>
			<td><?php echo $transaccioncuenta['cuentaspropia_id']; ?></td>
			<td><?php echo $transaccioncuenta['nroreferencia']; ?></td>
			<td><?php echo $transaccioncuenta['fecha']; ?></td>
			<td><?php echo $transaccioncuenta['cuentaspropias_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'transaccioncuentas', 'action' => 'view', $transaccioncuenta['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'transaccioncuentas', 'action' => 'edit', $transaccioncuenta['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transaccioncuentas', 'action' => 'delete', $transaccioncuenta['id']), null, __('Are you sure you want to delete # %s?', $transaccioncuenta['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Transaccioncuenta'), array('controller' => 'transaccioncuentas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
