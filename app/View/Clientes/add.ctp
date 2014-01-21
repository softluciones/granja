<div class="clientes form">
<?php echo $this->Form->create('Cliente'); ?>
	<fieldset>
		<legend><?php echo __('Registrar Cliente'); ?></legend>
                
                <br>
                <table>
                    <tr>
                        <th colspan="3"><div align="center">Datos personales</div></th>
                    </tr>
                    <tr>
                        <th><?php echo $this->Form->input('cedula'); ?></th>
                        <th><?php echo $this->Form->input('nombre'); ?></th>
                        <th><?php echo $this->Form->input('apellido'); ?></th>
                    </tr>
                    <tr>
                        <th><?php echo $this->Form->input('apodo'); ?></th>
                        <th><?php echo $this->Form->input('negocio'); ?></th>
                        <th><?php echo $this->Form->input('email'); ?></th>
                    </tr>
                    <tr>
                        <th colspan="3"><?php echo $this->Form->input('direccion'); ?></th>
                    </tr>
                    <tr>
                        <th colspan="3"><div align="center">Numero de telefonos</div></th>
                    </tr>
                    <tr>
                        <th><?php echo $this->Form->input('telefonofijo'); ?></th>
                        <th><?php echo $this->Form->input('telefonocelular'); ?></th>
                        <th><?php echo $this->Form->input('user_id',array('label'=>'Registrado por')); ?></th>
                    </tr>
                </table>
         <?php
		/*echo $this->Form->input('cedula');
		echo $this->Form->input('nombre');
		echo $this->Form->input('apellido');
		echo $this->Form->input('apodo');
		echo $this->Form->input('negocio');*/
		#echo $this->Form->input('direccion');
		#echo $this->Form->input('telefonofijo');
		#echo $this->Form->input('telefonocelular');
		#echo $this->Form->input('email');
		#echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Registrar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Lista Clientes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Lista Usuario'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cheque'), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Cuentas'), array('controller' => 'cuentas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cuenta'), array('controller' => 'cuentas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Pagos'), array('controller' => 'pagos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Pago'), array('controller' => 'pagos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista de Pagos terceros'), array('controller' => 'pagoterceros', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Pago tercero'), array('controller' => 'pagoterceros', 'action' => 'add')); ?> </li>
	</ul>
</div>
