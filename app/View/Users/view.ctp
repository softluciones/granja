<div class="users view">

    <table>
        <th colspan="3" style="background:#cccccc; height: 50px; font-size: 20px;"><div align="center">Usuario</div></th>
    <tr>
        <th><?php echo __('Codigo del usuario: '); echo h($user['User']['id']); ?></th>
        <th><?php echo __('Usuario: '); echo h($user['User']['username']); ?></th>
        <th><?php echo __('Rol del usuario: '); echo $this->Html->link($user['Role']['nombre'], array('controller' => 'roles', 'action' => 'view', $user['Role']['id'])); ?></th>
    </tr>
    <tr>
        <th><?php echo __('Nombre empleado: '); echo h($user['User']['nombre']); ?></th>
        <th><?php echo __('Apellido empleado: '); echo h($user['User']['apellido']); ?></th>
        <th></th>
    </tr>
        </table>
    <br><br>
<div class="related">
    <table cellpadding = "0" cellspacing = "0">
	<th colspan="3" style="background:#cccccc; height: 50px; font-size: 20px;"><div align="center">Banco Registrados</div></th>
	<?php if (!empty($user['Banco'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
        <thead>
		<th><?php echo __('Codigo'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
	</thead>
		
	</tr>
	<?php foreach ($user['Banco'] as $banco): ?>
		<tr>
			
			<td><?php echo $banco['codigo']; ?></td>
			<td><?php echo $banco['nombre']; ?></td>
			
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
    <br><br>

    <div class="related">
<table cellpadding = "0" cellspacing = "0">
	<th colspan="3" style="background:#cccccc; height: 50px; font-size: 20px;"><div align="center">Cheque</div></th>
	<?php if (!empty($user['Cheque'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
        <thead>
		<th><?php echo __('Numero de cuenta'); ?></th>
		<th><?php echo __('Numero de cheque'); ?></th>
		<th><?php echo __('Monto'); ?></th>
		<th><?php echo __('Fecha recibido'); ?></th>
		<th><?php echo __('Fecha cobro'); ?></th>
		<th><?php echo __('Cobrado'); ?></th>
		<th><?php echo __('Pago del otro cheque'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
        </thead>
		
	</tr>
	<?php foreach ($user['Cheque'] as $cheque): ?>
		<tr>
			<td><?php echo $cheque['numerodecuenta']; ?></td>
			<td><?php echo $cheque['numerodecheque']; ?></td>
			<td><?php echo $cheque['monto']; ?></td>	
			<td><?php echo $cheque['fecharecibido']; ?></td>
			<td><?php echo $cheque['fechacobro']; ?></td>
			<td><?php echo $cheque['cobrado']; ?></td>
			<td><?php echo $cheque['cheque_id']; ?></td>
			<td><?php echo $cheque['user_id']; ?></td>
			
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	
</div>
    <br><br>
    <div class="related">
        <table cellpadding = "0" cellspacing = "0">
	<th colspan="3" style="background:#cccccc; height: 50px; font-size: 20px;"><div align="center">Clientes</div></th>
	
	<?php if (!empty($user['Cliente'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
        <thead>
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
		</thead>
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
	<table cellpadding = "0" cellspacing = "0">
	<th colspan="3" style="background:#cccccc; height: 50px; font-size: 20px;"><div align="center">Numero de cuentas de clientes</div></th>
	<?php if (!empty($user['Cuenta'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
        <thead>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Numero'); ?></th>
		<th><?php echo __('Banco Id'); ?></th>
		<th><?php echo __('Cliente Id'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
	</thead>
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
	<table cellpadding = "0" cellspacing = "0">
	<th colspan="3" style="background:#cccccc; height: 50px; font-size: 20px;"><div align="center">Pagos registrados</div></th>
	<?php if (!empty($user['Pago'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
        <thead>
		
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
        </thead>
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
	<table cellpadding = "0" cellspacing = "0">
	<th colspan="3" style="background:#cccccc; height: 50px; font-size: 20px;"><div align="center">Pagos A terceros</div></th>
	<?php if (!empty($user['Pagotercero'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<thead>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Dia'); ?></th>
		<th><?php echo __('Monto'); ?></th>
		<th><?php echo __('Conceptode'); ?></th>
		<th><?php echo __('Cliente Id'); ?></th>
		<th><?php echo __('Cliente Id1'); ?></th>
		<th><?php echo __('Cheque Id'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
                </thead>
	</tr>
	<?php foreach ($user['Pagotercero'] as $pagotercero): ?>
		<tr>
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
	<h3><?php echo __(''); ?></h3>
	<?php if (!empty($user['Tipopago'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		
	</tr>
	
	</table>
<?php endif; ?>

	
</div>

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
		<li><?php echo $this->Html->link(__('Lista Tipo pagos'), array('controller' => 'tipopagos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Tipo pago'), array('controller' => 'tipopagos', 'action' => 'add')); ?> </li>
                
	</ul>
</div>







