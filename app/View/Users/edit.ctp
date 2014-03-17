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
		<th colspan="2" style="background:#cccccc; height: 50px; font-size: 20px;"><div align="center"><?php echo __('Editar Usuario'); ?></div></th>
                
                </thead>
                <tr>
	<?php
		echo '<th>';
		echo $this->Form->input('username',array('label'=> 'Nombre de usuario'));
                echo '</th>';
                echo '<th>';
		echo $this->Form->input('role_id',array('label'=>'Rol del usuario'));
                echo '</th>';
               
                 echo '<tr>';
                echo '<th>';
		echo $this->Form->input('nombre',array('label'=>'Nombre Empleado'));
                echo '</th>';
                echo '<th>';
		echo $this->Form->input('apellido',array('label'=>'Apellido Empleado'));
                echo '</th>';
                 echo '</tr>';
                  echo '<tr>';
                  echo '<th colspan="2">';
                echo $this->Form->end(__('Registrar'));
                 echo '</th>';
	?>
                </tr>
	</table>
<?php  ?>
</div>
 <br></br>
<div class="actions">
	
	<ul>

            <li class="menu"><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
            <li class="menu"><?php echo $this->Html->link(__('Lista Usuario'), array('action' => 'index')); ?></li>
        </ul>
</div>
