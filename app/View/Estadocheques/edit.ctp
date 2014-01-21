<div class="estadocheques form">
<?php echo $this->Form->create('Estadocheque'); ?>
	<fieldset>
		<legend><?php echo __('Editar Estado de cheque'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('nomenclatura');
		echo $this->Form->input('descripcion',array('label'=>'Descripción'));
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('Estadocheque.id')), null, __('Está seguro de eliminar el estado del cheque  %s?', $this->Form->value('Estadocheque.nombre'))); ?></li>
		<li><?php echo $this->Html->link(__('Lista Estado cheques'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Lista Usuario'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
