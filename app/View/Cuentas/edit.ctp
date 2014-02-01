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
<div class="cuentas form">
<?php echo $this->Form->create('Cuenta'); ?>
	<table>
                <thead>
		<th colspan="3" style="background:#cccccc; height: 50px; font-size: 20px;"><div align="center"><?php echo __('Editar Cliente'); ?></div></th>
                
                </thead>
		
	<?php
		echo '<tr>'; 
                
                echo $this->Form->input('id',array('type'=>'hidden')); 
                echo '<th colspan="3">';
		echo $this->Form->input('numero');
                 echo '</th>';
                  
                echo '</tr>'; 
                echo '<tr>'; 
                echo '<th>';
		echo $this->Form->input('banco_id');
                 echo '</th>';
                echo '<th>';
		echo $this->Form->input('cliente_id');
                echo '</th>';
                echo '<th>';
		echo $this->Form->input('user_id');
                echo '</th>';
                echo '</tr>'; 
                 echo '</tr>'; 
                
                echo '<th colspan="3">';
                echo $this->Form->end(__('Guardar'));
                echo '</th>';
                  echo '</tr>'; 
	?>
	

        </table>
</div>
  <br></br>
<div class="actions">
	
	<ul>

            <li class="menu"><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('Cuenta.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Cuenta.id'))); ?></li>
		<li class="menu"><?php echo $this->Html->link(__('Listar Cuentas'), array('action' => 'index')); ?></li>
		<li class="menu"><?php echo $this->Html->link(__('Listar Bancos'), array('controller' => 'bancos', 'action' => 'index')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Nuevo Banco'), array('controller' => 'bancos', 'action' => 'add')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Listar Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Nuevo Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		</ul>
</div>
