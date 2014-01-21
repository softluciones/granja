<div class="bancos form">
<?php echo $this->Form->create('Banco'); ?>
	<fieldset>
		<legend><?php echo __('Editar Banco'); ?></legend>
	<?php
		echo $this->Form->input('id',array('label'=>'Identificador'));
		echo $this->Form->input('codigo',array('label'=>'Codigo del Banco'));
		echo $this->Form->input('nombre');
		echo $this->Form->input('descripcion',array('label'=>'Descripción'));
		echo $this->Form->input('user_id',array('Registrado por el usuario'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Modificar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('Banco.id')), null, __('Estas seguro de borrar el codigo  # %s?', $this->Form->value('Banco.codigo'))); ?></li>
		<li><?php echo $this->Html->link(__('Lista Bancos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Lista Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cheque'), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Cuentas'), array('controller' => 'cuentas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Cuenta'), array('controller' => 'cuentas', 'action' => 'add')); ?> </li>
	</ul>
</div>
