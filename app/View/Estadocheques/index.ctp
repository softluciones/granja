<div class="box">
	<h2><?php echo __('Estado cheques'); ?></h2>
	<table cellpadding="0" cellspacing="0">
            <thead>
            <tr>
			
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('nomenclatura'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion','Descripción'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id', 'Usuario'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
        </thead>
	<?php foreach ($estadocheques as $estadocheque): ?>
	<tr>
		
		<td><?php echo h($estadocheque['Estadocheque']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($estadocheque['Estadocheque']['nomenclatura']); ?>&nbsp;</td>
		<td><?php echo h($estadocheque['Estadocheque']['descripcion']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($estadocheque['User']['username'], array('controller' => 'users', 'action' => 'view', $estadocheque['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $estadocheque['Estadocheque']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $estadocheque['Estadocheque']['id'])); ?>
			<?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $estadocheque['Estadocheque']['id']), null, __('Estas seguro de eliminar este estado: %s?', $estadocheque['Estadocheque']['nombre'])); ?>
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
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nuevo Estado cheque'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Lista Usuarios'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
