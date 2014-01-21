<div class="chequeEstadocheques index">
	<h2><?php echo __('Restrincion del cheque'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('created','Fecha Creación'); ?></th>
			<th><?php echo $this->Paginator->sort('modified','Fecha Modificación'); ?></th>
			<th><?php echo $this->Paginator->sort('cheque_id','Numero de cheque'); ?></th>
			<th><?php echo $this->Paginator->sort('estadocheque_id','Estado del Cheque'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id','Registrado'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($chequeEstadocheques as $chequeEstadocheque): ?>
	<tr>
		<td><?php echo h($chequeEstadocheque['ChequeEstadocheque']['id']); ?>&nbsp;</td>
		<td><?php echo h($chequeEstadocheque['ChequeEstadocheque']['created']); ?>&nbsp;</td>
		<td><?php echo h($chequeEstadocheque['ChequeEstadocheque']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($chequeEstadocheque['Cheque']['numerodecheque'], array('controller' => 'cheques', 'action' => 'view', $chequeEstadocheque['Cheque']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($chequeEstadocheque['Estadocheque']['nomenclatura'], array('controller' => 'estadocheques', 'action' => 'view', $chequeEstadocheque['Estadocheque']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($chequeEstadocheque['User']['username'], array('controller' => 'users', 'action' => 'view', $chequeEstadocheque['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $chequeEstadocheque['ChequeEstadocheque']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $chequeEstadocheque['ChequeEstadocheque']['id'])); ?>
			<?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $chequeEstadocheque['ChequeEstadocheque']['id']), null, __('Estas seguro que desea borrar # %s?', $chequeEstadocheque['ChequeEstadocheque']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Nuevo Cheque Estado cheque'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Lista Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cheque'), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Estado cheques'), array('controller' => 'estadocheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Estadocheque'), array('controller' => 'estadocheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Usuario'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Pagos'), array('controller' => 'pagos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Pago'), array('controller' => 'pagos', 'action' => 'add')); ?> </li>
	</ul>
</div>
