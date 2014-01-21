<div class="bancos index">
	<h2><?php echo __('Lista de Bancos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id','identificador'); ?></th>
			<th><?php echo $this->Paginator->sort('codigo'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion','Descripción'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id','Registrado por'); ?></th>
			<th class="actions"><?php echo __('Acciones de'); ?></th>
	</tr>
	<?php foreach ($bancos as $banco): ?>
	<tr>
		<td><?php echo h($banco['Banco']['id']); ?>&nbsp;</td>
		<td><?php echo h($banco['Banco']['codigo']); ?>&nbsp;</td>
		<td><?php echo h($banco['Banco']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($banco['Banco']['descripcion']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($banco['User']['username'], array('controller' => 'users', 'action' => 'view', $banco['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $banco['Banco']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $banco['Banco']['id'])); ?>
			<?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $banco['Banco']['id']), null, __('Estas seguro de eliminar el codigo # %s?', $banco['Banco']['codigo'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
            'format' => __('Pagina {:page} de {:pages}, mostrando {:current} Registro de {:count} total, a partir del registro {:start}, y termina en {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('Atras'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nuevo Banco'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Lista Usuarios'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cheque'), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Cuentas'), array('controller' => 'cuentas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Cuenta'), array('controller' => 'cuentas', 'action' => 'add')); ?> </li>
	</ul>
</div>
