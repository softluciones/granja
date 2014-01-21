<div class="gestiondecobranzas form">
<?php echo $this->Form->create('Gestiondecobranza'); ?>
	<fieldset>
		<legend><?php echo __('Edit Gestiondecobranza'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('cheque_id');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Gestiondecobranza.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Gestiondecobranza.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Gestiondecobranzas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cheque'), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
