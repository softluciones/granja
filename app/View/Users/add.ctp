<?php date_default_timezone_set("America/Caracas")?>
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
  </style>
<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<table>
                    <thead>
       
                 <th colspan="3" style="background:#cccccc; height: 50px; font-size: 20px;">
         <div align="center">Agregar Usuario</div>
                 </th>
            
         </thead>
	<?php
        echo '<tr>';
		echo '<th>'; echo $this->Form->input('username',array('label'=>'Nombre de Usuario')); echo '</th>';
		echo '<th>'; echo $this->Form->input('password',array('label'=>'Contraseña')); echo '</th>';
                echo '<th>'; echo $this->Form->input('clave',array('label'=>'Vuelva a ingresar Contraseña','type'=>'password')); echo '</th>';
        echo '</tr>';
		
        echo '<tr>';
		echo '<th>'; echo $this->Form->input('nombre',array('label'=>'Nombre del empleado')); echo '</th>';
		echo '<th>'; echo $this->Form->input('apellido',array('label'=>'Apellido del empleado')); echo '</th>';
                echo '<th>'; echo $this->Form->input('role_id',array('label'=>'Rol del Usuario')); echo '</th>';
                echo '</tr>';
         echo '<tr>';
                echo '<th colspan="3">';  echo $this->Form->end(__('Registrar'));  echo '</th>';
         echo '</tr>';
	?>
	</table>

</div>
  <br></br>
<div class="actions">
	
	<ul>

		<li  class="menu"><?php echo $this->Html->link(__('Lista Usuario'), array('action' => 'index')); ?></li>
		<li class="menu"><?php echo $this->Html->link(__('Lista Roles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Nuevo Rol'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
                <li class="menu"><?php echo $this->Html->link(__('Lista Tipo pagos'), array('controller' => 'tipopagos', 'action' => 'index')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Nuevo Tipo pago'), array('controller' => 'tipopagos', 'action' => 'add')); ?> </li>
                
	</ul>
</div>
