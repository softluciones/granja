<div class="users view">

<table>
    <thead>      
                 <th colspan="3" style="background:#cccccc; height: 50px; font-size: 20px;">
         <div align="center">Usuario del Sistema</div>
                 </th>            
         </thead>

         <tr>
             <th><?php echo __('Identificador: ');  echo h($user['User']['id']); ?></th>
             <th><?php echo __('Usuario: '); echo h($user['User']['username']); ?></th>
             <th><?php echo __('Rol del usuario: '); echo $this->Html->link($user['Role']['nombre'], array('controller' => 'roles', 'action' => 'view', $user['Role']['id'])); ?></th>
         </tr>
         <tr>
             <th><?php echo __('Nombre empleado: '); echo h($user['User']['nombre']); ?></th>
             <th><?php echo __('Apellido empleado: '); echo h($user['User']['apellido']);?></th>
             <th></th>
         </tr>
</table>
    <br>
    <div class="related">
        
	<?php if (!empty($user['Banco'])): ?>
	<table cellpadding = "0" cellspacing = "0">
            <thead>      
                 <th colspan="6" style="background:#cccccc; height: 50px; font-size: 20px;">
         <div align="center">Bancos</div>
                 </th>            
         </thead>
	<tr>
                <thead>
                    <th><?php echo __('Codigo'); ?></th>
                    <th><?php echo __('Nombre'); ?></th>
                    <th></th>
		</thead>
		
		
	</tr>
	<?php foreach ($user['Banco'] as $banco): ?>
		<tr>
			
			<td><?php echo $banco['codigo']; ?></td>
			<td><?php echo $banco['nombre']; ?></td>
                        
			
			<td class="actions">
				
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

        <br>
</div>
<div class="related">
	
	<?php if (!empty($user['Cheque'])): ?>
	<table cellpadding = "0" cellspacing = "0">
            <thead>      
                 <th colspan="12" style="background:#cccccc; height: 50px; font-size: 20px;">
         <div align="center">Cheques</div>
                 </th>            
         </thead>
	<tr>
        <thead>
		
		<th><?php echo __('Banco'); ?></th>
		<th><?php echo __('Cliente'); ?></th>
		<th><?php echo __('Numero de cheque'); ?></th>
		<th><?php echo __('Monto'); ?></th>
		<th><?php echo __('Fecha recibido'); ?></th>
		<th><?php echo __('Fecha cobro'); ?></th>
		<th><?php echo __('Cobrado'); ?></th>
		<th><?php echo __('cheque'); ?></th>
	</thead>
		
	</tr>
	<?php  foreach ($user['Cheque'] as $cheque): ?>
		<tr>
			<td><?php echo $cheque['Banco']['nombre']; ?></td>
			<td><?php echo $cheque['Cliente']['apodo']; ?></td>
			<td><?php echo $cheque['numerodecheque']; ?></td>
			<td><?php echo $cheque['monto']; ?></td>
			<td><?php echo $cheque['fecharecibido']; ?></td>
			<td><?php echo $cheque['fechacobro']; ?></td>
			<td><?php if($cheque['cobrado']==1)
                                    echo "por cobrar";
                                   else
                                        if($cheque['cobrado']==0)
                                            echo "Devuelto";
                                        else{
                                            echo "cobrado";
                                        }?></td>
			<td><?php echo $cheque['cheque_id']; ?></td>
                        <td> </td>
			
			
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	
</div>
    <br>
    <div class="related">
	
	<?php if (!empty($user['Cliente'])): ?>
	<table cellpadding = "0" cellspacing = "0">
            <thead>      
                 <th colspan="12" style="background:#cccccc; height: 50px; font-size: 20px;">
         <div align="center">Clientes</div>
                 </th>            
         </thead>
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
        <br>
	
</div>
    <div class="related">
	
	<?php if (!empty($user['Cuenta'])): ?>
	<table cellpadding = "0" cellspacing = "0">
            <thead>      
                 <th colspan="12" style="background:#cccccc; height: 50px; font-size: 20px;">
         <div align="center">Cuentas</div>
                 </th>            
         </thead>
	<tr>
            <thead>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Numero'); ?></th>
		<th><?php echo __('Banco Id'); ?></th>
		<th><?php echo __('Cliente Id'); ?></th>
		
           </thead>
	</tr>
	<?php debug($user['Cuenta']); foreach ($user['Cuenta'] as $cuenta): ?>
		<tr>
			<td><?php echo $cuenta['id']; ?></td>
			<td><?php echo $cuenta['numero']; ?></td>
			<td><?php echo $cuenta['Banco']['nombre']; ?></td>
			<td><?php echo $cuenta['Cliente']['apodo']; ?></td>		
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	
</div>
    <br>
    <div class="related">
	<h3><?php echo __('Pagos Registrado por: %s',$user['User']['username']); ?></h3>
	<?php if (!empty($user['Pago'])): ?>
	<table cellpadding = "0" cellspacing = "0">
            <thead>      
                 <th colspan="12" style="background:#cccccc; height: 50px; font-size: 20px;">
         <div align="center">Pagos</div>
                 </th>            
         </thead>
	<tr>
            <thead>
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
		<li><?php echo $this->Html->link(__('Lista Tipo pagos'), array('controller' => 'tipopagos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Tipo pago'), array('controller' => 'tipopagos', 'action' => 'add')); ?> </li>
	</ul>
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
