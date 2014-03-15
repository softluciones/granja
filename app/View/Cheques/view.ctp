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
<div class="cheques view">

	
<table>
    <thead>
       
                 <th colspan="3" style="background:#cccccc; height: 50px; font-size: 20px;">
         <div align="center"> Cheque</div>
                 </th>
            
         </thead>
    <tr style="background:#ffffff;">
        <td><?php 
        $multiplicador=1;
        echo __('Banco: '); /*$monto=($montos+$x);*/ echo $this->Html->link($cheque['Banco']['codigo'].' '.$cheque['Banco']['nombre'], array('controller' => 'bancos', 'action' => 'view', $cheque['Banco']['id'])); ?></td>
        <th style="background:#ffffff;"><?php echo __('Cliente: '); echo $this->Html->link($cheque['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $cheque['Cliente']['id'])); ?></td>
        <th style="background:#ffffff;"><?php echo __('Numero de cuenta: '); echo h($cheque['Cheque']['numerodecuenta']); ?></td>
    </tr>
    <tr style="background:#ffffff;">
        <td><?php echo __('Numero de cheque: '); echo h($cheque['Cheque']['numerodecheque']); ?></td>        
        <td><?php echo __('Monto: '); 
        $monto=$cheque['Cheque']['monto'];
        echo h(number_format(floatval($monto),2,',','.').' Bs.'); ?></td>
         <th style="background:#ffffff;"><?php echo __('Intereses: '); echo $this->Html->link($cheque['Interese']['rango'], array('controller' => 'interese', 'action' => 'view', $cheque['Interese']['id'])); ?></td>
       
    </tr>
    <tr style="background:#ffffff;">
        <th style="background:#ffffff;">    <?php 
        
        $fecha1 = new Datetime($cheque['Cheque']['fecharecibido']);
        $fecha1 = $fecha1->format('d-m-Y');
        echo __('Fecha Recibido: '); 
        echo $fecha1; ?>
        </th>
        <th colspan="2" style="background:#ffffff;"><?php 
        $fecha2 = new Datetime($cheque['Cheque']['fechacobro']);
        $fecha2 = $fecha2->format('d-m-Y');
        echo __('Fecha de Cobro: '); echo $fecha2;
         ?></th>
    </tr>
    <tr style="background:#ffffff;">
        <th colspan="3" style="background:#ffffff;"><div align="center"><?php echo __('Imagen: '); ?><br><?php echo $this->Html->image('uploads/cheque/filename/'.$cheque['Cheque']['filename'],array('width'=>500,'heigth'=>400)); ?></div></th>
    </tr>
    <tr style="background:#ffffff;">
        <td style="background:#ffffff;"><?php 
        $fecha2 = new Datetime($cheque['Cheque']['modified']);
        $fecha2 = $fecha2->format('d-m-Y');
        echo __('Fecha Modificación: '); echo $fecha2;
         ?></td>
        <td style="background:#ffffff;"><?php echo __('Dias: '); echo h($cheque['Cheque']['dias']); ?></td>
        <td style="background:#ffffff;"><?php echo __('Modo cheque: '); if($cheque['Cheque']['cobrado']==1)
                                echo h('Por Cobrar');
                            else
                                if($cheque['Cheque']['cobrado']==2)
                                    echo h('Cobrado');
                                else
                                    echo h('Devuelto'); ?></td>
    </tr>
    <tr style="background:#ffffff;">
        <td style="background:#ffffff;"><?php if($cheque['Cheque']['cheque_id']!=null){ echo __('Cheque a Pagar: '); echo $this->Html->link($cheque['Cheque1']['numerodecheque'], array('controller' => 'cheques', 'action' => 'view', $cheque['Cheque1']['id'])); } ?></td>
        <td style="background:#ffffff;"><?php echo __('Usuario: '); echo $this->Html->link($cheque['User']['username'], array('controller' => 'users', 'action' => 'view', $cheque['User']['id'])); ?></td>
        <th style="background:#ffffff;">
        <?php 
        $posiciones=count($cheque['ChequeEstadocheque']);
           $pos=count($cheque['Chequeinterese']);
        if($cheque['Chequeinterese'][$pos-1]['montocheque']>0){
      # echo $cheque['ChequeEstadocheque'][$posiciones-1]['estadocheque_id'];
            if($cheque['ChequeEstadocheque'][0]['estadocheque_id']==2){
                if($cheque['Cheque']['cobrado']!=0){
                    $pos=count($cheque['Chequeinterese']);
                    $monto=$cheque['Chequeinterese'][$pos-1]['montocheque'];
                        echo "Le Debo: ".h(number_format(floatval($monto),2,',','.').' Bs.');
                    
                }else{
                    $pos=count($cheque['Chequeinterese']);
                    $monto=$cheque['Chequeinterese'][$pos-1]['montocheque'];
                        echo "Me debe: ".h(number_format(floatval($monto),2,',','.').' Bs.');
                }
            }
            if($cheque['ChequeEstadocheque'][0]['estadocheque_id']==1){
                if($cheque['Cheque']['cobrado']==2&& $cheque['Cheque']['deuda']==0){
                    $pos=count($cheque['Chequeinterese']);
                    $monto=$cheque['Chequeinterese'][$pos-1]['montocheque'];
                        echo "Me debe: ".h(number_format(floatval($monto),2,',','.').' Bs.');
                    
                }if($cheque['Cheque']['cobrado']==0){
                    $pos=count($cheque['Chequeinterese']);
                    $monto=$cheque['Chequeinterese'][$pos-1]['montocheque'];
                        echo "Me debe: ".h(number_format(floatval($monto),2,',','.').' Bs.');
                }
            }
        }
        ?></th>
    </tr>
</table>

    
    </br>

  <?php 
  if($cheque['Cheque']['deuda']==0){
  if($cheque['Cheque']['cobrado']==0||($cheque['Cheque']['cobrado']==2&&$cheque['Cheque']['deuda']==0)){ ?>
<div class="box">
  
             <div class="title">        
	<strong style="color:#333; font-size:14px;"><?php echo __('Pagos con Cheque');?></strong>
                       </div>      
    <div class="content pages">
        <div class="row">
<?php if(!empty($relacionados)): ?>
            
	<table cellpadding = "0" cellspacing = "0">
            <thead>
	<tr>
		
		<th><?php echo __('Banco'); ?></th>
		<th><?php echo __('Nro de Cheque'); ?></th>
                <th><?php echo __('Monto de Cheque'); ?></th>
		<th><?php echo __('Días'); ?></th>
		<th><?php echo __('Interes'); ?></th>
                <th><?php echo __('Monto Interes'); ?></th>
		<th><?php echo __('Monto de Cheque a pagar'); ?></th>
                <th><?php echo __('Monto Cancelado'); ?></th>
                <th><?php echo __('Diferencia'); ?></th>
                <th><?php echo __('Cobrado'); ?></th>
                 <th><?php echo __('Edo.'); ?></th>                 
                 <th style="width:7%"><?php echo __('Fecha Recib.'); ?></th>
                 <th style="width:7%"><?php echo __('Fecha Cobro'); ?></th>
                 <th><?php echo __('Usuario'); ?></th>
                 <th class="actions" style="width:7%"><?php echo __('Acciones'); ?></th>
	</tr>
        </thead>
	<?php 
        #debug($relacionados);
        
        foreach ($relacionados as $chequeEstadocheque): ?>
		<tr>
			
			<td><?php echo $chequeEstadocheque['Banco']['nombre']; ?></td>
			<td><?php echo $chequeEstadocheque['Cheque']['numerodecheque']; ?></td>
                        <td><?php echo $chequeEstadocheque['Cheque']['monto']; ?></td>
                        
			<td><?php echo $chequeEstadocheque['Cheque']['dias']; ?></td>
			<td><?php echo $chequeEstadocheque['Interese']['rango']; ?></td>
                        <td><?php 
                        $valor=$chequeEstadocheque['Chequeinterese'][0]['montodescuentointeres'];
                        echo number_format(floatval($valor),2,',','.').' Bs.'; ?></td>
                        <td><?php echo $monto; ?></td>
                        <td><?php echo $chequeEstadocheque['Chequeinterese'][0]['montoentregado']; ?></td>
                        <td><?php echo $monto-$chequeEstadocheque['Chequeinterese'][0]['montoentregado']; ?></td>
                        <td><?php 
                        if($chequeEstadocheque['Cheque']['cobrado']==0){
                            
                            echo "Devuelto";
                        }
                        if($chequeEstadocheque['Cheque']['cobrado']==1){
                            echo "Por Cobrar";
                        }
                        if($chequeEstadocheque['Cheque']['cobrado']==2){
                            echo "Cobrado";
                        }
                        ?></td>
                        <td><?php $estado=count($chequeEstadocheque['ChequeEstadocheque']);
                            if($estado>0){
                                echo $chequeEstadocheque['ChequeEstadocheque'][$estado-1]['Estadocheque']['nomenclatura'];
                            }
                        ?></td>
                        <td><?php 
                        $cobro = new Datetime($chequeEstadocheque['Cheque']['fechacobro']);
                        $cobro = $cobro->format('d-m-Y');
                        echo $cobro; ?></td>
                        <td><?php 
                        $cobro = new Datetime($chequeEstadocheque['Cheque']['fecharecibido']);
                        $cobro = $cobro->format('d-m-Y');
                        echo $cobro; ?></td>
                        
			<td><?php echo $chequeEstadocheque['User']['username']; ?></td>
			<td class="acciones">
                            <?php 
                                echo $this->Html->image("ver.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Ver','url' => array('controller'=>'Cheques','action' => 'view', $chequeEstadocheque['Cheque']['id'])));
 ?>
				
				<?php
                                 echo $this->Html->image("editar.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Editar','url' => array('controller'=>'Cheques','action' => 'edit', $chequeEstadocheque['Cheque']['id'])));
                            ?>
				<?php
                                $imagen= $this->Html->image("borrargrande.fw.png", array("alt" => "borrar",'width' => '18', 'heigth' =>'18','title'=>'Borrar'));
                                                 echo $this->Html->link($imagen, array('action' => 'delete', $chequeEstadocheque['Cheque']['id']), array('escape'=>false), sprintf(__('Seguro que quiere eliminar el registro?', $chequeEstadocheque['Cheque']['id'])));
                         ?>
				
				</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
        <?php if($cheque['Cheque']['deuda']==0){?>
	<div class="actions">
		<ul>
			<li  align="center">
                        <?php 
                        
                        echo $this->Html->link(__('Nuevo Cheque'), array('action' => 'add2',$cheque['Cheque']['id']));
                        ?> 
                        </li>
		</ul>
	</div>
                <?php }?>
         </div>    
    
</div>
     </br> 	
<?php } }?> 

<div class="box">
    
        
	
      <div class="title">        
	<strong style="color:#333; font-size:14px;"><?php echo __('Estados del Cheque');?></strong>
                       </div>      
    <div class="content pages">
        <div class="row" >
     
  

      
	<?php if (!empty($cheque['ChequeEstadocheque'])): ?>
         
            <table cellpadding = "0" cellspacing = "0" align="center" style="width: 100%;">
            <thead>
	<tr>
		<th><?php echo __('Edo.'); ?></th>
                <th><?php echo __('Nomenclatura'); ?></th>
		<th><?php echo __('Fecha'); ?></th>	
		<th><?php echo __('Usuario'); ?></th>
                <?php if($cheque['Cheque']['cobrado']==1){ ?>
		<th class="acciones"><?php echo __('Acciones'); ?></th>
                 <?php } ?>
	</tr>
        </thead>
	<?php
        #debug($cheque['ChequeEstadocheque'] );
        foreach ($cheque['ChequeEstadocheque'] as $chequeEstadocheque): ?>
		<tr>
			<td><?php echo $chequeEstadocheque['Estadocheque']['nombre']; ?></td>
			<td><?php echo $chequeEstadocheque['Estadocheque']['nomenclatura']; ?></td>
			<td><?php
                        $fecha1 = new Datetime($chequeEstadocheque['created']);
                        $fecha1 = $fecha1->format('d-m-Y');
                        echo $fecha1; ?></td>
		
			<td><?php echo $chequeEstadocheque['User']['username']; ?></td>
			
                            <?php 
                                
 ?>
				
				<?php
                                if($cheque['Cheque']['cobrado']==1){
                                    ?>
                        <td class="acciones">
                            <?php
                                 echo $this->Html->image("editar.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Editar','url' => array('controller' => 'ChequeEstadocheques','action' => 'edit/'.$chequeEstadocheque['id'], $cheque['Cheque']['id'])));
                          ?>
                            </td>
                            <?php
                                }
                            ?>
				
			
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</br>

</div>
      
	

</div>
</div>
</br>
<div class="box">
    <div class="title">        
	<strong style="color:#333; font-size:14px;"><?php echo __('Intereses del Cheque');?></strong>
     </div>
    <div class="content pages">
        <div class="row">
	<?php if (!empty($cheque['Chequeinterese'])): ?>
	<table cellpadding = "0">
            <thead>
	<tr>
		<th><div align="center"><?php echo __('Interes'); ?></div></th>
                <th><div align="center"><?php echo __('Fecha'); ?></div></th>
		<th><div align="center"><?php echo __('Monto Deuda'); ?></div></th>
		<th><div align="center"><?php echo __('Monto Interes'); ?></div></th>
		<th><div align="center"><?php echo __('Monto Entregado'); ?></div></th>
                <th><div align="center"><?php echo __('Cobrado'); ?></div></th>
		<th><div align="center"><?php echo __('Usuario'); ?></div></th>
	</tr>
        </thead>
        
	<?php
        #debug($cheque['Chequeinterese']);
        foreach ($cheque['Chequeinterese'] as $chequeinterese): ?>
		<tr>
			<td><?php echo $chequeinterese['Cheque']['Interese']['rango']; ?></td>
                        <td><?php 
                        $fecha1 = new Datetime($chequeinterese['modificado']);
                        $fecha1 = $fecha1->format('d-m-Y');
                        echo $fecha1; ?></td>
                        <td> <div align="right"><?php 
                        
                        echo number_format(floatval($chequeinterese['montocheque']),2,',','.').' Bs.'; ?></div></td>
			<td><div align="right"><?php echo number_format(floatval($chequeinterese['montodescuentointeres']),2,',','.').' Bs.'; ?></div></td>
			<td><div align="right"><?php echo number_format(floatval($chequeinterese['montoentregado']),2,',','.').' Bs.';?></div></td>
                                    
                        <td><div align="center"><?php 
                        if($chequeinterese['estadocheque']==1)
                            echo "Por cobrar";
                        else
                            if($chequeinterese['estadocheque']==0)
                                echo "Devuelto";
                            else
                                echo 'Cobrado';
                        ?></div></td>
			
			
			<td><?php echo $chequeinterese['User']['username']; ?></td>
			
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</br>
</div>
	
</div>
   
</div>
</br>


</br>

<div class="box">
    <div class="title">        
	<strong style="color:#333; font-size:14px;"><?php echo __('Pagos');?></strong>
     </div>
    <div class="content pages">
        <div class="row">
	<?php if (!empty($cheque['Pago'])): ?>
	<table cellpadding = "0" cellspacing = "0">
            <thead>
	<tr>
		
		<th><?php echo __('Cliente'); ?></th>
		<th><?php echo __('Monto'); ?></th>
		<th><?php echo __('Concepto de'); ?></th>
		<th><?php echo __('Tipo de Pago'); ?></th>
                <th><?php echo __('Usuario'); ?></th>
	</tr>
        </thead>
	<?php foreach ($cheque['Pago'] as $pago): 
            #debug($pago);?>
		<tr>
		
			<td><?php echo $pago['Cliente']['apodo']; ?></td>
			<td><div align="right"><?php echo  number_format(floatval($pago['monto']),2,',','.').' Bs.'; ?></div></td>
			<td><?php echo $pago['conceptode']; ?></td>
			
			<td><?php echo $pago['Tipopago']['nombre']; ?></td>
		
			
			<td><?php echo $pago['User']['username']; ?></td>
			
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</br>
	<div class="actions">
		<ul>
			<li  align="center">

            <?php  
            if($cheque['Cheque']['deuda']==0){
            $estado = $cheque['ChequeEstadocheque'][$posiciones-1]['estadocheque_id'];
            if($estado==2|| $estado==3){
                if($cheque['Cheque']['cobrado']==2 && $cheque['Cheque']['deuda']==0){
                    $pos=count($cheque['Chequeinterese']);
                    $monto=$cheque['Chequeinterese'][$pos-1]['montocheque'];
                     echo $this->Html->link(__('Nuevo Pago'), array('controller' => 'pagos', 'action' => 'add/'.$cheque['Cheque']['id'].'/1/1/'.$cheque['Cliente']['id'],$montos));
                    
                }if($cheque['Cheque']['cobrado']==0){
                    $pos=count($cheque['Chequeinterese']);
                    $monto=$cheque['Chequeinterese'][$pos-1]['montocheque'];
                        echo $this->Html->link(__('Nuevo Pago'), array('controller' => 'pagos', 'action' => 'add/'.$cheque['Cheque']['id'].'/1/0/'.$cheque['Cliente']['id'],$monto));
                }
            }
            if($estado==1 || $estado==4){
                if($cheque['Cheque']['cobrado']==2&& $cheque['Cheque']['deuda']==0){
                    $pos=count($cheque['Chequeinterese']);
                    $monto=$cheque['Chequeinterese'][$pos-1]['montocheque'];
                        echo $this->Html->link(__('Nuevo Pago'), array('controller' => 'pagos', 'action' => 'add/'.$cheque['Cheque']['id'].'/1/0/'.$cheque['Cliente']['id'],$monto));
                    
                }if($cheque['Cheque']['cobrado']==0){
                    $pos=count($cheque['Chequeinterese']);
                    $monto=$cheque['Chequeinterese'][$pos-1]['montocheque'];
                        echo $this->Html->link(__('Nuevo Pago'), array('controller' => 'pagos', 'action' => 'add/'.$cheque['Cheque']['id'].'/1/0/'.$cheque['Cliente']['id'],$monto));
                }
            }
            }
            
            
        ?> </li>
		</ul>
	</div>
</div>
        </div>
    </div>

</br>

<div class="box">
    <div class="title">        
	<strong style="color:#333; font-size:14px;"><?php echo __('Gesti&oacuten de Cobranzas');?></strong>
     </div>
    <div class="content pages">
        <div class="row">
	
	<?php if (!empty($cheque['Gestiondecobranza'])): ?>
	<table cellpadding = "0" cellspacing = "0">
            <thead>
	<tr>
		
		<th><?php echo __('Fecha'); ?></th>
		<th><?php echo __('Descripción'); ?></th>
		<th><?php echo __('Usuario'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
        </thead>
	<?php foreach ($cheque['Gestiondecobranza'] as $gestiondecobranza): ?>
		<tr>
			
			<td><?php 
                        $fecha = new Datetime($gestiondecobranza['created']);
                        $fecha = $fecha->format('d-m-Y');
                        echo $fecha; ?></td>
			<td><?php echo $gestiondecobranza['descripcion']; ?></td>
			<td><?php echo $gestiondecobranza['User']['username']; ?></td>
			<td class="acciones">
                            <?php echo $this->Html->image("ver.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Ver','url' => array('controller' => 'gestiondecobranzas','action' => 'view', $gestiondecobranza['id'])));?>
                            <?php echo $this->Html->image("editar.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Editar','url' => array('controller' => 'gestiondecobranzas','action' => 'edit', $gestiondecobranza['id']))); ?>
                            <?php $imagen= $this->Html->image("borrargrande.fw.png", array("alt" => "borrar",'width' => '18', 'heigth' =>'18','title'=>'Borrar'));
											echo $this->Html->link($imagen, array('controller' => 'gestiondecobranzas','action' => 'delete', $cheque['Cheque']['id']), array('escape'=>false), sprintf(__('Seguro que quiere eliminar el registro?', $cheque['Cheque']['id'])));?>
				</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</br>
	<div class="actions">
		<ul>
			<li align="center"><?php echo $this->Html->link(__('Nueva Cobranza'), array('controller' => 'gestiondecobranzas', 'action' => 'add',$cheque['Cheque']['id'])); ?> </li>
		</ul>
	</div>
</div>
</div>
</div></br>

<div class="box">
    <div class="title">        
	<strong style="color:#333; font-size:14px;"><?php echo __('Pagos a Tercero');?></strong>
     </div>
    <div class="content pages">
        <div class="row">
	<?php if (!empty($cheque['Pagotercero'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Fecha creación'); ?></th>
		<th><?php echo __('Dia'); ?></th>
		<th><?php echo __('Monto'); ?></th>
		<th><?php echo __('Conceptode'); ?></th>
		<th><?php echo __('Origen'); ?></th>
		<th><?php echo __('Destino'); ?></th>
		<th><?php echo __('Cheque Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($cheque['Pagotercero'] as $pagotercero): ?>
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
			<td class="acciones">
				<?php echo $this->Html->link(__('View'), array('controller' => 'pagoterceros', 'action' => 'view', $pagotercero['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'pagoterceros', 'action' => 'edit', $pagotercero['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'pagoterceros', 'action' => 'delete', $pagotercero['id']), null, __('Are you sure you want to delete # %s?', $pagotercero['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</br>
	<div class="actions">
		<ul>
			<li  align="center"><?php echo $this->Html->link(__('Pago a terceros'), array('controller' => 'pagoterceros', 'action' => 'add/'.$cheque['Cheque']['id'],$cheque['Cliente']['id'])); ?> </li>
		</ul>
	</div>
</div>
        </div>
    </div>
</div>
</br>
<div class="actions" >
	
	<ul>
		<li align="center"><?php  if($cheque['Cheque']['cobrado']==1 )
                            echo $this->Html->link(__('Editar Cheque'), array('action' => 'edit', $cheque['Cheque']['id'])); ?> </li>
                <li align="center"><?php  if(($cheque['Cheque']['cobrado']==0 || $cheque['Cheque']['cobrado']==1)&& $cheque['Cheque']['deuda']==0)
                            echo $this->Html->link(__('Cobrado'), array('action' => 'editadevuelto/'. $cheque['Cheque']['id'],2)); ?> </li>
                <li align="center"><?php  if($cheque['Cheque']['cobrado']==1)
                            echo $this->Html->link(__('Devuelto'), array('action' => 'editadevuelto/'. $cheque['Cheque']['id'],0)); ?> </li>
		<li align="center"><?php echo $this->Form->postLink(__('Borrar Cheque'), array('action' => 'delete', $cheque['Cheque']['id']), null, __('Esta seguro que desea Borrar este registro # %s?', $cheque['Cheque']['id'])); ?> </li>
		<li align="center"><?php echo $this->Html->link(__('Lista Cheques'), array('action' => 'index')); ?> </li>
		<li align="center"><?php echo $this->Html->link(__('Nuevo Cheque'), array('action' => 'add')); ?> </li>
		<li align="center"><?php echo $this->Html->link(__('Lista Bancos'), array('controller' => 'bancos', 'action' => 'index')); ?> </li>
		<li align="center"><?php echo $this->Html->link(__('Nuevo Banco'), array('controller' => 'bancos', 'action' => 'add')); ?> </li>
		<li align="center"><?php echo $this->Html->link(__('Lista Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li align="center"><?php echo $this->Html->link(__('Nuevo Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li align="center"><?php echo $this->Html->link(__('Nuevo Interes'), array('controller' => 'chequeinterese', 'action' => 'add')); ?> </li>
	</ul>
</div>

