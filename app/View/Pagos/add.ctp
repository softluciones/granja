<div class="pagos form">
<?php echo $this->Form->create('Pago'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Pago'); ?></legend>
                <br>
                
        <table border="0">
            <tr>
                <th><?php echo $this->Form->input('cliente_id'); ?></th>
                <th><?php echo $this->Form->input('monto',array('value'=>$montos)); ?></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                
                <?php $options=array(''=>'Seleccione',
                                    0=>'Abono al Cliente (Le Debo)',
                                    1=>'Abono del Cliente (Nos Debe)'); 
                    if($debo==0){  
                        $debo=1;
                        $selected=array($debo);
                    }else{
                        $debo=0;
                        $selected=array($debo);
                    }
                ?>
                <th><?php echo $this->Form->input('edodeuda',array('options'=>$options,'selected'=>$selected)); ?></th>
                <th><?php   if($debo==0)
                            echo $this->Form->input('pagointerese_deuda',array('options'=>array(''=>'Le debemos al cliente')));
                            else 
                                echo $this->Form->input('pagointerese_deuda',array('options'=>array(
                                                                                                    1=>'Abono a deuda',
                                                                                                    2=>'Abono a intereses')));
                            
                            ?></th>
                <th><?php echo $this->Form->input('cheque_id'); ?></th>
                <th><?php echo $this->Form->input('tipopago_id'); ?></th>
            </tr>
            <tr>
                <?php if($otro!=1){ ?>
                <th colspan="3"><?php echo $this->Form->input('pagotercero_id',array('type'=>'text')); ?></th>
                <th><?php echo $this->Form->input('user_id',array('label'=>'text')); ?></th>
                <?php }else{ ?>
                <th colspan="3"><?php echo $this->Form->input('user_id'); ?></th>
                <th></th>
                <?php }?>
            </tr>
            <tr>
                <th colspan="4"><?php echo $this->Form->input('conceptode'); ?></th>
            </tr>
        </table>
	<?php
		/*echo $this->Form->input('cliente_id');
		echo $this->Form->input('monto');*/
                 
		#echo $this->Form->input('conceptode');
		/*echo $this->Form->input('edodeuda');
		echo $this->Form->input('pagointerese_deuda');*/
		#echo $this->Form->input('chequeinterese_id');
		#echo $this->Form->input('cheque_id');
		#echo $this->Form->input('cheque_estadocheque_id');
		#echo $this->Form->input('tipopago_id');
		#echo $this->Form->input('pagotercero_id',array('type'=>'text'));
		#echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Pagos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Chequeinterese'), array('controller' => 'chequeinterese', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chequeinterese'), array('controller' => 'chequeinterese', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cheque'), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cheque Estadocheques'), array('controller' => 'cheque_estadocheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cheque Estadocheque'), array('controller' => 'cheque_estadocheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipopagos'), array('controller' => 'tipopagos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipopago'), array('controller' => 'tipopagos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pagoterceros'), array('controller' => 'pagoterceros', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pagotercero'), array('controller' => 'pagoterceros', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
