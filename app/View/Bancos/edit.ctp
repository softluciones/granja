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

<div class="bancos form">
<?php echo $this->Form->create('Banco'); ?>
	 <table>
             <thead>
		<th colspan="2" style="background:#cccccc; height: 50px; font-size: 20px;"><div align="center"><?php echo __('Editar Banco'); ?></div></th>
                
                </thead>
                <tr>
	<?php
                
        echo '<th>';
            echo $this->Form->input('codigo',array('label'=>'Codigo del Banco')); echo '</th>';
		echo '<th>'; echo $this->Form->input('nombre'); echo '</th>';
                echo '</tr>';
        echo '<tr>';
	echo '<th colspan="2">'; echo $this->Form->input('descripcion',array('label'=>'Descripción')); echo '</th>';
        echo '</tr>';
        echo '<tr>';
	echo '<th>'; echo $this->Form->input('user_id',array('Registrado por el usuario')); echo '</th>';
        echo '<th>'; echo $this->Form->end(__('Modificar')); echo '</th>';
        
	?>
                    
                </tr>
	</table>

</div>
  </br>
<div class="actions">
	
	<ul>

		<li class="menu"><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('Banco.id')), null, __('Estas seguro de borrar el codigo  # %s?', $this->Form->value('Banco.codigo'))); ?></li>
		<li class="menu"><?php echo $this->Html->link(__('Lista Bancos'), array('action' => 'index')); ?></li>
		<li class="menu"><?php echo $this->Html->link(__('Lista Usuarios'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Lista Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Nuevo Cheque'), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Lista Cuentas'), array('controller' => 'cuentas', 'action' => 'index')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Nueva Cuenta'), array('controller' => 'cuentas', 'action' => 'add')); ?> </li>
	</ul>
</div>
