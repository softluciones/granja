<div class="cuentas view">
<h2><?php echo __('Cuenta'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cuenta['Cuenta']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero'); ?></dt>
		<dd>
			<?php echo h($cuenta['Cuenta']['numero']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Banco'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cuenta['Banco']['codigo'], array('controller' => 'bancos', 'action' => 'view', $cuenta['Banco']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cliente'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cuenta['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $cuenta['Cliente']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cuenta['User']['username'], array('controller' => 'users', 'action' => 'view', $cuenta['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cuenta'), array('action' => 'edit', $cuenta['Cuenta']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cuenta'), array('action' => 'delete', $cuenta['Cuenta']['id']), null, __('Are you sure you want to delete # %s?', $cuenta['Cuenta']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cuentas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cuenta'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bancos'), array('controller' => 'bancos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Banco'), array('controller' => 'bancos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
