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
<div class="interese form">
<?php echo $this->Form->create('Interese'); ?>
	<table>
                <thead>
		<th colspan="3" style="background:#cccccc; height: 50px; font-size: 20px;"><div align="center"><?php echo __('Editar Interes'); ?></div></th>
                
                </thead>
	<?php
        echo '<tr>'; 
                
                echo $this->Form->input('id',array('type'=>'hidden')); 
                echo '<th>';
		echo $this->Form->input('minimo');
                 echo '</th>';
                   echo '<th>';
		echo $this->Form->input('maximo');
                 echo '</th>';
                 echo '<th>';
		echo $this->Form->input('montofijo',array('label'=>'Monto Fijo'));
                 echo '</th>';
                echo '</tr>'; 
	echo '<tr>'; 
                
               
                echo '<th>';
		echo $this->Form->input('porcentaje');
                 echo '</th>';
                  echo '<th>';
		
                 echo '</th>';
               echo '<th>';
                 echo '</th>';
                echo '</tr>'; 
		
	echo '<tr>'; 
                
               
                   echo '<th colspan="3">';
		echo $this->Form->end(__('Guardar'));
                 echo '</th>';
              
                echo '</tr>'; 	
		
		
	?>
	</table>
<?php  ?>
</div>
    <br></br>
<div class="actions">
	
	<ul>

            <li class="menu"><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('Interese.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Interese.id'))); ?></li>
		<li class="menu"><?php echo $this->Html->link(__('Listar Interes'), array('action' => 'index')); ?></li>
		</ul>
</div>
