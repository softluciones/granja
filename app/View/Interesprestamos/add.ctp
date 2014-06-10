<div class="interesprestamos form">
<?php echo $this->Form->create('Interesprestamo'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Interesprestamo'); ?></legend>
	<?php
		echo $this->Form->input('valor');
		$options=array(''=>'Seleccione',
                                    1=>'Pago Diario.',
                                    2=>'Cuota Fija.'); 
		echo $this->Form->input('tipoprestamo',array('options'=>$options));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Interesprestamos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Prestamos'), array('controller' => 'prestamos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prestamo'), array('controller' => 'prestamos', 'action' => 'add')); ?> </li>
	</ul>
</div>
