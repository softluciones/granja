    <div class="bancos form">
<?php echo $this->Form->create('Banco'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Banco'); ?></legend>
	<?php
		echo $this->Form->input('codigo');
		echo $this->Form->input('nombre');
		echo $this->Form->input('descripcion',array('label'=>'Descripción'));
		echo $this->Form->input('user_id',array('label'=>'Registrado por'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Registrar')); ?>
</div>
<br></br>
<div class="actions">
	
	<ul>

		<li  align="center"><?php echo $this->Html->link(__('Lista Bancos'), array('action' => 'index')); ?></li>
		<li align="center"><?php echo $this->Html->link(__('Lista Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li align="center"><?php echo $this->Html->link(__('Nuevo Cheque'), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
		<li align="center"><?php echo $this->Html->link(__('Lista Cuentas'), array('controller' => 'cuentas', 'action' => 'index')); ?> </li>
		<li align="center"><?php echo $this->Html->link(__('Nueva Cuenta'), array('controller' => 'cuentas', 'action' => 'add')); ?> </li>
	</ul>
</div>
