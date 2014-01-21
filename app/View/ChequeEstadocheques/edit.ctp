<div class="chequeEstadocheques form">
<?php echo $this->Form->create('ChequeEstadocheque'); ?>
	<fieldset>
		<legend><?php echo __('Editar Restrincion del cheque'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('cheque_id');
		echo $this->Form->input('estadocheque_id');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Modificar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Accciones'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('ChequeEstadocheque.id')), null, __('Esta seguro de eliminar el estado cheque numero # %s?', $this->Form->value('ChequeEstadocheque.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Lista Cheque Estado cheques'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Lista Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cheque'), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Estadocheques'), array('controller' => 'estadocheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Estadocheque'), array('controller' => 'estadocheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Usuario'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Usuario'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Pagos'), array('controller' => 'pagos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Pago'), array('controller' => 'pagos', 'action' => 'add')); ?> </li>
	</ul>
</div>
