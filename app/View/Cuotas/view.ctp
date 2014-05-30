<div class="cuotas view">
<h2><?php echo __('Cuota'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cuota['Cuota']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fechaini'); ?></dt>
		<dd>
			<?php echo h($cuota['Cuota']['fechaini']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fechafin'); ?></dt>
		<dd>
			<?php echo h($cuota['Cuota']['fechafin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nrocuotas'); ?></dt>
		<dd>
			<?php echo h($cuota['Cuota']['nrocuotas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Montocuota'); ?></dt>
		<dd>
			<?php echo h($cuota['Cuota']['montocuota']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prestamo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cuota['Prestamo']['id'], array('controller' => 'prestamos', 'action' => 'view', $cuota['Prestamo']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cuota'), array('action' => 'edit', $cuota['Cuota']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cuota'), array('action' => 'delete', $cuota['Cuota']['id']), null, __('Are you sure you want to delete # %s?', $cuota['Cuota']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cuotas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cuota'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Prestamos'), array('controller' => 'prestamos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prestamo'), array('controller' => 'prestamos', 'action' => 'add')); ?> </li>
	</ul>
</div>
