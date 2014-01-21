<div class="pagoterceros form">
<?php echo $this->Form->create('Pagotercero'); ?>
	<fieldset>
		<legend><?php echo __('Editar Pago a terceros'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('dia');
		echo $this->Form->input('monto');
		
		echo $this->Form->input('cliente_id',array('label'=>'Cliente Origen a destino'));
               # debug($cliente2);
		echo $this->Form->input('cliente1s',array('label'=>'Cliente destino','selected'=>$cliente2));
                echo $this->Form->input('conceptode',array('label'=>'Concepto de'));
		echo $this->Form->input('cheque_id');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Modificar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Pagotercero.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Pagotercero.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Pagoterceros'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cheque'), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pagos'), array('controller' => 'pagos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pago'), array('controller' => 'pagos', 'action' => 'add')); ?> </li>
	</ul>
</div>
