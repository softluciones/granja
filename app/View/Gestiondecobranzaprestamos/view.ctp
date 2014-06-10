<div class="gestiondecobranzaprestamos view">
<h2><?php echo __('Gestiondecobranzaprestamo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($gestiondecobranzaprestamo['Gestiondecobranzaprestamo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($gestiondecobranzaprestamo['Gestiondecobranzaprestamo']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($gestiondecobranzaprestamo['Gestiondecobranzaprestamo']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prestamo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($gestiondecobranzaprestamo['Prestamo']['id'], array('controller' => 'prestamos', 'action' => 'view', $gestiondecobranzaprestamo['Prestamo']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Gestiondecobranzaprestamo'), array('action' => 'edit', $gestiondecobranzaprestamo['Gestiondecobranzaprestamo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Gestiondecobranzaprestamo'), array('action' => 'delete', $gestiondecobranzaprestamo['Gestiondecobranzaprestamo']['id']), null, __('Are you sure you want to delete # %s?', $gestiondecobranzaprestamo['Gestiondecobranzaprestamo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Gestiondecobranzaprestamos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gestiondecobranzaprestamo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Prestamos'), array('controller' => 'prestamos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prestamo'), array('controller' => 'prestamos', 'action' => 'add')); ?> </li>
	</ul>
</div>
