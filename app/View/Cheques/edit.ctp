<script>
    $(document).ready(function(){
        
    
 $(function () {

$("#datepicker").datepicker();
$("#datepicker1").datepicker();
("#datepicker").datepicker('option', { dateFormat: 'dd-mm-yy' });
          $("#datepicker1").datepicker('option', { dateFormat: 'dd-mm-yy' });
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

echo $this->Form->input('id',array('action'=>'edit','type'=>'hidden'));
?>
    
    
    <table>
                    <thead>
       
                 <th colspan="3" style="background:#cccccc; height: 50px; font-size: 20px;">
         <div align="center">Editar Cheque</div>
                 </th>
            
         </thead>
                    <tr>
                        <th colspan="3"><?php 
                       # debug($this->data);
                        echo $this->Form->input('cliente_id');?></th>
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
                        <th><?php
                        //debug($this->data);
                        $fecharecibido=$this->data['Cheque']['fecharecibido'];
                        $fecharecibido = new DateTime($fecharecibido);
                        $fecharecibido = $fecharecibido->format('d-m-Y');
                        $fechacobro =$this->data['Cheque']['fechacobro'];
                        $fechacobro = new DateTime($fechacobro);
                        $fechacobro = $fechacobro->format('d-m-Y');
                        echo $this->Form->input('fecharecibido',array('label'=>'Fecha de Recibido','id'=>'datepicker','type'=>'text','style'=>'width:50%;','placeholder'=>'Haz Click aquí','readonly'=>'readonly','value'=>$fecharecibido)); ?></th>
                        <th><?php echo $this->Form->input('fechacobro',array('label'=>'Fecha de Cobro','id'=>'datepicker1','type'=>'text','style'=>'width:50%;','placeholder'=>'Haz Click aquí','readonly'=>'readonly','value'=>$fechacobro)); ?></th>
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

		<li><?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $this->Form->value('Cheque.id')), null, __('Está seguro de borrar el registro # %s?', $this->Form->value('Cheque.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Cheques'), array('action' => 'index')); ?></li>
			
	</ul>
</div>
