<div class="interesprestamos view">
<h2><?php echo __('Interesprestamo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($interesprestamo['Interesprestamo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor'); ?></dt>
		<dd>
			<?php echo h($interesprestamo['Interesprestamo']['valor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipoprestamo'); ?></dt>
		<dd>
			<?php echo h($interesprestamo['Interesprestamo']['tipoprestamo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Interesprestamo'), array('action' => 'edit', $interesprestamo['Interesprestamo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Interesprestamo'), array('action' => 'delete', $interesprestamo['Interesprestamo']['id']), null, __('Are you sure you want to delete # %s?', $interesprestamo['Interesprestamo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Interesprestamos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Interesprestamo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Prestamos'), array('controller' => 'prestamos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prestamo'), array('controller' => 'prestamos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Prestamos'); ?></h3>
	<?php if (!empty($interesprestamo['Prestamo'])): ?>
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
	<?php foreach ($interesprestamo['Prestamo'] as $prestamo): ?>
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
