<div class="estadocheques form">
<?php echo $this->Form->create('Estadocheque'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Estados de un cheque'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
		echo $this->Form->input('nomenclatura');
		echo $this->Form->input('descripcion',array('label'=>'Descripción'));
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Registrar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Lista Estado cheques'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Lista Usuario'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Uusuario'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
