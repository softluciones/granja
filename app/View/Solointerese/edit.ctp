<div class="solointerese form">
<?php echo $this->Form->create('Solointerese'); ?>
	<fieldset>
		<legend><?php echo __('Edit Solointerese'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('monto');
		echo $this->Form->input('montointereses');
		echo $this->Form->input('cheque_id');
		echo $this->Form->input('interes');
		echo $this->Form->input('estado');
		echo $this->Form->input('fecha');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Solointerese.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Solointerese.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Solointerese'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cheque'), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
	</ul>
</div>
