<?php date_default_timezone_set("America/Caracas")?>

<script>
    $(document).ready(function(){
        
    
 $(function () {

$("#datepicker").datepicker();
$("#datepicker1").datepicker();
});

  });
  </script>
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
<div class="cheques form">
<?php echo $this->Form->create('Cheque',array('type'=>'file')); 

?>
	
                <table>
                    <thead>
       
                 <th colspan="3" style="background:#cccccc; height: 50px; font-size: 20px;">
         <div align="center">Agregar Cheque</div>
                 </th>
            
         </thead>
                    <tr>
                        <th colspan="3"><?php echo $this->Form->input('cliente_id');?></th>
                    </tr>
                    <tr>
                        <th><?php echo $this->Form->input('banco_id'); ?></th>
                        <th><?php echo $this->Form->input('numerodecuenta',array('label'=>'Nro. de Cuenta')); ?></th>
                        <th><?php echo $this->Form->input('numerodecheque',array('label'=>'Nro. de Cheque')); ?></th>
                    </tr>
                    <tr>
                        <th><?php echo $this->Form->input('monto'); ?></th>
                        <th><?php echo $this->Form->input('interese_id',array('label'=>'Interes')); ?></th>
                        <th><?php echo $this->Form->input('filename',array('type'=>'file','label'=>'Imagen del Cheque')); ?></th>
                    </tr>
                    <tr>

                        <th><?php echo $this->Form->input('fecharecibido',array('label'=>'Fecha de Recibido','id'=>'datepicker','type'=>'text','style'=>'width:50%;','placeholder'=>'Haz Click aquí','readonly'=>'readonly')); ?></th>
                        <th><?php echo $this->Form->input('fechacobro',array('label'=>'Fecha de Cobro','id'=>'datepicker1','type'=>'text','style'=>'width:50%;','placeholder'=>'Haz Click aquí','readonly'=>'readonly')); ?></th>

                        <th><?php echo $this->Form->input('cobrado',array('options'=>array(
                               ''=>'Seleccione','1'=>'Por Cobrar','2'=>'Cobrado','0'=>'Devuelto'
                ))); ?></th>
                     
                    </tr>
                    <tr>
                       
                   <th colspan="2"><?php echo $this->Form->input('user_id'); ?></th>
                        <th><?php echo $this->Form->end(__('Guardar')); ?></th>
                        
                    </tr>
                </table>
	<?php
		
		
		echo $this->Form->input('dir',array('type'=>'hidden'));
		
		
		echo $this->Form->input('dias',array('type'=>'hidden'));
		
		
	?>


</div>
  <br></br>
<div class="actions">
	
	<ul>

		<li class="menu"><?php echo $this->Html->link(__('Listar Cheques'), array('action' => 'index')); ?></li>
		<li class="menu"><?php echo $this->Html->link(__('Listar Bancos'), array('controller' => 'bancos', 'action' => 'index')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Nuevo Banco'), array('controller' => 'bancos', 'action' => 'add')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Lista de Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Nuevo Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Listar Intereses'), array('controller' => 'interese', 'action' => 'index')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Nuevo Interes'), array('controller' => 'interese', 'action' => 'add')); ?> </li>
		
	</ul>
</div>
