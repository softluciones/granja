<div class="garantias form">
<?php echo $this->Form->create('Garantia'); ?>
	<fieldset>
		<legend><?php echo __('Add Garantia'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('montoquecubre');
		echo $this->Form->input('pertenecea');
		echo $this->Form->input('tipogarantia_id');
		echo $this->Form->input('prestamo_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Garantias'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tipogarantias'), array('controller' => 'tipogarantias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipogarantia'), array('controller' => 'tipogarantias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Prestamos'), array('controller' => 'prestamos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prestamo'), array('controller' => 'prestamos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cheque'), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
	</ul>
</div>
