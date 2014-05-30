<?php date_default_timezone_set("America/Caracas") ?>
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

<div class="pagos form">
<?php echo $this->Form->create('Pago'); ?>
	<table>
            <thead>
            <th colspan="4" style="background:#cccccc; height: 50px; font-size: 20px;">
            <div align="center"><?php
           # print_r($cheques);
           echo __('Entregar Monto de Cheque'); ?></div></th>
            </thead>
	<?php
        echo '<tr>';
		echo '<th>'; echo $this->Form->input('cliente_id'); echo '</th>';
        
		echo '<th>'; echo $this->Form->input('monto',array('value'=>$montos,'readonly'=>'readonly')); echo '</th>';
                echo '<th>'; echo '</th>';
                echo '<th>'; echo '</th>';
        echo '</tr>';
         echo '<tr>';
        
         echo '<th>'; echo $this->Form->input('tipopago_id',array('label'=>"Forma de Pago")); echo '</th>';
         
         echo '<th>';  
    
         echo '</th>';      
         echo '<th>'; echo '</th>';
                echo '<th>'; echo '</th>';
         echo '</tr>';
         
       
         
          echo '<tr>';
          
         echo '<th>'; echo $this->Form->input('user_id',array('label'=>'Registrado por')); echo '</th>';
         echo '<th colspan="3">';echo $this->Form->input('cheque_id');  echo '</th>';
         
         echo '</tr>';
           echo '<tr>';
	echo '<th>'; echo $this->Form->end(__('Registrar')); echo '</th>';	
        echo '<th>';  echo '</th>';
        echo '<th>';  echo '</th>';
        echo '<th>';  echo '</th>';
	 echo '</tr>';	
	?>
	</table>

</div>

