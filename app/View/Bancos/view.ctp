<div class="bancos view">
<h2><?php echo __('Descripción del Banco'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($banco['Banco']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Codigo'); ?></dt>
		<dd>
			<?php echo h($banco['Banco']['codigo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($banco['Banco']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripción'); ?></dt>
		<dd>
			<?php echo h($banco['Banco']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($banco['User']['username'], array('controller' => 'users', 'action' => 'view', $banco['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Banco'), array('action' => 'edit', $banco['Banco']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Borrar Banco'), array('action' => 'delete', $banco['Banco']['id']), null, __('Está seguro de borrar el codigo # %s: %s?', $banco['Banco']['codigo'], $banco['Banco']['nombre'])); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Bancos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Banco'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Usuario'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cheque'), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Cuentas'), array('controller' => 'cuentas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Cuenta'), array('controller' => 'cuentas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Cheques relacionados a este banco'); ?></h3>
	<?php if (!empty($banco['Cheque'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		
		<th><?php echo __('Cliente'); ?></th>
		
		<th><?php echo __('Numero de cheque'); ?></th>
		<th><?php echo __('Monto'); ?></th>
		
		<th><?php echo __('Fecha recibido'); ?></th>
		<th><?php echo __('Fecha cobro'); ?></th>
		<th><?php echo __('Estado'); ?></th>
		<th><?php echo __('Cheque con deuda'); ?></th>
                <th><?php echo __('Registrado por'); ?></th>
		
		<th class="actions"><?php #echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($banco['Cheque'] as $cheque): ?>
		<tr>
			
			<td><?php
                            #debug($banco);
                        echo $cheque['Cliente']['nombre']; ?></td>
			
			<td><?php echo $this->Html->link(__($cheque['numerodecheque']), array('controller' => 'cheques', 'action' => 'view', $cheque['id']));
                                    #echo $cheque['numerodecheque']; ?></td>
			<td><?php echo $cheque['monto']; ?></td>
			<td><?php echo $cheque['fecharecibido']; ?></td>
			<td><?php echo $cheque['fechacobro']; ?></td>
			<td><?php 
                        if($cheque['cobrado']==2)    
                        echo 'Cobrado';
                        else
                            if($cheque['cobrado']==1)
                                echo 'Por Cobrar';
                            else
                                echo 'Devuelto';
                               
                                ?></td>
                        <td><?php echo $cheque['cheque_id']; ?></td>
                        <td><?php echo $cheque['User']['username']; ?></td>
			
			<td class="actions">
				<?php #echo $this->Html->link(__('Ver'), array('controller' => 'cheques', 'action' => 'view', $cheque['id'])); ?>
				<?php #echo $this->Html->link(__('Editar'), array('controller' => 'cheques', 'action' => 'edit', $cheque['id'])); ?>
				<?php #echo $this->Form->postLink(__('Borrar'), array('controller' => 'cheques', 'action' => 'delete', $cheque['id']), null, __('Estas seguro de borrar el cheque # %s?', $cheque['numerodecheque'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	
</div>
<div class="related">
	<h3><?php echo __('Cuentas relacionadas a este banco'); ?></h3>
	<?php if (!empty($banco['Cuenta'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Numero'); ?></th>
		<th><?php echo __('Banco Id'); ?></th>
		<th><?php echo __('Cliente Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($banco['Cuenta'] as $cuenta): ?>
		<tr>
			<td><?php echo $cuenta['id']; ?></td>
			<td><?php echo $cuenta['numero']; ?></td>
			<td><?php echo $cuenta['banco_id']; ?></td>
			<td><?php echo $cuenta['cliente_id']; ?></td>
			<td><?php echo $cuenta['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'cuentas', 'action' => 'view', $cuenta['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'cuentas', 'action' => 'edit', $cuenta['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'cuentas', 'action' => 'delete', $cuenta['id']), null, __('Are you sure you want to delete # %s?', $cuenta['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	
</div>
