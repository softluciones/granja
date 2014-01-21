<div class="chequeEstadocheques view">
<h2><?php echo __('Restrincion del cheque'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($chequeEstadocheque['ChequeEstadocheque']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Creación'); ?></dt>
		<dd>
			<?php echo h($chequeEstadocheque['ChequeEstadocheque']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Modificación'); ?></dt>
		<dd>
			<?php echo h($chequeEstadocheque['ChequeEstadocheque']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cheque'); ?></dt>
		<dd>
			<?php echo $this->Html->link($chequeEstadocheque['Cheque']['numerodecheque'], array('controller' => 'cheques', 'action' => 'view', $chequeEstadocheque['Cheque']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado cheque'); ?></dt>
		<dd>
			<?php echo $this->Html->link($chequeEstadocheque['Estadocheque']['nomenclatura'], array('controller' => 'estadocheques', 'action' => 'view', $chequeEstadocheque['Estadocheque']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($chequeEstadocheque['User']['username'], array('controller' => 'users', 'action' => 'view', $chequeEstadocheque['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Cheque Estado cheque'), array('action' => 'edit', $chequeEstadocheque['ChequeEstadocheque']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cheque Estado cheque'), array('action' => 'delete', $chequeEstadocheque['ChequeEstadocheque']['id']), null, __('Are you sure you want to delete # %s?', $chequeEstadocheque['ChequeEstadocheque']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Cheque Estado cheques'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Cheque Estado cheque'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cheque'), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Estadocheques'), array('controller' => 'estadocheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Estadocheque'), array('controller' => 'estadocheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Pagos'), array('controller' => 'pagos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Pago'), array('controller' => 'pagos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Pagos Relacionados con un cheque'); ?></h3>
	<?php if (!empty($chequeEstadocheque['Pago'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Fecha Creación'); ?></th>
		<th><?php echo __('Fecha Modificacion'); ?></th>
		<th><?php echo __('Monto'); ?></th>
		<th><?php echo __('Concepto de'); ?></th>
		<th><?php echo __('Edo deuda'); ?></th>
		<th><?php echo __('Pago interese Deuda'); ?></th>
		<th><?php echo __('Cheque interese Id'); ?></th>
		<th><?php echo __('Cheque Estado cheque Id'); ?></th>
		<th><?php echo __('Tipopago Id'); ?></th>
		<th><?php echo __('Pago tercero Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($chequeEstadocheque['Pago'] as $pago): ?>
		<tr>
			<td><?php echo $pago['id']; ?></td>
			<td><?php echo $pago['created']; ?></td>
			<td><?php echo $pago[' modified']; ?></td>
			<td><?php echo $pago['monto']; ?></td>
			<td><?php echo $pago['conceptode']; ?></td>
			<td><?php echo $pago['edodeuda']; ?></td>
			<td><?php echo $pago['pagointerese_deuda']; ?></td>
			<td><?php echo $pago['chequeinterese_id']; ?></td>
			<td><?php echo $pago['cheque_estadocheque_id']; ?></td>
			<td><?php echo $pago['tipopago_id']; ?></td>
			<td><?php echo $pago['pagotercero_id']; ?></td>
			<td><?php echo $pago['user_id']; ?></td>
			
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
        
</div>
