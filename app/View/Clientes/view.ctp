<style>

input[type=submit],
.acciones ul li a,
.accionrs a {
        background: none;
        padding: 0px;
        border: none;
        -webkit-border-radius: 0;
	-moz-border-radius: 0;
	border-radius: none;
	text-decoration: none;
	text-shadow: 0;
	min-width: 0;
	-moz-box-shadow: 0;
	-webkit-box-shadow: none;
	box-shadow: 0;
}
.acciones ul li a:hover,
.acciones a:hover {
	background: none;
        padding: 0px;
        border: none;
}

</style>
<div class="clientes view">
<table>
    <thead>
       
                 <th colspan="3" style="background:#cccccc; height: 50px; font-size: 20px;">
         <div align="center"> Cliente</div>
                 </th>
            
         </thead>
    <tr>
        <th  style="background:#ffffff;"><?php echo __('Codigo Cliente: '); echo h($cliente['Cliente']['id']);?></th>
        <th  style="background:#ffffff;"><?php echo __('Fecha Registro: '); echo h($cliente['Cliente']['created']); ?></th>
        <th  style="background:#ffffff;"><?php echo __('Cedula: ');  echo h($cliente['Cliente']['cedula']); ?></th>
    </tr>
    <tr>
        <th style="background:#ffffff;"><?php echo __('Nombre: '); echo h($cliente['Cliente']['nombre']); ?></th>
        <th  style="background:#ffffff;"><?php echo __('Apellido: '); echo h($cliente['Cliente']['apellido']); ?></th>
        <th style="background:#ffffff;"><?php echo __('Apodo: '); echo h($cliente['Cliente']['apodo']); ?></th>
    </tr>
    <tr>
        <th style="background:#ffffff;"><?php echo __('Negocio: '); echo h($cliente['Cliente']['negocio']); ?></th>
        <th style="background:#ffffff;"><?php echo __('Direccion: '); echo h($cliente['Cliente']['direccion']); ?></th>
        <th style="background:#ffffff;"><?php echo __('Telefono fijo: '); echo h($cliente['Cliente']['telefonofijo']); ?></th>
    </tr>
    <tr>
        <th style="background:#ffffff;"><?php echo __('Telefono celular: '); echo h($cliente['Cliente']['telefonocelular']); ?></th>
        <th style="background:#ffffff;"><?php echo __('Email: '); echo h($cliente['Cliente']['email']); ?></th>
        <th style="background:#ffffff;"><?php echo __('Registrado por: '); echo $this->Html->link($cliente['User']['username'], array('controller' => 'users', 'action' => 'view', $cliente['User']['id']));?></th>
    </tr>
