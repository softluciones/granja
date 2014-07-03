
  <script language="javascript">
    $(document).ready(function(){
        $("#datepicker").datepicker();
        $("#datepicker1").datepicker();
        $("#datepicker").datepicker('option', { dateFormat: 'dd-mm-yy' });
          $("#datepicker1").datepicker('option', { dateFormat: 'dd-mm-yy' });
             $('#divcliente').dialog({
                width: 700,
                height: 350,
                modal:true,
                title:'AGREGAR CLIENTE',
                autoOpen:false
             });
              $('#divinteres').dialog({
                width: 500,
                height: 250,
                modal:true,
                title:'AGREGAR INTERES',
                autoOpen:false
             });
         
    });
</script>
<div class="pagodeprestamos form">
<?php echo $this->Form->create('Pagodeprestamo'); ?>
	<fieldset>
	

                <table>
                    <thead>
                        <th colspan="3" style="background:#cccccc; height: 50px; font-size: 20px;">
                            <div align="center" style="color:#fff;"> Pagar cuota </div>
                        </th>
                    </thead>
                    <tr>
                        <td><?php echo $this->Form->input('montopagado',array('label'=>'monto a pagar','value'=>$cuotas)); ?></td>
                        <td><?php $fecha=new DateTime($fecha); $fecha=$fecha->format("d-m-Y");
                                  echo $this->Form->input('fecha',array('value'=>$fecha,'label'=>'Fecha de hoy','id'=>'datepicker','type'=>'text','style'=>'width:50%;','placeholder'=>'Haz Click aquí','readonly'=>'readonly'));?></td>
                        <td><?php echo $this->Form->input('diaspagados',array('label'=>'Dias a pagar','value'=>$valor)); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $this->Form->input('nroreferencia'); ?></td>
                        <td><?php echo $this->Form->input('tipopago_id');?></td>
                        <td><?php echo $this->Form->input('descri',array('label'=>'Descripción'));?></td>
                    </tr>
                    <tr>
                        <td><?php echo $this->Form->input('descuento'); ?></td>
                        <td><?php echo $this->Form->input('user_id'); ?></td>
                        <td><?php echo $this->Form->input('prestamo_id'); ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><?php echo $this->Form->end(__('Guardar Cambios')); ?></td>
                        <td></td>
                    </tr>
                </table>
	<?php
		
		
		
		
		
	?>
	</fieldset>

</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Pagodeprestamos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tipopagos'), array('controller' => 'tipopagos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipopago'), array('controller' => 'tipopagos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>

		<li><?php echo $this->Html->link(__('List Prestamos'), array('controller' => 'prestamos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prestamo'), array('controller' => 'prestamos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transaccionprestamointeres'), array('controller' => 'transaccionprestamointeres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaccionprestamointere'), array('controller' => 'transaccionprestamointeres', 'action' => 'add')); ?> </li>
	</ul>
</div>
