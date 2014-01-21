<div class="capitals view">
<h2><?php echo __('Capital'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($capital['Capital']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($capital['Capital']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($capital['Capital']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Montocheque'); ?></dt>
		<dd>
			<?php echo h($capital['Capital']['montocheque']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Montointeres'); ?></dt>
		<dd>
			<?php echo h($capital['Capital']['montointeres']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Montoentregado'); ?></dt>
		<dd>
			<?php echo h($capital['Capital']['montoentregado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estadocheque'); ?></dt>
		<dd>
			<?php echo h($capital['Capital']['estadocheque']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pago'); ?></dt>
		<dd>
			<?php echo h($capital['Capital']['pago']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pagotercero'); ?></dt>
		<dd>
			<?php echo h($capital['Capital']['pagotercero']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total'); ?></dt>
		<dd>
			<?php echo h($capital['Capital']['total']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Motivo'); ?></dt>
		<dd>
			<?php echo h($capital['Capital']['motivo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Provienede'); ?></dt>
		<dd>
			<?php echo h($capital['Capital']['provienede']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Codigo'); ?></dt>
		<dd>
			<?php echo h($capital['Capital']['codigo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cheque Id'); ?></dt>
		<dd>
			<?php echo h($capital['Capital']['cheque_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($capital['User']['username'], array('controller' => 'users', 'action' => 'view', $capital['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Capital'), array('action' => 'edit', $capital['Capital']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Capital'), array('action' => 'delete', $capital['Capital']['id']), null, __('Are you sure you want to delete # %s?', $capital['Capital']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Capitals'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Capital'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
