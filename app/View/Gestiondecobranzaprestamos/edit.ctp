<div class="gestiondecobranzaprestamos form">
<?php echo $this->Form->create('Gestiondecobranzaprestamo'); ?>
	<fieldset>
		<legend><?php echo __('Edit Gestiondecobranzaprestamo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('prestamo_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Gestiondecobranzaprestamo.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Gestiondecobranzaprestamo.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Gestiondecobranzaprestamos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Prestamos'), array('controller' => 'prestamos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prestamo'), array('controller' => 'prestamos', 'action' => 'add')); ?> </li>
	</ul>
</div>
