<div class="solointerese index">
	<h2><?php echo __('Solointerese'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
                        <th><?php echo $this->Paginator->sort('monto'); ?></th>
			<th><?php echo $this->Paginator->sort('montointereses'); ?></th>
			<th><?php echo $this->Paginator->sort('cheque_id'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($solointerese as $solointerese): ?>
	<tr>
		<td><?php echo h($solointerese['Solointerese']['id']); ?>&nbsp;</td>
		<td><?php echo h($solointerese['Solointerese']['monto']); ?>&nbsp;</td>
                <td><?php echo h($solointerese['Solointerese']['montointereses']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($solointerese['Cheque']['numerodecheque'], array('controller' => 'cheques', 'action' => 'view', $solointerese['Cheque']['id'])); ?>
		</td>
		<td><?php echo h($solointerese['Solointerese']['fecha']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $solointerese['Solointerese']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $solointerese['Solointerese']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $solointerese['Solointerese']['id']), null, __('Are you sure you want to delete # %s?', $solointerese['Solointerese']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Solointerese'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cheque'), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
	</ul>
</div>
