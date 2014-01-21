<div class="capitals form">
<?php echo $this->Form->create('Capital'); ?>
	<fieldset>
		<legend><?php echo __('Add Capital'); ?></legend>
	<?php
		echo $this->Form->input('montocheque');
		echo $this->Form->input('montointeres');
		echo $this->Form->input('montoentregado');
		echo $this->Form->input('estadocheque');
		echo $this->Form->input('pago');
		echo $this->Form->input('pagotercero');
		echo $this->Form->input('total');
		echo $this->Form->input('motivo');
		echo $this->Form->input('provienede');
		echo $this->Form->input('codigo');
		echo $this->Form->input('cheque_id');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Capitals'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
