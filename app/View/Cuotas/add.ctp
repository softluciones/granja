<div class="cuotas form">
<?php echo $this->Form->create('Cuota'); ?>
	<fieldset>
		<legend><?php echo __('Add Cuota'); ?></legend>
	<?php
		echo $this->Form->input('fechaini');
		echo $this->Form->input('fechafin');
		echo $this->Form->input('nrocuotas');
		echo $this->Form->input('montocuota');
		echo $this->Form->input('prestamo_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Cuotas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Prestamos'), array('controller' => 'prestamos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prestamo'), array('controller' => 'prestamos', 'action' => 'add')); ?> </li>
	</ul>
</div>
