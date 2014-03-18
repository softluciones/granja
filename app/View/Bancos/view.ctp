<div class="view">
    <table>
    <thead>
       
                 <th colspan="4" style="background:#cccccc; height: 50px; font-size: 20px;">
         <div align="center">Descripción del Banco</div>
                 </th>
            
         </thead>
    <tr style="background:#ffffff;">
        <td><?php echo __('Banco: '); echo $this->Html->link($banco['Banco']['codigo'], array('controller' => 'bancos', 'action' => 'view', $banco['Banco']['id'])); ?></td>
        <td style="background:#ffffff;"><?php echo __('Nombre: '); echo h($banco['Banco']['nombre']); ?></td>
            <td style="background:#ffffff;"><?php echo __('Descripción: '); echo h($banco['Banco']['descripcion']); ?></td>
                <td style="background:#ffffff;"><?php echo __('Usuario: '); echo $this->Html->link($banco['User']['username'], array('controller' => 'users', 'action' => 'view', $banco['User']['id'])); ?></td> 
    </tr>
    
    
    
    
   
</table>
<div class="box">
  
             <div class="title">        
	<strong style="color:#333; font-size:14px;"><?php echo __('Cheques Relacionados a Este Banco');?></strong>
                       </div>      
    <div class="content pages">
        <div class="row">
	<?php if (!empty($banco['Cheque'])): ?>
            
	<table cellpadding = "0">
            <thead>
	<tr>
		
		<th><?php echo __('Cliente'); ?></th>
		
		<th><?php echo __('Numero de cheque'); ?></th>
		<th><?php echo __('Monto'); ?></th>
		
		<th><?php echo __('Fecha recibido'); ?></th>
		<th><?php echo __('Fecha cobro'); ?></th>
		<th><?php echo __('Estado'); ?></th>
		<th><?php echo __('Cheque con deuda'); ?></th>
                <th><?php echo __('Registrado por'); ?></th>
		
		
	</tr>
        </thead>
	<?php foreach ($banco['Cheque'] as $cheque): ?>
		<tr>
			
			<td><?php
                            #debug($cheque);
                        echo $cheque['Cliente']['nombre']; ?></td>
			
			<td><?php echo $this->Html->link(__($cheque['numerodecheque']), array('controller' => 'cheques', 'action' => 'view', $cheque['id']));
                                     ?></td>
			<td><?php echo $cheque['monto']; ?></td>
			<td><?php 
                        $recibido = new Datetime($cheque['fecharecibido']);
                        $recibido = $recibido->format('d-m-Y');
                        echo $recibido; ?></td>
			<td><?php 
                        $cobro = new Datetime($cheque['fechacobro']);
                        $cobro = $cobro->format('d-m-Y');
                        echo $cobro; ?></td>
			<td><?php 
                        if($cheque['cobrado']==2)    
                        echo 'Cobrado';
                        else
                            if($cheque['cobrado']==1)
                                echo 'Por Cobrar';
                            else
                                echo 'Devuelto';
                               
                                ?></td>
                        
                        <td>
                            <?php if($cheque['Cheque1']){ 
                        
                        echo $this->Html->link(__($cheque['Cheque1']['numerodecheque']), array('controller' => 'cheques', 'action' => 'view', $cheque['Cheque1']['id']));
                                      }?>
                        </td>
                         
                        <td><?php echo $cheque['User']['username']; ?></td>
			
			
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
  </div>  
          </div>  
    
	
</div>
<div class="box">
  
             <div class="title">        
	<strong style="color:#333; font-size:14px;"><?php echo __('Cuentas Relacionadas a Este Banco');?></strong>
                       </div>      
    <div class="content pages">
        <div class="row">
	<?php if (!empty($banco['Cuenta'])): ?>
	<table cellpadding = "0" cellspacing = "0">
            <thead>
	<tr>
		
		<th><?php echo __('Numero'); ?></th>
		<th><?php echo __('Cliente'); ?></th>
		<th><?php echo __('User'); ?></th>
	
	</tr>
        </thead>
	<?php foreach ($banco['Cuenta'] as $cuenta): 
            #debug($cuenta);
            ?>
		<tr>
			<td><?php echo $this->Html->link(__($cuenta['numero']), array('controller' => 'cuentas', 'action' => 'view', $cuenta['id']));
                                    #echo $cheque['numerodecheque']; ?></td>
			
			<td><?php echo $cuenta['Cliente']['apodo']; ?></td>
			<td><?php echo $cuenta['User']['username']; ?></td>
			
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
        </div>
	
</div>

</div>
<br></br>
<div class="actions">
	<ul>
		<li  align="center"><?php echo $this->Html->link(__('Editar Banco'), array('action' => 'edit', $banco['Banco']['id'])); ?> </li>
		<li  align="center"><?php echo $this->Form->postLink(__('Borrar Banco'), array('action' => 'delete', $banco['Banco']['id']), null, __('Está seguro de borrar el codigo # %s: %s?', $banco['Banco']['codigo'], $banco['Banco']['nombre'])); ?> </li>
		<li align="center"><?php echo $this->Html->link(__('Lista Bancos'), array('action' => 'index')); ?> </li>
		<li align="center"><?php echo $this->Html->link(__('Nuevo Banco'), array('action' => 'add')); ?> </li>
		<li align="center"><?php echo $this->Html->link(__('Lista Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		
	</ul>
</div>
