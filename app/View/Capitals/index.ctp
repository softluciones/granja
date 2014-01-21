<div class="capitals index">
	<h2><?php echo __('Capitals'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('montocheque'); ?></th>
			<th><?php echo $this->Paginator->sort('montointeres'); ?></th>
			<th><?php echo $this->Paginator->sort('montoentregado'); ?></th>
			<th><?php echo $this->Paginator->sort('estadocheque'); ?></th>
			<th><?php echo $this->Paginator->sort('pago'); ?></th>
			<th><?php echo $this->Paginator->sort('pagotercero'); ?></th>
			<th><?php echo $this->Paginator->sort('total'); ?></th>
			<th><?php echo $this->Paginator->sort('motivo'); ?></th>
			<th><?php echo $this->Paginator->sort('provienede'); ?></th>
			<th><?php echo $this->Paginator->sort('codigo'); ?></th>
			<th><?php echo $this->Paginator->sort('cheque_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($capitals as $capital): ?>
	<tr>
		<td><?php echo h($capital['Capital']['id']); ?>&nbsp;</td>
		<td><?php echo h($capital['Capital']['created']); ?>&nbsp;</td>
		<td><?php echo h($capital['Capital']['modified']); ?>&nbsp;</td>
		<td><?php echo h($capital['Capital']['montocheque']); ?>&nbsp;</td>
		<td><?php echo h($capital['Capital']['montointeres']); ?>&nbsp;</td>
		<td><?php echo h($capital['Capital']['montoentregado']); ?>&nbsp;</td>
		<td><?php echo h($capital['Capital']['estadocheque']); ?>&nbsp;</td>
		<td><?php echo h($capital['Capital']['pago']); ?>&nbsp;</td>
		<td><?php echo h($capital['Capital']['pagotercero']); ?>&nbsp;</td>
		<td><?php echo h($capital['Capital']['total']); ?>&nbsp;</td>
		<td><?php echo h($capital['Capital']['motivo']); ?>&nbsp;</td>
		<td><?php echo h($capital['Capital']['provienede']); ?>&nbsp;</td>
		<td><?php echo h($capital['Capital']['codigo']); ?>&nbsp;</td>
		<td><?php echo h($capital['Capital']['cheque_id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($capital['User']['username'], array('controller' => 'users', 'action' => 'view', $capital['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $capital['Capital']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $capital['Capital']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $capital['Capital']['id']), null, __('Are you sure you want to delete # %s?', $capital['Capital']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Capital'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
