<div class="tipogarantias view">
<h2><?php echo __('Tipogarantia'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tipogarantia['Tipogarantia']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($tipogarantia['Tipogarantia']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($tipogarantia['Tipogarantia']['descripcion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tipogarantia'), array('action' => 'edit', $tipogarantia['Tipogarantia']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tipogarantia'), array('action' => 'delete', $tipogarantia['Tipogarantia']['id']), null, __('Are you sure you want to delete # %s?', $tipogarantia['Tipogarantia']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipogarantias'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipogarantia'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Garantias'), array('controller' => 'garantias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Garantia'), array('controller' => 'garantias', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Garantias'); ?></h3>
	<?php if (!empty($tipogarantia['Garantia'])): ?>
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
	<?php foreach ($tipogarantia['Garantia'] as $garantia): ?>
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
