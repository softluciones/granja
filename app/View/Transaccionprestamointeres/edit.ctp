<div class="transaccionprestamointeres form">
<?php echo $this->Form->create('Transaccionprestamointere'); ?>
	<fieldset>
		<legend><?php echo __('Edit Transaccionprestamointere'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('prestamo_id');
		echo $this->Form->input('montointeres');
		echo $this->Form->input('fecha');
		echo $this->Form->input('montodeuda');
		echo $this->Form->input('pagodeprestamo_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Transaccionprestamointere.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Transaccionprestamointere.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Transaccionprestamointeres'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Prestamos'), array('controller' => 'prestamos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prestamo'), array('controller' => 'prestamos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pagodeprestamos'), array('controller' => 'pagodeprestamos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pagodeprestamo'), array('controller' => 'pagodeprestamos', 'action' => 'add')); ?> </li>
	</ul>
</div>
