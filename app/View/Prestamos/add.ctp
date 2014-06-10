 <style>
      th{
          background: #ffffff;
      }
      tbody tr:hover th{
          background: #ffffff;
      }
      li.menu{
          text-align: center;
      }
      #cliente{
          cursor:pointer;
      }
       #binteres{
          cursor:pointer;
      }
      
       #guardarinteres{
          cursor:pointer;
      }
       #guardare{
          cursor:pointer;
      }
  </style>
<div class="prestamos form">
<?php echo $this->Form->create('Prestamo'); ?>
	<fieldset>
		<legend><?php #echo __('Add Prestamo'); ?></legend>
	<table>
	                    <thead>
       
                 <th colspan="4" style="background:#cccccc; height: 50px; font-size: 20px;">
         <div align="center" style="color:#fff;"> Agregar prestamo </div>
          </th>	
            
         </thead>
	<tr>
		<td><?php echo $this->Form->input('cliente_id'); ?></td>
		<td><?php echo $this->Form->input('monto',array('label'=>'Monto')); ?></td>
		<td><?php echo $this->Form->input('fechainicio',array('label'=>'Fecha Inicio')); ?></td>
		<td><?php echo $this->Form->input('fechafin',array('label'=>'Fecha Fin'));		?></td>
	</tr>
	<tr>
		<td><?php echo $this->Form->input('montodeuda',array('label'=>'Monto Deuda','type'=>'hidden')); ?></td>
		<td><?php echo $this->Form->input('interesprestamo_id',array('label'=>'Interes')); ?></td>
		<td><?php echo $this->Form->input('prestamo_id',array('label'=>'Codigo del prestamo'));?></td>
		<td><?php echo $this->Form->input('aprobarprestamo',array('label'=>'Aprobar Prestamo')); ?></td>
	</tr>
	<tr>
		<td><?php echo $this->Form->input('user_id',array('label'=>'USUARIO')); ?></td>
		<td><?php echo $this->Form->end(__('Guardar')); ?></td>
		<td></td>
		<td></td>
	</tr>
	</table>
	<?php
			
	?>
	</fieldset>

</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Prestamos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Agregar Interes'), array('controller' => 'interesprestamos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Prestamos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Prestamo'), array('controller' => 'prestamos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cuotas'), array('controller' => 'cuotas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cuota'), array('controller' => 'cuotas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Garantias'), array('controller' => 'garantias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Garantia'), array('controller' => 'garantias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gestiondecobranzaprestamos'), array('controller' => 'gestiondecobranzaprestamos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gestiondecobranzaprestamo'), array('controller' => 'gestiondecobranzaprestamos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transaccionprestamointeres'), array('controller' => 'transaccionprestamointeres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaccionprestamointere'), array('controller' => 'transaccionprestamointeres', 'action' => 'add')); ?> </li>
	</ul>
</div>
