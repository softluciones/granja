<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Identificador'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contraseña'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rol del usuario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Role']['nombre'], array('controller' => 'roles', 'action' => 'view', $user['Role']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre empleado'); ?></dt>
		<dd>
			<?php echo h($user['User']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Apellido empleado'); ?></dt>
		<dd>
			<?php echo h($user['User']['apellido']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Usuario'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Borrar usuario'), array('action' => 'delete', $user['User']['id']), null, __('Estas seguro que desea borrar al usuario: %s?', $user['User']['username'])); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Usuarios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Roles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Rol'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Bancos'), array('controller' => 'bancos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Banco'), array('controller' => 'bancos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Cheque Estado cheques'), array('controller' => 'cheque_estadocheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cheque Estado cheque'), array('controller' => 'cheque_estadocheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Cheque intereses'), array('controller' => 'chequeinterese', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cheque interes'), array('controller' => 'chequeinterese', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cheque'), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Cuentas'), array('controller' => 'cuentas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Cuenta'), array('controller' => 'cuentas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Estado cheques'), array('controller' => 'estadocheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Estado cheque'), array('controller' => 'estadocheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Gestion de cobranzas'), array('controller' => 'gestiondecobranzas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Gestion de cobranza'), array('controller' => 'gestiondecobranzas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Intereses'), array('controller' => 'interese', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Interes'), array('controller' => 'interese', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Pagos'), array('controller' => 'pagos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Pago'), array('controller' => 'pagos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pago terceros'), array('controller' => 'pagoterceros', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Pago tercero'), array('controller' => 'pagoterceros', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Tipo pagos'), array('controller' => 'tipopagos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Tipo pago'), array('controller' => 'tipopagos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Bancos relacionados que ha registrado este usuario: %s',$user['User']['username']); ?></h3>
	<?php if (!empty($user['Banco'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Codigo'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
		
	</tr>
	<?php foreach ($user['Banco'] as $banco): ?>
		<tr>
			<td><?php echo $banco['id']; ?></td>
			<td><?php echo $banco['codigo']; ?></td>
			<td><?php echo $banco['nombre']; ?></td>
			<td><?php echo $banco['descripcion']; ?></td>
			<td><?php echo $banco['user_id']; ?></td>
			<td class="actions">
				
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	
</div>
<div class="related">
	<h3><?php echo __('Relacion de Cheque con un Estado cheques hechas por: %s',$user['User']['username']); ?></h3>
	<?php if (!empty($user['ChequeEstadocheque'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Fecha de registro'); ?></th>
		<th><?php echo __('Numero de cuenta'); ?></th>
		<th><?php echo __('Estado cheque Identificador'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
		
	</tr>
	<?php foreach ($user['ChequeEstadocheque'] as $chequeEstadocheque): ?>
		<tr>
			<td><?php echo $chequeEstadocheque['id']; ?></td>
			<td><?php echo $chequeEstadocheque['created']; ?></td>
			<td><?php echo $chequeEstadocheque['cheque_id']; ?></td>
			<td><?php echo $chequeEstadocheque['estadocheque_id']; ?></td>
			<td><?php echo $chequeEstadocheque['user_id']; ?></td>
			
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	
</div>
<div class="related">
	<h3><?php echo __('Deuda o lo que se le debe de un Cheque con intereses a un cliente registrado por: %s',$user['User']['username']); ?></h3>
	<?php if (!empty($user['Chequeinterese'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Deuda actual'); ?></th>
		<th><?php echo __('Deuda intereses'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Interese Id'); ?></th>
		<th><?php echo __('Cheque Id'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
		
	</tr>
	<?php foreach ($user['Chequeinterese'] as $chequeinterese): ?>
		<tr>
			<td><?php echo $chequeinterese['id']; ?></td>
			<td><?php echo $chequeinterese['deudaactual']; ?></td>
			<td><?php echo $chequeinterese['deudaintereses']; ?></td>
			<td><?php echo $chequeinterese['created']; ?></td>
			<td><?php echo $chequeinterese['interese_id']; ?></td>
			<td><?php echo $chequeinterese['id_cheque']; ?></td>
			<td><?php echo $chequeinterese['user_id']; ?></td>
			
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	
</div>
<div class="related">
	<h3><?php echo __('Cheques que han sido registrados por: %s',$user['User']['username']); ?></h3>
	<?php if (!empty($user['Cheque'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Banco Id'); ?></th>
		<th><?php echo __('Cliente Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Numero de cuenta'); ?></th>
		<th><?php echo __('Numero de cheque'); ?></th>
		<th><?php echo __('Monto'); ?></th>
		<th><?php echo __('Filename'); ?></th>
		<th><?php echo __('Fecha recibido'); ?></th>
		<th><?php echo __('Fecha cobro'); ?></th>
		<th><?php echo __('Cobrado'); ?></th>
		<th><?php echo __('Cheque Id'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
		
	</tr>
	<?php foreach ($user['Cheque'] as $cheque): ?>
		<tr>
			<td><?php echo $cheque['id']; ?></td>
			<td><?php echo $cheque['banco_id']; ?></td>
			<td><?php echo $cheque['cliente_id']; ?></td>
			<td><?php echo $cheque['created']; ?></td>
			<td><?php echo $cheque['numerodecuenta']; ?></td>
			<td><?php echo $cheque['numerodecheque']; ?></td>
			<td><?php echo $cheque['monto']; ?></td>
			<td><?php echo $cheque['filename']; ?></td>
			<td><?php echo $cheque['fecharecibido']; ?></td>
			<td><?php echo $cheque['fechacobro']; ?></td>
			<td><?php echo $cheque['cobrado']; ?></td>
			<td><?php echo $cheque['id_cheque']; ?></td>
			<td><?php echo $cheque['user_id']; ?></td>
			
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	
</div>
<div class="related">
	<h3><?php echo __('Clientes registro de clientes hechas por: %s',$user['User']['username']); ?></h3>
	<?php if (!empty($user['Cliente'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Cedula'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Apellido'); ?></th>
		<th><?php echo __('Apodo'); ?></th>
		<th><?php echo __('Negocio'); ?></th>
		<th><?php echo __('Direccion'); ?></th>
		<th><?php echo __('Telefono fijo'); ?></th>
		<th><?php echo __('Telefono celular'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
		
	</tr>
	<?php foreach ($user['Cliente'] as $cliente): ?>
		<tr>
			<td><?php echo $cliente['id']; ?></td>
			<td><?php echo $cliente['created']; ?></td>
			<td><?php echo $cliente['cedula']; ?></td>
			<td><?php echo $cliente['nombre']; ?></td>
			<td><?php echo $cliente['apellido']; ?></td>
			<td><?php echo $cliente['apodo']; ?></td>
			<td><?php echo $cliente['negocio']; ?></td>
			<td><?php echo $cliente['direccion']; ?></td>
			<td><?php echo $cliente['telefonofijo']; ?></td>
			<td><?php echo $cliente['telefonocelular']; ?></td>
			<td><?php echo $cliente['email']; ?></td>
			<td><?php echo $cliente['user_id']; ?></td>
			
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	
</div>
<div class="related">
	<h3><?php echo __('Cuentas Registradas por: %s',$user['User']['username']); ?></h3>
	<?php if (!empty($user['Cuenta'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Numero'); ?></th>
		<th><?php echo __('Banco Id'); ?></th>
		<th><?php echo __('Cliente Id'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
		
	</tr>
	<?php foreach ($user['Cuenta'] as $cuenta): ?>
		<tr>
			<td><?php echo $cuenta['id']; ?></td>
			<td><?php echo $cuenta['numero']; ?></td>
			<td><?php echo $cuenta['banco_id']; ?></td>
			<td><?php echo $cuenta['cliente_id']; ?></td>
			<td><?php echo $cuenta['user_id']; ?></td>
			
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	
</div>
<div class="related">
	<h3><?php echo __('Estado cheques registrado por: %s',$user['User']['username']); ?></h3>
	<?php if (!empty($user['Estadocheque'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Nomenclatura'); ?></th>
		<th><?php echo __('Descripción'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
		
	</tr>
	<?php foreach ($user['Estadocheque'] as $estadocheque): ?>
		<tr>
			<td><?php echo $estadocheque['id']; ?></td>
			<td><?php echo $estadocheque['nombre']; ?></td>
			<td><?php echo $estadocheque['nomenclatura']; ?></td>
			<td><?php echo $estadocheque['descripcion']; ?></td>
			<td><?php echo $estadocheque['user_id']; ?></td>
			
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
<div class="related">
	<h3><?php echo __('Gestion de cobranzas registrado por: %s',$user['User']['username']); ?></h3>
	<?php if (!empty($user['Gestiondecobranza'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Fecha de creación'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Cheque Id'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
		
	</tr>
	<?php foreach ($user['Gestiondecobranza'] as $gestiondecobranza): ?>
		<tr>
			<td><?php echo $gestiondecobranza['id']; ?></td>
			<td><?php echo $gestiondecobranza['created']; ?></td>
			<td><?php echo $gestiondecobranza['descripcion']; ?></td>
			<td><?php echo $gestiondecobranza['cheque_id']; ?></td>
			<td><?php echo $gestiondecobranza['user_id']; ?></td>
			
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	
</div>
<div class="related">
	<h3><?php echo __('Intereses registrado por: %s',$user['User']['username']); ?></h3>
	<?php if (!empty($user['Interese'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Fecha creación'); ?></th>
		<th><?php echo __('Vigencia'); ?></th>
		<th><?php echo __('Minimo'); ?></th>
		<th><?php echo __('Maximo'); ?></th>
		<th><?php echo __('Monto fijo'); ?></th>
		<th><?php echo __('Porcentaje'); ?></th>
		<th><?php echo __('Tipo'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
		
	</tr>
	<?php foreach ($user['Interese'] as $interese): ?>
		<tr>
			<td><?php echo $interese['id']; ?></td>
			<td><?php echo $interese['created']; ?></td>
			<td><?php echo $interese['vigencia']; ?></td>
			<td><?php echo $interese['minimo']; ?></td>
			<td><?php echo $interese['maximo']; ?></td>
			<td><?php echo $interese['montofijo']; ?></td>
			<td><?php echo $interese['porcentaje']; ?></td>
			<td><?php echo $interese['tipo']; ?></td>
			<td><?php echo $interese['user_id']; ?></td>
			
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	
</div>
<div class="related">
	<h3><?php echo __('Pagos Registrado por: %s',$user['User']['username']); ?></h3>
	<?php if (!empty($user['Pago'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Fecha Creación'); ?></th>
		<th><?php echo __('Monto'); ?></th>
		<th><?php echo __('Concepto de'); ?></th>
		<th><?php echo __('Edo deuda'); ?></th>
		<th><?php echo __('Pago interese Deuda'); ?></th>
		<th><?php echo __('Cheque interese Id'); ?></th>
		<th><?php echo __('Cheque Estado cheque Id'); ?></th>
		<th><?php echo __('Tipo pago Id'); ?></th>
		<th><?php echo __('Pago tercero Id'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
		
	</tr>
	<?php foreach ($user['Pago'] as $pago): ?>
		<tr>
			<td><?php echo $pago['id']; ?></td>
			<td><?php echo $pago['created']; ?></td>
			<td><?php echo $pago['monto']; ?></td>
			<td><?php echo $pago['conceptode']; ?></td>
			<td><?php echo $pago['edodeuda']; ?></td>
			<td><?php echo $pago['pagointerese_deuda']; ?></td>
			<td><?php echo $pago['chequeinterese_id']; ?></td>
			<td><?php echo $pago['cheque_estadocheque_id']; ?></td>
			<td><?php echo $pago['tipopago_id']; ?></td>
			<td><?php echo $pago['pagotercero_id']; ?></td>
			<td><?php echo $pago['user_id']; ?></td>
			
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	
</div>
<div class="related">
	<h3><?php echo __('Pago terceros registrado por %s',$user['User']['username']); ?></h3>
	<?php if (!empty($user['Pagotercero'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Dia'); ?></th>
		<th><?php echo __('Monto'); ?></th>
		<th><?php echo __('Conceptode'); ?></th>
		<th><?php echo __('Cliente Id'); ?></th>
		<th><?php echo __('Cliente Id1'); ?></th>
		<th><?php echo __('Cheque Id'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
	</tr>
	<?php foreach ($user['Pagotercero'] as $pagotercero): ?>
		<tr>
			<td><?php echo $pagotercero['id']; ?></td>
			<td><?php echo $pagotercero['created']; ?></td>
			<td><?php echo $pagotercero['dia']; ?></td>
			<td><?php echo $pagotercero['monto']; ?></td>
			<td><?php echo $pagotercero['conceptode']; ?></td>
			<td><?php echo $pagotercero['cliente_id']; ?></td>
			<td><?php echo $pagotercero['cliente_id1']; ?></td>
			<td><?php echo $pagotercero['cheque_id']; ?></td>
			<td><?php echo $pagotercero['user_id']; ?></td>
			
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	
</div>
<div class="related">
	<h3><?php echo __('Tipo pagos registrado por: %s',$user['User']['username']); ?></h3>
	<?php if (!empty($user['Tipopago'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
	</tr>
	<?php foreach ($user['Tipopago'] as $tipopago): ?>
		<tr>
			<td><?php echo $tipopago['id']; ?></td>
			<td><?php echo $tipopago['nombre']; ?></td>
			<td><?php echo $tipopago['descripcion']; ?></td>
			<td><?php echo $tipopago['user_id']; ?></td>
			
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	
</div>
