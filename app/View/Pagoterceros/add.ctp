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
<?php
$hoy = date("Y-m-d h:i:s");
$anho= date("Y");
$dia = date("l");
$dias=array('Monday',
			'Tuesday',
			'Wednesday',
			'Thursday',
			'Friday',
			'Saturday',
			'Sunday');
$day=array('Lunes',
			'Martes',
			'Miercoles',
			'Jueves',
			'Viernes',
			'Sabado',
			'Domingo');
$month= array("January",
			  "February",
			  "March",
			  "April",
			  "May",
			  "June",
			  "July",
			  "August",
			  "September",
			  "October",
			  "November",
			  "December");
$meses= array("Enero",
			  "Febrero",
			  "Marzo",
			  "Abril",
			  "Mayo",
			  "Junio",
			  "Julio",
			  "Agosto",
			  "Septiembre",
			  "Octubre",
			  "Noviembre",
			  "Deciembre");
$mes=date("F");
for($i=0;$i<7;$i++){
		if($dia==$dias[$i]){
			$dia=$day[$i];
			break;
		}
}
for($i=0;$i<12;$i++){
	if($mes==$month[$i]){
			$mes=$meses[$i];
			break;
		}
}
?>
<div class="pagoterceros form">
<?php echo $this->Form->create('Pagotercero'); ?>
    
	       <table>
             <thead>
            <th colspan="4" style="background:#cccccc; height: 50px; font-size: 20px;">
            <div align="center"><?php echo __('Agregar Pago a Terceros'); ?></div></th>
            </thead>
		
         
                    <tr>
                        <th><?php echo $this->Form->input('dia',array('value'=>$dia)); ?></th>
                        <th><?php echo $this->Form->input('monto',array('value'=>$chequ)); ?></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th colspan="3" style="alignment-adjust: central;">Pago a tercero de origen al destino.</th>
                    </tr>
                    <tr>
                        <th><?php echo $this->Form->input('cliente_id',array('label'=>'Cliente Origen')); ?></th>
                        <th><?php echo $this->Form->input('cliente1s',array('label'=>'Destino')); ?></th>
                        <th><?php echo $this->Form->input('cheque_id',array('label'=>'Numero de cheque')); ?></th>
                    </tr>
                    <tr>
                        <th colspan="3"><?php echo $this->Form->input('conceptode',array('label'=>'Concepto de')); ?></th>
                    </tr>
                    <tr>
                        <th><?php echo $this->Form->input('user_id',array('label'=>'Registrado por')); ?></th>
                        <th><?php echo $this->Form->end(__('Registrar')); ?></th>
                        <th></th>
                    </tr>
                </table>
	<?php
		/*echo $this->Form->input('dia',array('value'=>$dia));
		echo $this->Form->input('monto');
		echo $this->Form->input('conceptode');
		/*echo $this->Form->input('cliente_id',array('label'=>'Cliente Origen a destino'));
		echo $this->Form->input('cliente1s',array('label'=>'Cliente a pagar'));
		echo $this->Form->input('cheque_id',array('label'=>'Monto del cheque'));
		echo $this->Form->input('user_id',array('label'=>'Registrado por'));*/
	?>
	
<?php #echo $this->Form->end(__('Registrar')); ?>
</div>
<div class="actions">
	
	<ul>

		<li><?php echo $this->Html->link(__('Lista Pago terceros'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Lista Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cheque'), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Usuarios'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Pagos'), array('controller' => 'pagos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Pago'), array('controller' => 'pagos', 'action' => 'add')); ?> </li>
	</ul>
</div>

