<div class="garantias view">
<h2><?php echo __('Garantia'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($garantia['Garantia']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($garantia['Garantia']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($garantia['Garantia']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Montoquecubre'); ?></dt>
		<dd>
			<?php echo h($garantia['Garantia']['montoquecubre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pertenecea'); ?></dt>
		<dd>
			<?php echo h($garantia['Garantia']['pertenecea']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipogarantia'); ?></dt>
		<dd>
			<?php echo $this->Html->link($garantia['Tipogarantia']['nombre'], array('controller' => 'tipogarantias', 'action' => 'view', $garantia['Tipogarantia']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prestamo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($garantia['Prestamo']['id'], array('controller' => 'prestamos', 'action' => 'view', $garantia['Prestamo']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Garantia'), array('action' => 'edit', $garantia['Garantia']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Garantia'), array('action' => 'delete', $garantia['Garantia']['id']), null, __('Are you sure you want to delete # %s?', $garantia['Garantia']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Garantias'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Garantia'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipogarantias'), array('controller' => 'tipogarantias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipogarantia'), array('controller' => 'tipogarantias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Prestamos'), array('controller' => 'prestamos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prestamo'), array('controller' => 'prestamos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cheque'), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Cheques'); ?></h3>
	<?php if (!empty($garantia['Cheque'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Banco Id'); ?></th>
		<th><?php echo __('Cliente Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Numerodecuenta'); ?></th>
		<th><?php echo __('Numerodecheque'); ?></th>
		<th><?php echo __('Monto'); ?></th>
		<th><?php echo __('Interese Id'); ?></th>
		<th><?php echo __('Filename'); ?></th>
		<th><?php echo __('Dir'); ?></th>
		<th><?php echo __('Fecharecibido'); ?></th>
		<th><?php echo __('Fechacobro'); ?></th>
		<th><?php echo __('Dias'); ?></th>
		<th><?php echo __('Diaspost'); ?></th>
		<th><?php echo __('Cobrado'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Cheque Id'); ?></th>
		<th><?php echo __('Garantia Id'); ?></th>
		<th><?php echo __('Pagodecuotas Id'); ?></th>
		<th><?php echo __('Deuda'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($garantia['Cheque'] as $cheque): ?>
		<tr>
			<td><?php echo $cheque['id']; ?></td>
			<td><?php echo $cheque['banco_id']; ?></td>
			<td><?php echo $cheque['cliente_id']; ?></td>
			<td><?php echo $cheque['created']; ?></td>
			<td><?php echo $cheque['modified']; ?></td>
			<td><?php echo $cheque['numerodecuenta']; ?></td>
			<td><?php echo $cheque['numerodecheque']; ?></td>
			<td><?php echo $cheque['monto']; ?></td>
			<td><?php echo $cheque['interese_id']; ?></td>
			<td><?php echo $cheque['filename']; ?></td>
			<td><?php echo $cheque['dir']; ?></td>
			<td><?php echo $cheque['fecharecibido']; ?></td>
			<td><?php echo $cheque['fechacobro']; ?></td>
			<td><?php echo $cheque['dias']; ?></td>
			<td><?php echo $cheque['diaspost']; ?></td>
			<td><?php echo $cheque['cobrado']; ?></td>
			<td><?php echo $cheque['user_id']; ?></td>
			<td><?php echo $cheque['cheque_id']; ?></td>
			<td><?php echo $cheque['garantia_id']; ?></td>
			<td><?php echo $cheque['pagodecuotas_id']; ?></td>
			<td><?php echo $cheque['deuda']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'cheques', 'action' => 'view', $cheque['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'cheques', 'action' => 'edit', $cheque['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'cheques', 'action' => 'delete', $cheque['id']), null, __('Are you sure you want to delete # %s?', $cheque['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Cheque'), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
