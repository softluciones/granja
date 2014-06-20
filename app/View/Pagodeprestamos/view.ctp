<div class="pagodeprestamos view">
<h2><?php echo __('Pagodeprestamo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pagodeprestamo['Pagodeprestamo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Montopagado'); ?></dt>
		<dd>
			<?php echo h($pagodeprestamo['Pagodeprestamo']['montopagado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha'); ?></dt>
		<dd>
			<?php echo h($pagodeprestamo['Pagodeprestamo']['fecha']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nroreferencia'); ?></dt>
		<dd>
			<?php echo h($pagodeprestamo['Pagodeprestamo']['nroreferencia']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Diaspagados'); ?></dt>
		<dd>
			<?php echo h($pagodeprestamo['Pagodeprestamo']['diaspagados']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Montodeuda'); ?></dt>
		<dd>
			<?php echo h($pagodeprestamo['Pagodeprestamo']['montodeuda']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipopago'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pagodeprestamo['Tipopago']['nombre'], array('controller' => 'tipopagos', 'action' => 'view', $pagodeprestamo['Tipopago']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descri'); ?></dt>
		<dd>
			<?php echo h($pagodeprestamo['Pagodeprestamo']['descri']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descuento'); ?></dt>
		<dd>
			<?php echo h($pagodeprestamo['Pagodeprestamo']['descuento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pagodeprestamo['User']['username'], array('controller' => 'users', 'action' => 'view', $pagodeprestamo['User']['id'])); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Prestamo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pagodeprestamo['Prestamo']['id'], array('controller' => 'prestamos', 'action' => 'view', $pagodeprestamo['Prestamo']['id'])); ?>
			&nbsp;
		</dd>

	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pagodeprestamo'), array('action' => 'edit', $pagodeprestamo['Pagodeprestamo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Pagodeprestamo'), array('action' => 'delete', $pagodeprestamo['Pagodeprestamo']['id']), null, __('Are you sure you want to delete # %s?', $pagodeprestamo['Pagodeprestamo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pagodeprestamos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pagodeprestamo'), array('action' => 'add')); ?> </li>

		<li><?php echo $this->Html->link(__('List Tipopagos'), array('controller' => 'tipopagos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipopago'), array('controller' => 'tipopagos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>

		<li><?php echo $this->Html->link(__('List Prestamos'), array('controller' => 'prestamos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prestamo'), array('controller' => 'prestamos', 'action' => 'add')); ?> </li>

		<li><?php echo $this->Html->link(__('List Transaccionprestamointeres'), array('controller' => 'transaccionprestamointeres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaccionprestamointere'), array('controller' => 'transaccionprestamointeres', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Transaccionprestamointeres'); ?></h3>
	<?php if (!empty($pagodeprestamo['Transaccionprestamointere'])): ?>
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
	<?php foreach ($pagodeprestamo['Transaccionprestamointere'] as $transaccionprestamointere): ?>
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
