<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Usuario'); ?></legend>
	<?php
		echo $this->Form->input('username',array('label'=>'Nombre de Usuario'));
		echo $this->Form->input('password',array('label'=>'Contraseña'));
		echo $this->Form->input('role_id',array('label'=>'Rol del Usuario'));
		echo $this->Form->input('nombre',array('label'=>'Nombre del empleado'));
		echo $this->Form->input('apellido',array('label'=>'Apellido del empleado'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Registrar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Lista Usuario'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Lista Roles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Rol'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Bancos'), array('controller' => 'bancos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Banco'), array('controller' => 'bancos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Cheque Estado cheques'), array('controller' => 'cheque_estadocheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cheque Estado cheque'), array('controller' => 'cheque_estadocheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Cheque intereses'), array('controller' => 'chequeinterese', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cheque intereses'), array('controller' => 'chequeinterese', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cheque'), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Cuentas'), array('controller' => 'cuentas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cuenta'), array('controller' => 'cuentas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Estado cheques'), array('controller' => 'estadocheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Estado cheque'), array('controller' => 'estadocheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Gestion de cobranzas'), array('controller' => 'gestiondecobranzas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Gestion de cobranza'), array('controller' => 'gestiondecobranzas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Intereses'), array('controller' => 'interese', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Intereses'), array('controller' => 'interese', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Pagos'), array('controller' => 'pagos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Pago'), array('controller' => 'pagos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Pago terceros'), array('controller' => 'pagoterceros', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Pago tercero'), array('controller' => 'pagoterceros', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Tipo pagos'), array('controller' => 'tipopagos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Tipo pago'), array('controller' => 'tipopagos', 'action' => 'add')); ?> </li>
	</ul>
</div>
