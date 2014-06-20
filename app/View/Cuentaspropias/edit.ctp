<div class="cuentaspropias form">
<?php echo $this->Form->create('Cuentaspropia'); ?>
	<fieldset>
		<legend><?php echo __('Edit Cuentaspropia'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nrocuenta');
		echo $this->Form->input('nombretitular');
		echo $this->Form->input('correotitular');
		echo $this->Form->input('cedulatitular');
		echo $this->Form->input('banco_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Cuentaspropia.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Cuentaspropia.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Cuentaspropias'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Bancos'), array('controller' => 'bancos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Banco'), array('controller' => 'bancos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Chequespropios'), array('controller' => 'chequespropios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chequespropio'), array('controller' => 'chequespropios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Depositocajas'), array('controller' => 'depositocajas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Depositocaja'), array('controller' => 'depositocajas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gastos'), array('controller' => 'gastos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gasto'), array('controller' => 'gastos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ingresos'), array('controller' => 'ingresos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ingreso'), array('controller' => 'ingresos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Montocuentas'), array('controller' => 'montocuentas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Montocuenta'), array('controller' => 'montocuentas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pagos'), array('controller' => 'pagos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pago'), array('controller' => 'pagos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transaccioncuentas'), array('controller' => 'transaccioncuentas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaccioncuenta'), array('controller' => 'transaccioncuentas', 'action' => 'add')); ?> </li>
	</ul>
</div>
