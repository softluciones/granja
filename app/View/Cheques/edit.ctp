
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
<script language="javascript">

    $(document).ready(function(){
        
    


$("#datepicker").datepicker();
        $("#datepicker1").datepicker();
        $("#datepicker").datepicker('option', { dateFormat: 'dd-mm-yy' });
          $("#datepicker1").datepicker('option', { dateFormat: 'dd-mm-yy' });
$("#datepicker").val($("#oculto1").val());
$("#datepicker1").val($("#oculto2").val());


  });
  </script>
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
                        <th><?php echo $this->Form->input('filename',array('type'=>'file','label'=>'Imagen del Cheque'));
                        
                        echo $this->Form->input('dir',array('type'=>'hidden','value'=>''));?></th>
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
                        echo $this->Form->input('fecharecibido1',array('type'=>'hidden','value'=>$fecharecibido,'id'=>'oculto1'));
                        echo $this->Form->input('fechacobro1',array('type'=>'hidden','value'=>$fechacobro,'id'=>'oculto2'));
echo $this->Form->input('fecharecibido',array('label'=>'Fecha de Recibido','type'=>'text','style'=>'width:50%;','placeholder'=>'Haz Click aqui','readonly'=>'readonly','value'=>$fecharecibido,'id'=>'datepicker')); ?></th>
                        <th><?php echo $this->Form->input('fechacobro',array('label'=>'Fecha de Cobro','type'=>'text','style'=>'width:50%;','readonly'=>'readonly','placeholder'=>'Haz Click aqui','value'=>$fechacobro,'id'=>'datepicker1')); ?></th>
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
