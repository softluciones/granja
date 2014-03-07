
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
<div class="gestiondecobranzas form">
<?php echo $this->Form->create('Gestiondecobranza'); ?>
	<table>
            <thead>
            <th colspan="2" style="background:#cccccc; height: 50px; font-size: 20px;"><div align="center"><?php echo __('Agregar Gestión de Cobranza'); ?></div></th>
            </thead>
	<?php
        echo '<tr>';
		echo '<th colspan="2">'; echo $this->Form->input('descripcion'); echo '</th>';
        
		
        echo '</tr>';
         
          echo '<tr>';
          
          echo '<th>'; echo $this->Form->input('cheque_id'); echo '</th>';
         echo '<th>'; echo $this->Form->input('user_id',array('label'=>'Registrado por')); echo '</th>';
        
         echo '</tr>';
		
          echo '<tr>';
           echo '<th>'; echo $this->Form->end(__('Registrar')); echo '</th>';
            echo '<th>';  echo '</th>';
	echo '</tr>';	
	?>
	</table>

</div>
<br></br>
<div class="actions">
	
	<ul>

		
		<li><?php echo $this->Html->link(__('Listar Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cheque'), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
		</ul>
</div>
