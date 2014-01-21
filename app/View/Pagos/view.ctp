<div class="pagos view">
<h2><?php echo __('Pago'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pago['Pago']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cliente'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pago['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $pago['Cliente']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($pago['Pago']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($pago['Pago']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Monto'); ?></dt>
		<dd>
			<?php echo h($pago['Pago']['monto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Conceptode'); ?></dt>
		<dd>
			<?php echo h($pago['Pago']['conceptode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Edodeuda'); ?></dt>
		<dd>
			<?php echo h($pago['Pago']['edodeuda']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pagointerese Deuda'); ?></dt>
		<dd>
			<?php echo h($pago['Pago']['pagointerese_deuda']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Chequeinterese'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pago['Chequeinterese']['id'], array('controller' => 'chequeinterese', 'action' => 'view', $pago['Chequeinterese']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cheque'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pago['Cheque']['numerodecheque'], array('controller' => 'cheques', 'action' => 'view', $pago['Cheque']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cheque Estadocheque'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pago['ChequeEstadocheque']['id'], array('controller' => 'cheque_estadocheques', 'action' => 'view', $pago['ChequeEstadocheque']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipopago'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pago['Tipopago']['nombre'], array('controller' => 'tipopagos', 'action' => 'view', $pago['Tipopago']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pagotercero'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pago['Pagotercero']['id'], array('controller' => 'pagoterceros', 'action' => 'view', $pago['Pagotercero']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pago['User']['username'], array('controller' => 'users', 'action' => 'view', $pago['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pago'), array('action' => 'edit', $pago['Pago']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Pago'), array('action' => 'delete', $pago['Pago']['id']), null, __('Are you sure you want to delete # %s?', $pago['Pago']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pagos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pago'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Chequeinterese'), array('controller' => 'chequeinterese', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chequeinterese'), array('controller' => 'chequeinterese', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cheque'), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cheque Estadocheques'), array('controller' => 'cheque_estadocheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cheque Estadocheque'), array('controller' => 'cheque_estadocheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipopagos'), array('controller' => 'tipopagos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipopago'), array('controller' => 'tipopagos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pagoterceros'), array('controller' => 'pagoterceros', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pagotercero'), array('controller' => 'pagoterceros', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
