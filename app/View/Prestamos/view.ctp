<div class="prestamos view">
<h2><?php echo __('Prestamo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($prestamo['Prestamo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cliente'); ?></dt>
		<dd>
			<?php echo $this->Html->link($prestamo['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $prestamo['Cliente']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Monto'); ?></dt>
		<dd>
			<?php echo h($prestamo['Prestamo']['monto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fechafin'); ?></dt>
		<dd>
			<?php echo h($prestamo['Prestamo']['fechafin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fechainicio'); ?></dt>
		<dd>
			<?php echo h($prestamo['Prestamo']['fechainicio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Montodeuda'); ?></dt>
		<dd>
			<?php echo h($prestamo['Prestamo']['montodeuda']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Interesprestamo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($prestamo['Interesprestamo']['id'], array('controller' => 'interesprestamos', 'action' => 'view', $prestamo['Interesprestamo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prestamo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($prestamo['Prestamo']['id'], array('controller' => 'prestamos', 'action' => 'view', $prestamo['Prestamo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aprobarprestamo'); ?></dt>
		<dd>
			<?php echo h($prestamo['Prestamo']['aprobarprestamo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($prestamo['User']['username'], array('controller' => 'users', 'action' => 'view', $prestamo['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Prestamo'), array('action' => 'edit', $prestamo['Prestamo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Prestamo'), array('action' => 'delete', $prestamo['Prestamo']['id']), null, __('Are you sure you want to delete # %s?', $prestamo['Prestamo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Prestamos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prestamo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Interesprestamos'), array('controller' => 'interesprestamos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Interesprestamo'), array('controller' => 'interesprestamos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Prestamos'), array('controller' => 'prestamos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prestamo'), array('controller' => 'prestamos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cuotas'), array('controller' => 'cuotas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cuota'), array('controller' => 'cuotas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Garantias'), array('controller' => 'garantias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Garantia'), array('controller' => 'garantias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gestiondecobranzas'), array('controller' => 'gestiondecobranzas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gestiondecobranza'), array('controller' => 'gestiondecobranzas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transaccionprestamointeres'), array('controller' => 'transaccionprestamointeres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaccionprestamointere'), array('controller' => 'transaccionprestamointeres', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Cuotas'); ?></h3>
	<?php if (!empty($prestamo['Cuota'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Fechaini'); ?></th>
		<th><?php echo __('Fechafin'); ?></th>
		<th><?php echo __('Nrocuotas'); ?></th>
		<th><?php echo __('Montocuota'); ?></th>
		<th><?php echo __('Prestamo Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($prestamo['Cuota'] as $cuota): ?>
		<tr>
			<td><?php echo $cuota['id']; ?></td>
			<td><?php echo $cuota['fechaini']; ?></td>
			<td><?php echo $cuota['fechafin']; ?></td>
			<td><?php echo $cuota['nrocuotas']; ?></td>
			<td><?php echo $cuota['montocuota']; ?></td>
			<td><?php echo $cuota['prestamo_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'cuotas', 'action' => 'view', $cuota['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'cuotas', 'action' => 'edit', $cuota['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'cuotas', 'action' => 'delete', $cuota['id']), null, __('Are you sure you want to delete # %s?', $cuota['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Cuota'), array('controller' => 'cuotas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Garantias'); ?></h3>
	<?php if (!empty($prestamo['Garantia'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Montoquecubre'); ?></th>
		<th><?php echo __('Pertenecea'); ?></th>
		<th><?php echo __('Tipogarantia Id'); ?></th>
		<th><?php echo __('Prestamo Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($prestamo['Garantia'] as $garantia): ?>
		<tr>
			<td><?php echo $garantia['id']; ?></td>
			<td><?php echo $garantia['nombre']; ?></td>
			<td><?php echo $garantia['descripcion']; ?></td>
			<td><?php echo $garantia['montoquecubre']; ?></td>
			<td><?php echo $garantia['pertenecea']; ?></td>
			<td><?php echo $garantia['tipogarantia_id']; ?></td>
			<td><?php echo $garantia['prestamo_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'garantias', 'action' => 'view', $garantia['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'garantias', 'action' => 'edit', $garantia['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'garantias', 'action' => 'delete', $garantia['id']), null, __('Are you sure you want to delete # %s?', $garantia['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Garantia'), array('controller' => 'garantias', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Gestiondecobranzas'); ?></h3>
	<?php if (!empty($prestamo['Gestiondecobranza'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Cheque Id'); ?></th>
		<th><?php echo __('Prestamo Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($prestamo['Gestiondecobranza'] as $gestiondecobranza): ?>
		<tr>
			<td><?php echo $gestiondecobranza['id']; ?></td>
			<td><?php echo $gestiondecobranza['created']; ?></td>
			<td><?php echo $gestiondecobranza['descripcion']; ?></td>
			<td><?php echo $gestiondecobranza['user_id']; ?></td>
			<td><?php echo $gestiondecobranza['cheque_id']; ?></td>
			<td><?php echo $gestiondecobranza['prestamo_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'gestiondecobranzas', 'action' => 'view', $gestiondecobranza['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'gestiondecobranzas', 'action' => 'edit', $gestiondecobranza['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'gestiondecobranzas', 'action' => 'delete', $gestiondecobranza['id']), null, __('Are you sure you want to delete # %s?', $gestiondecobranza['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Gestiondecobranza'), array('controller' => 'gestiondecobranzas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Prestamos'); ?></h3>
	<?php if (!empty($prestamo['Prestamo'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Cliente Id'); ?></th>
		<th><?php echo __('Monto'); ?></th>
		<th><?php echo __('Fechafin'); ?></th>
		<th><?php echo __('Fechainicio'); ?></th>
		<th><?php echo __('Montodeuda'); ?></th>
		<th><?php echo __('Interesprestamo Id'); ?></th>
		<th><?php echo __('Prestamo Id'); ?></th>
		<th><?php echo __('Aprobarprestamo'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($prestamo['Prestamo'] as $prestamo): ?>
		<tr>
			<td><?php echo $prestamo['id']; ?></td>
			<td><?php echo $prestamo['cliente_id']; ?></td>
			<td><?php echo $prestamo['monto']; ?></td>
			<td><?php echo $prestamo['fechafin']; ?></td>
			<td><?php echo $prestamo['fechainicio']; ?></td>
			<td><?php echo $prestamo['montodeuda']; ?></td>
			<td><?php echo $prestamo['interesprestamo_id']; ?></td>
			<td><?php echo $prestamo['prestamo_id']; ?></td>
			<td><?php echo $prestamo['aprobarprestamo']; ?></td>
			<td><?php echo $prestamo['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'prestamos', 'action' => 'view', $prestamo['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'prestamos', 'action' => 'edit', $prestamo['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'prestamos', 'action' => 'delete', $prestamo['id']), null, __('Are you sure you want to delete # %s?', $prestamo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Prestamo'), array('controller' => 'prestamos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Transaccionprestamointeres'); ?></h3>
	<?php if (!empty($prestamo['Transaccionprestamointere'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Prestamo Id'); ?></th>
		<th><?php echo __('Montointeres'); ?></th>
		<th><?php echo __('Fecha'); ?></th>
		<th><?php echo __('Montodeuda'); ?></th>
		<th><?php echo __('Pagodeprestamo Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($prestamo['Transaccionprestamointere'] as $transaccionprestamointere): ?>
		<tr>
			<td><?php echo $transaccionprestamointere['id']; ?></td>
			<td><?php echo $transaccionprestamointere['prestamo_id']; ?></td>
			<td><?php echo $transaccionprestamointere['montointeres']; ?></td>
			<td><?php echo $transaccionprestamointere['fecha']; ?></td>
			<td><?php echo $transaccionprestamointere['montodeuda']; ?></td>
			<td><?php echo $transaccionprestamointere['pagodeprestamo_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'transaccionprestamointeres', 'action' => 'view', $transaccionprestamointere['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'transaccionprestamointeres', 'action' => 'edit', $transaccionprestamointere['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transaccionprestamointeres', 'action' => 'delete', $transaccionprestamointere['id']), null, __('Are you sure you want to delete # %s?', $transaccionprestamointere['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Transaccionprestamointere'), array('controller' => 'transaccionprestamointeres', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
