<div class="gestiondecobranzaprestamos form">
<?php echo $this->Form->create('Gestiondecobranzaprestamo'); ?>
	<fieldset>
		<legend><?php echo __('Add Gestiondecobranzaprestamo'); ?></legend>
	<?php
		echo $this->Form->input('descripcion');
		echo $this->Form->input('prestamo_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Gestiondecobranzaprestamos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Prestamos'), array('controller' => 'prestamos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prestamo'), array('controller' => 'prestamos', 'action' => 'add')); ?> </li>
	</ul>
</div>
