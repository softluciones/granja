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
<div class="estadocheques form">
<?php echo $this->Form->create('Estadocheque'); ?>
	<table>
                <thead>
		<th colspan="2" style="background:#cccccc; height: 50px; font-size: 20px;"><div align="center"><?php echo __('Editar Estado Cheque'); ?></div></th>
                
                </thead>
	<?php
		echo $this->Form->input('id',array('type'=>'hidden'));
                echo '<tr>';
                 echo '<th colspan="2">';
		echo $this->Form->input('nombre');
                echo '</th>';
                  
                echo '</tr>'; 
                echo '<tr>'; 
                echo '<th colspan="2">';
		echo $this->Form->input('nomenclatura',array('readonly'=>'readonly'));
                 echo '</th>';
                  
                echo '</tr>'; 
                echo '<tr>'; 
                echo '<th colspan="2">';
		echo $this->Form->input('descripcion',array('label'=>'Descripción'));
                 echo '</th>';
                  
                echo '</tr>'; 
                echo '<tr>'; 
                
                 echo '<th colspan="2">';
                echo $this->Form->end(__('Guardar'));
                echo '</th>';
                echo '</tr>'; 
	?>

</table>
</div>
  <br></br>
<div class="actions">

	<ul>

            <li class="menu"><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('Estadocheque.id')), null, __('Está seguro de eliminar el estado del cheque  %s?', $this->Form->value('Estadocheque.nombre'))); ?></li>
            <li><?php echo $this->Html->link(__('Lista Estado de cheque'), array('action' => 'index')); ?></li>
		</ul>
</div>
