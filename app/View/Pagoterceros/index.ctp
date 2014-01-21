<div class="pagoterceros index">
	<h2><?php echo __('Pago terceros');
        //debug($pagoterceros)
        ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('created','Fecha creación'); ?></th>
			<th><?php echo $this->Paginator->sort('dia'); ?></th>
			<th><?php echo $this->Paginator->sort('monto'); ?></th>
			<th><?php echo $this->Paginator->sort('conceptode','Concepto de'); ?></th>
			<th><?php echo $this->Paginator->sort('cliente_id','Cliente origen'); ?></th>
			<th><?php echo $this->Paginator->sort('cliente_id1','Cliente destion'); ?></th>
			<th><?php echo $this->Paginator->sort('cheque_id','Numero de cheque'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id','Transaccion hecha por'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($pagoterceros as $pagotercero): ?>
	<tr>
		<td><?php echo h($pagotercero['Pagotercero']['id']); ?>&nbsp;</td>
		<td><?php echo h($pagotercero['Pagotercero']['created']); ?>&nbsp;</td>
		<td><?php echo h($pagotercero['Pagotercero']['dia']); ?>&nbsp;</td>
		<td><?php echo h($pagotercero['Pagotercero']['monto']); ?>&nbsp;</td>
		<td><?php echo h($pagotercero['Pagotercero']['conceptode']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pagotercero['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $pagotercero['Cliente']['id'])); ?>
		</td>
		<td><?php echo h($pagotercero['Cliente1']['nombre']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pagotercero['Cheque']['numerodecheque'], array('controller' => 'cheques', 'action' => 'view', $pagotercero['Cheque']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($pagotercero['User']['username'], array('controller' => 'users', 'action' => 'view', $pagotercero['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $pagotercero['Pagotercero']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $pagotercero['Pagotercero']['id'])); ?>
			<?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $pagotercero['Pagotercero']['id']), null, __('Estas seguro que desea eliminar la transacción # %s?', $pagotercero['Pagotercero']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Nuevo Pago tercero'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Lista Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cheque'), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Usuario'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Pagos'), array('controller' => 'pagos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Pago'), array('controller' => 'pagos', 'action' => 'add')); ?> </li>
	</ul>
</div>
