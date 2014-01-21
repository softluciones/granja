<div class="cuentas index">
	<h2><?php echo __('Cuentas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('numero'); ?></th>
			<th><?php echo $this->Paginator->sort('banco_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cliente_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cuentas as $cuenta): ?>
	<tr>
		<td><?php echo h($cuenta['Cuenta']['id']); ?>&nbsp;</td>
		<td><?php echo h($cuenta['Cuenta']['numero']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cuenta['Banco']['codigo'], array('controller' => 'bancos', 'action' => 'view', $cuenta['Banco']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($cuenta['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $cuenta['Cliente']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($cuenta['User']['username'], array('controller' => 'users', 'action' => 'view', $cuenta['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $cuenta['Cuenta']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cuenta['Cuenta']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cuenta['Cuenta']['id']), null, __('Are you sure you want to delete # %s?', $cuenta['Cuenta']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Cuenta'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Bancos'), array('controller' => 'bancos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Banco'), array('controller' => 'bancos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