</table>
<br>
<div class="box">
  
             <div class="title">        
	<strong style="color:#333; font-size:14px;"><?php echo __('Cheques del Cliente');?></strong>
                       </div>      
    <div class="content pages">
        <div class="row">
	<?php if (!empty($cliente['Cheque'])): ?>
	<table cellpadding = "0" cellspacing = "0">
             <thead>
	<tr>
       
		<th><?php echo __('Banco'); ?></th>	
		<th><?php echo __('Numero de cuenta'); ?></th>
		<th><?php echo __('Numero de cheque'); ?></th>
		<th><?php echo __('Monto'); ?></th>
		<th><?php echo __('Interes'); ?></th>
		
		<th><?php echo __('Fecha recibido'); ?></th>
		<th><?php echo __('Fecha cobro'); ?></th>
		<th><?php echo __('Cobrado'); ?></th>
		<th><?php echo __('Cheque'); ?></th>
		<th><?php echo __('Usuario'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
        </thead>
	<?php 
        #debug($cliente['Cheque']);
        foreach ($cliente['Cheque'] as $cheque):
            ?>
		<tr>
			
			<td><?php echo $cheque['Banco']['nombre']; ?></td>
			<td><?php echo $cheque['numerodecuenta']; ?></td>
			<td><?php 
                        echo $this->Html->link($cheque['numerodecheque'], array('controller' => 'cheques', 'action' => 'view', $cheque['id']));
                         ?></td>
			<td><?php echo $cheque['monto']; ?></td>
			<td><?php echo $cheque['Interese']['rango']; ?></td>
			
			<td><?php 
                        $recibido = new Datetime($cheque['fecharecibido']);
                        $recibido = $recibido->format('d/m/Y');
                        echo $recibido; ?></td>
			<td><?php 
                        $cobro = new Datetime($cheque['fechacobro']);
                        $cobro = $cobro->format('d/m/Y');
                        echo $cobro; ?></td>
			<td><?php 
                        if($cheque['cobrado']==1)
                        echo 'Por Cobrar';
                        else if($cheque['cobrado']==2)
                            echo 'Cobrado';
                        else
                            echo 'Devuelto' ?></td>
			<td><?php echo $cheque['numerodecheque']; ?></td>
			<td><?php echo $cheque['User']['username']; ?></td>
			<td class="acciones">
                            <?php 
                                echo $this->Html->image("ver.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Ver','url' => array('controller'=>'Cheques','action' => 'view', $cheque['id'])));
 ?>
				
				<?php
                                 echo $this->Html->image("editar.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Editar','url' => array('controller'=>'Cheques','action' => 'edit', $cheque['id'])));
                            ?>
				</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
            </div>
           
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nuevo Cheque'), array('controller' => 'cheques', 'action' => 'add',$cliente['Cliente']['id'])); ?> </li>
		</ul>
	
</div>
        </div>
    </div>
<br>
<div class="box">
  
             <div class="title">        
	<strong style="color:#333; font-size:14px;"><?php echo __('Cheques del Cliente');?></strong>
                       </div>      
    <div class="content pages">
        <div class="row">
	<?php if (!empty($cliente['Cuenta'])): ?>
	<table cellpadding = "0" cellspacing = "0">
            <thead>
	<tr>
		
		<th><?php echo __('Numero'); ?></th>
		<th><?php echo __('Banco'); ?></th>
		<th><?php echo __('Usuario'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
        </thead>
	<?php foreach ($cliente['Cuenta'] as $cuenta): ?>
		<tr>
			
			<td><?php echo $cuenta['numero']; ?></td>
			<td><?php echo $cuenta['Banco']['nombre']; ?></td>
			<td><?php echo $cuenta['User']['username']; ?></td>
			<td class="acciones">
                            <?php 
                                echo $this->Html->image("ver.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Ver','url' => array('controller'=>'cuentas','action' => 'view', $cuenta['id'])));
 ?>
				
				<?php
                                 echo $this->Html->image("editar.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Editar','url' => array('controller'=>'cuentas','action' => 'edit', $cuenta['id'])));
                            ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'cuentas', 'action' => 'delete', $cuenta['id']), null, __('Are you sure you want to delete # %s?', $cuenta['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
            </div>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Cuenta'), array('controller' => 'cuentas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
    </div>

<div class="related">
	<h3><?php echo __('Related Pagos'); ?></h3>
	<?php if (!empty($cliente['Pago'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Cliente Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Monto'); ?></th>
		<th><?php echo __('Conceptode'); ?></th>
		<th><?php echo __('Edodeuda'); ?></th>
		<th><?php echo __('Pagointerese Deuda'); ?></th>
		<th><?php echo __('Chequeinterese Id'); ?></th>
		<th><?php echo __('Cheque Id'); ?></th>
		<th><?php echo __('Cheque Estadocheque Id'); ?></th>
		<th><?php echo __('Tipopago Id'); ?></th>
		<th><?php echo __('Pagotercero Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cliente['Pago'] as $pago): ?>
		<tr>
			<td><?php echo $pago['id']; ?></td>
			<td><?php echo $pago['cliente_id']; ?></td>
			<td><?php echo $pago['created']; ?></td>
			<td><?php echo $pago['modified']; ?></td>
			<td><?php echo $pago['monto']; ?></td>
			<td><?php echo $pago['conceptode']; ?></td>
			<td><?php echo $pago['edodeuda']; ?></td>
			<td><?php echo $pago['pagointerese_deuda']; ?></td>
			<td><?php echo $pago['chequeinterese_id']; ?></td>
			<td><?php echo $pago['cheque_id']; ?></td>
			<td><?php echo $pago['cheque_estadocheque_id']; ?></td>
			<td><?php echo $pago['tipopago_id']; ?></td>
			<td><?php echo $pago['pagotercero_id']; ?></td>
			<td><?php echo $pago['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'pagos', 'action' => 'view', $pago['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'pagos', 'action' => 'edit', $pago['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'pagos', 'action' => 'delete', $pago['id']), null, __('Are you sure you want to delete # %s?', $pago['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Pago'), array('controller' => 'pagos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Pagoterceros'); ?></h3>
	<?php if (!empty($cliente['Pagotercero'])): ?>
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
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cliente['Pagotercero'] as $pagotercero): ?>
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
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'pagoterceros', 'action' => 'view', $pagotercero['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'pagoterceros', 'action' => 'edit', $pagotercero['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'pagoterceros', 'action' => 'delete', $pagotercero['id']), null, __('Are you sure you want to delete # %s?', $pagotercero['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Pagotercero'), array('controller' => 'pagoterceros', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
</div>
<br></br>
<div class="actions">
    
	
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cliente'), array('action' => 'edit', $cliente['Cliente']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cliente'), array('action' => 'delete', $cliente['Cliente']['id']), null, __('Are you sure you want to delete # %s?', $cliente['Cliente']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cheque'), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cuentas'), array('controller' => 'cuentas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cuenta'), array('controller' => 'cuentas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pagos'), array('controller' => 'pagos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pago'), array('controller' => 'pagos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pagoterceros'), array('controller' => 'pagoterceros', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pagotercero'), array('controller' => 'pagoterceros', 'action' => 'add')); ?> </li>
	</ul>
</div>


