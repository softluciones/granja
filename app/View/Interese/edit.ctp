<div class="interese form">
<?php echo $this->Form->create('Interese'); ?>
	<fieldset>
		<legend><?php echo __('Edit Interese'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('vigencia');
		echo $this->Form->input('minimo');
		echo $this->Form->input('maximo');
		echo $this->Form->input('montofijo');
		echo $this->Form->input('porcentaje');
		echo $this->Form->input('tipo');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Interese.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Interese.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Interese'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Chequeinterese'), array('controller' => 'chequeinterese', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chequeinterese'), array('controller' => 'chequeinterese', 'action' => 'add')); ?> </li>
	</ul>
</div>
