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
            <div align="center"><?php echo __('Agregar Pago a Cheque '); ?></div></th>
            </thead>
	<?php
        echo '<tr>';
		echo '<th>'; echo $this->Form->input('cliente_id'); echo '</th>';
        
		echo '<th>'; echo $this->Form->input('monto',array('value'=>$montos)); echo '</th>';
                echo '<th>'; echo '</th>';
                echo '<th>'; echo '</th>';
        echo '</tr>';
         echo '<tr>';
         $options=array(''=>'Seleccione',
                                    0=>'Abono al Cliente (Le Debo)',
                                    1=>'Abono del Cliente (Nos Debe)'); 
                    if($debo==1){  
                        $debo=0;
                        $selected=array($debo);
                    }else{
                        $debo=1;
                        $selected=array($debo);
                    }
         echo '<th>'; echo $this->Form->input('edodeuda',array('options'=>$options,'selected'=>$selected)); echo '</th>';
         echo '<th>'; if($debo==0)
                            echo $this->Form->input('pagointerese_deuda',array('options'=>array(''=>'Le debemos al cliente')));
                            else 
                                echo $this->Form->input('pagointerese_deuda',array('options'=>array(
                                                                                                    1=>'Abono a deuda',
                                                                                                    2=>'Abono a intereses')));
                            
                            echo '</th>';
         echo '<th>'; echo $this->Form->input('cheque_id'); echo '</th>';
         echo '<th>';  echo $this->Form->input('tipopago_id'); echo '</th>';      
         echo '</tr>';
         
       
         
          echo '<tr>';
          
         echo '<th>'; echo $this->Form->input('user_id',array('label'=>'Registrado por')); echo '</th>';
         echo '<th colspan="3">'; echo $this->Form->input('conceptode'); echo '</th>';
         
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
<br></br>
<div class="actions">
	
	<ul>

		<li  align="center"><?php echo $this->Html->link(__('Lista Bancos'), array('action' => 'index')); ?></li>
		<li align="center"><?php echo $this->Html->link(__('Lista Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li align="center"><?php echo $this->Html->link(__('Nuevo Cheque'), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
		<li align="center"><?php echo $this->Html->link(__('Lista Cuentas'), array('controller' => 'cuentas', 'action' => 'index')); ?> </li>
		<li align="center"><?php echo $this->Html->link(__('Nueva Cuenta'), array('controller' => 'cuentas', 'action' => 'add')); ?> </li>
	</ul>
</div>
