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
li.menu{
          text-align: center;
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
		<th><?php echo __('Monto Original'); ?></th>
                <th><?php echo __('Monto Deuda'); ?></th>                
		<th><?php echo __('Interes'); ?></th>
                <th><?php echo __('Monto Interes'); ?></th>
		<th><?php echo __('Monto Entregado'); ?></th>
		<th><?php echo __('Fecha recibido'); ?></th>
		<th><?php echo __('Fecha cobro'); ?></th>
		<th><?php echo __('Cobrado'); ?></th>
                <th><?php echo __('Estado'); ?></th>
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
			<td><div style="float: right"><?php $pos = count($cheque['Chequeinterese']);
                        echo h(number_format(floatval($cheque['monto']),2,',','.')); ?></td>
                        <td><div style="float: right"><?php
                      
                        echo h(number_format(floatval($cheque['Chequeinterese'][$pos-1]['montocheque']),2,',','.')); ?></div></td>
			<td><?php echo $cheque['Interese']['rango']; ?></td>
			<td><div style="float: right"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$pos-1]['montodescuentointeres']),2,',','.')); ?></div></td>
                        <td><div style="float: right"><?php
                      
                        echo h(number_format(floatval($cheque['Chequeinterese'][$pos-1]['montoentregado']),2,',','.')); ?></div></td>
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
                        <td><div style="float: right"><?php
                      $pose = count($cheque['ChequeEstadocheque']);
                      if($cheque['ChequeEstadocheque'][$pose-1]['estadocheque_id']==1)
                          $estado='R';
                      if($cheque['ChequeEstadocheque'][$pose-1]['estadocheque_id']==2)
                          $estado='C';
                      if($cheque['ChequeEstadocheque'][$pose-1]['estadocheque_id']==3)
                          $estado='AbnGC';
                      if($cheque['ChequeEstadocheque'][$pose-1]['estadocheque_id']==4)
                          $estado='AbnCG';
                          
                        echo $estado; ?></div></td>
			
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
	<strong style="color:#333; font-size:14px;"><?php echo __('Cuentas del Cliente');?></strong>
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
                            </td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
            </div>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nueva Cuenta'), array('controller' => 'cuentas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
    </div>

 </div>

<br></br>
<div class="actions">
    
	
	<ul>
            <li class="menu"><?php echo $this->Html->link(__('Editar Cliente'), array('action' => 'edit', $cliente['Cliente']['id'])); ?> </li>
		<li class="menu"><?php echo $this->Form->postLink(__('Borrar Cliente'), array('action' => 'delete', $cliente['Cliente']['id']), null, __('Are you sure you want to delete # %s?', $cliente['Cliente']['id'])); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Listar Clientes'), array('action' => 'index')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Nuevo Cliente'), array('action' => 'add')); ?> </li>
	</ul>
</div>


