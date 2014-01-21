<div class="chequeinterese view">
<h2><?php echo __('Chequeinterese'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($chequeinterese['Chequeinterese']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Montocheque'); ?></dt>
		<dd>
			<?php echo h($chequeinterese['Chequeinterese']['montocheque']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Montodescuentointeres'); ?></dt>
		<dd>
			<?php echo h($chequeinterese['Chequeinterese']['montodescuentointeres']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Montoentregado'); ?></dt>
		<dd>
			<?php echo h($chequeinterese['Chequeinterese']['montoentregado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estadocheque'); ?></dt>
		<dd>
			<?php echo h($chequeinterese['Chequeinterese']['estadocheque']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($chequeinterese['Chequeinterese']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cheque'); ?></dt>
		<dd>
			<?php echo $this->Html->link($chequeinterese['Cheque']['numerodecheque'], array('controller' => 'cheques', 'action' => 'view', $chequeinterese['Cheque']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($chequeinterese['User']['username'], array('controller' => 'users', 'action' => 'view', $chequeinterese['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Chequeinterese'), array('action' => 'edit', $chequeinterese['Chequeinterese']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Chequeinterese'), array('action' => 'delete', $chequeinterese['Chequeinterese']['id']), null, __('Are you sure you want to delete # %s?', $chequeinterese['Chequeinterese']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Chequeinterese'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chequeinterese'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cheque'), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pagos'), array('controller' => 'pagos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pago'), array('controller' => 'pagos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Pagos'); ?></h3>
	<?php if (!empty($chequeinterese['Pago'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Cliente Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Monto'); ?></th>
		<th><?php echo __('Conceptode'); ?></th>
		<th><?php echo __('Edodeuda'); ?></th>
		<th><?php echo __('Pagointerese Deuda'); ?></th>
		<th><?php echo __('Chequeinterese Id'); ?></th>
		<th><?php echo __('Cheque Id'); ?></th>
		<th><?php echo __('Cheque Estadocheque Id'); ?></th>
		<th><?php echo __('Tipopago Id'); ?></th>
		<th><?php echo __('Pagotercero Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($chequeinterese['Pago'] as $pago): ?>
		<tr>
			<td><?php echo $pago['id']; ?></td>
			<td><?php echo $pago['cliente_id']; ?></td>
			<td><?php echo $pago['created']; ?></td>
			<td><?php echo $pago['modified']; ?></td>
			<td><?php echo $pago['monto']; ?></td>
			<td><?php echo $pago['conceptode']; ?></td>
			<td><?php echo $pago['edodeuda']; ?></td>
			<td><?php echo $pago['pagointerese_deuda']; ?></td>
			<td><?php echo $pago['chequeinterese_id']; ?></td>
			<td><?php echo $pago['cheque_id']; ?></td>
			<td><?php echo $pago['cheque_estadocheque_id']; ?></td>
			<td><?php echo $pago['tipopago_id']; ?></td>
			<td><?php echo $pago['pagotercero_id']; ?></td>
			<td><?php echo $pago['user_id']; ?></td>
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
