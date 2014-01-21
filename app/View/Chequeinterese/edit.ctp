<div class="chequeinterese form">
<?php echo $this->Form->create('Chequeinterese'); ?>
	<fieldset>
		<legend><?php echo __('Edit Chequeinterese'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('montocheque');
		echo $this->Form->input('montodescuentointeres');
		echo $this->Form->input('montoentregado');
		echo $this->Form->input('estadocheque');
		echo $this->Form->input('cheque_id');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Chequeinterese.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Chequeinterese.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Chequeinterese'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cheque'), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pagos'), array('controller' => 'pagos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pago'), array('controller' => 'pagos', 'action' => 'add')); ?> </li>
	</ul>
</div>
