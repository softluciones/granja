<div class="chequeinterese index">
	<h2><?php echo __('Chequeinterese'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('montocheque'); ?></th>
			<th><?php echo $this->Paginator->sort('montodescuentointeres'); ?></th>
			<th><?php echo $this->Paginator->sort('montoentregado'); ?></th>
			<th><?php echo $this->Paginator->sort('estadocheque'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('cheque_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($chequeinterese as $chequeinterese): ?>
	<tr>
		<td><?php echo h($chequeinterese['Chequeinterese']['id']); ?>&nbsp;</td>
		<td><?php echo h($chequeinterese['Chequeinterese']['montocheque']); ?>&nbsp;</td>
		<td><?php echo h($chequeinterese['Chequeinterese']['montodescuentointeres']); ?>&nbsp;</td>
		<td><?php echo h($chequeinterese['Chequeinterese']['montoentregado']); ?>&nbsp;</td>
		<td><?php echo h($chequeinterese['Chequeinterese']['estadocheque']); ?>&nbsp;</td>
		<td><?php echo h($chequeinterese['Chequeinterese']['created']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($chequeinterese['Cheque']['numerodecheque'], array('controller' => 'cheques', 'action' => 'view', $chequeinterese['Cheque']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($chequeinterese['User']['username'], array('controller' => 'users', 'action' => 'view', $chequeinterese['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $chequeinterese['Chequeinterese']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $chequeinterese['Chequeinterese']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $chequeinterese['Chequeinterese']['id']), null, __('Are you sure you want to delete # %s?', $chequeinterese['Chequeinterese']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Chequeinterese'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cheque'), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pagos'), array('controller' => 'pagos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pago'), array('controller' => 'pagos', 'action' => 'add')); ?> </li>
	</ul>
</div>
