<div class="tipogarantias form">
<?php echo $this->Form->create('Tipogarantia'); ?>
	<fieldset>
		<legend><?php echo __('Edit Tipogarantia'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('descripcion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Tipogarantia.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Tipogarantia.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tipogarantias'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Garantias'), array('controller' => 'garantias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Garantia'), array('controller' => 'garantias', 'action' => 'add')); ?> </li>
	</ul>
</div>
