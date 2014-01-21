<div class="estadocheques view">
<h2><?php echo __('Estadocheque'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($estadocheque['Estadocheque']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($estadocheque['Estadocheque']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nomenclatura'); ?></dt>
		<dd>
			<?php echo h($estadocheque['Estadocheque']['nomenclatura']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($estadocheque['Estadocheque']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($estadocheque['User']['username'], array('controller' => 'users', 'action' => 'view', $estadocheque['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Estado cheque'), array('action' => 'edit', $estadocheque['Estadocheque']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Borrar Estado cheque'), array('action' => 'delete', $estadocheque['Estadocheque']['id']), null, __('Estas Seguro de borrar este Estado del cheque: %s?', $estadocheque['Estadocheque']['nombre'])); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Estado cheques'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Estado cheque'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Usuario'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
