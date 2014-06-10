<div class="pagodeprestamos form">
<?php echo $this->Form->create('Pagodeprestamo'); ?>
	<fieldset>
		<legend><?php echo __('Edit Pagodeprestamo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('montopagado');
		echo $this->Form->input('fecha');
		echo $this->Form->input('nroreferencia');
		echo $this->Form->input('cuotas_id');
		echo $this->Form->input('diaspagados');
		echo $this->Form->input('montodeuda');
		echo $this->Form->input('tipopago_id');
		echo $this->Form->input('descri');
		echo $this->Form->input('descuento');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Pagodeprestamo.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Pagodeprestamo.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Pagodeprestamos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cuotas'), array('controller' => 'cuotas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cuotas'), array('controller' => 'cuotas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipopagos'), array('controller' => 'tipopagos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipopago'), array('controller' => 'tipopagos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transaccionprestamointeres'), array('controller' => 'transaccionprestamointeres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaccionprestamointere'), array('controller' => 'transaccionprestamointeres', 'action' => 'add')); ?> </li>
	</ul>
</div>
