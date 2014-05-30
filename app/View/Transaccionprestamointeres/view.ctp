<div class="transaccionprestamointeres view">
<h2><?php echo __('Transaccionprestamointere'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transaccionprestamointere['Transaccionprestamointere']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prestamo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transaccionprestamointere['Prestamo']['id'], array('controller' => 'prestamos', 'action' => 'view', $transaccionprestamointere['Prestamo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Montointeres'); ?></dt>
		<dd>
			<?php echo h($transaccionprestamointere['Transaccionprestamointere']['montointeres']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha'); ?></dt>
		<dd>
			<?php echo h($transaccionprestamointere['Transaccionprestamointere']['fecha']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Montodeuda'); ?></dt>
		<dd>
			<?php echo h($transaccionprestamointere['Transaccionprestamointere']['montodeuda']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pagodeprestamo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transaccionprestamointere['Pagodeprestamo']['id'], array('controller' => 'pagodeprestamos', 'action' => 'view', $transaccionprestamointere['Pagodeprestamo']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Transaccionprestamointere'), array('action' => 'edit', $transaccionprestamointere['Transaccionprestamointere']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Transaccionprestamointere'), array('action' => 'delete', $transaccionprestamointere['Transaccionprestamointere']['id']), null, __('Are you sure you want to delete # %s?', $transaccionprestamointere['Transaccionprestamointere']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Transaccionprestamointeres'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaccionprestamointere'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Prestamos'), array('controller' => 'prestamos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prestamo'), array('controller' => 'prestamos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pagodeprestamos'), array('controller' => 'pagodeprestamos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pagodeprestamo'), array('controller' => 'pagodeprestamos', 'action' => 'add')); ?> </li>
	</ul>
</div>
