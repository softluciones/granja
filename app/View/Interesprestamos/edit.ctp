<div class="interesprestamos form">
<?php echo $this->Form->create('Interesprestamo'); ?>
	<fieldset>
		<legend><?php echo __('Edit Interesprestamo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('valor');
		echo $this->Form->input('tipoprestamo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Interesprestamo.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Interesprestamo.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Interesprestamos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Prestamos'), array('controller' => 'prestamos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prestamo'), array('controller' => 'prestamos', 'action' => 'add')); ?> </li>
	</ul>
</div>
