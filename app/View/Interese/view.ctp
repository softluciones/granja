<div class="interese view">
<h2><?php echo __('Interese'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($interese['Interese']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($interese['Interese']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vigencia'); ?></dt>
		<dd>
			<?php echo h($interese['Interese']['vigencia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Minimo'); ?></dt>
		<dd>
			<?php echo h($interese['Interese']['minimo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Maximo'); ?></dt>
		<dd>
			<?php echo h($interese['Interese']['maximo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Montofijo'); ?></dt>
		<dd>
			<?php echo h($interese['Interese']['montofijo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Porcentaje'); ?></dt>
		<dd>
			<?php echo h($interese['Interese']['porcentaje']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($interese['Interese']['tipo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($interese['User']['username'], array('controller' => 'users', 'action' => 'view', $interese['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Interese'), array('action' => 'edit', $interese['Interese']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Interese'), array('action' => 'delete', $interese['Interese']['id']), null, __('Are you sure you want to delete # %s?', $interese['Interese']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Interese'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Interese'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Chequeinterese'), array('controller' => 'chequeinterese', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chequeinterese'), array('controller' => 'chequeinterese', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Chequeinterese'); ?></h3>
	<?php if (!empty($interese['Chequeinterese'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Deudaactual'); ?></th>
		<th><?php echo __('Deudaintereses'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Cheque Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($interese['Chequeinterese'] as $chequeinterese): ?>
		<tr>
			<td><?php echo $chequeinterese['id']; ?></td>
			<td><?php echo $chequeinterese['deudaactual']; ?></td>
			<td><?php echo $chequeinterese['deudaintereses']; ?></td>
			<td><?php echo $chequeinterese['created']; ?></td>
			<td><?php echo $chequeinterese['cheque_id']; ?></td>
			<td><?php echo $chequeinterese['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'chequeinterese', 'action' => 'view', $chequeinterese['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'chequeinterese', 'action' => 'edit', $chequeinterese['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'chequeinterese', 'action' => 'delete', $chequeinterese['id']), null, __('Are you sure you want to delete # %s?', $chequeinterese['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Chequeinterese'), array('controller' => 'chequeinterese', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
