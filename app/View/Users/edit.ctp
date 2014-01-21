<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Editar Usuario'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username',array('label'=> 'Nombre de usuario'));
		echo $this->Form->input('password',array('label'=>'Contraseña'));
		echo $this->Form->input('role_id',array('label'=>'Rol del usuario'));
		echo $this->Form->input('nombre',array('label'=>'Nombre Empleado'));
		echo $this->Form->input('apellido',array('label'=>'Apellido Empleado'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Registrar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Lista Usuario'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Lista Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
                <li><?php echo $this->Html->link(__('Lista Roles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Rol'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Bancos'), array('controller' => 'bancos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Banco'), array('controller' => 'bancos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Cheque Estado cheques'), array('controller' => 'cheque_estadocheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cheque Estado cheque'), array('controller' => 'cheque_estadocheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Cheque intereses'), array('controller' => 'chequeinterese', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cheque intereses'), array('controller' => 'chequeinterese', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Cuentas'), array('controller' => 'cuentas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Cuenta'), array('controller' => 'cuentas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Estado cheques'), array('controller' => 'estadocheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Estado cheque'), array('controller' => 'estadocheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Gestion de cobranzas'), array('controller' => 'gestiondecobranzas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Gestion de cobranza'), array('controller' => 'gestiondecobranzas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Interese'), array('controller' => 'interese', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Interese'), array('controller' => 'interese', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pagos'), array('controller' => 'pagos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pago'), array('controller' => 'pagos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pagoterceros'), array('controller' => 'pagoterceros', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pagotercero'), array('controller' => 'pagoterceros', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipopagos'), array('controller' => 'tipopagos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipopago'), array('controller' => 'tipopagos', 'action' => 'add')); ?> </li>
	</ul>
</div>
