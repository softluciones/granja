<div class="solointerese view">
<h2><?php echo __('Solointerese'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($solointerese['Solointerese']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Monto'); ?></dt>
		<dd>
			<?php echo h($solointerese['Solointerese']['monto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Montointereses'); ?></dt>
		<dd>
			<?php echo h($solointerese['Solointerese']['montointereses']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cheque'); ?></dt>
		<dd>
			<?php echo $this->Html->link($solointerese['Cheque']['numerodecheque'], array('controller' => 'cheques', 'action' => 'view', $solointerese['Cheque']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Interese Id'); ?></dt>
		<dd>
			<?php echo h($solointerese['Solointerese']['interese_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado'); ?></dt>
		<dd>
			<?php echo h($solointerese['Solointerese']['estado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cobrado'); ?></dt>
		<dd>
			<?php echo h($solointerese['Solointerese']['cobrado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha'); ?></dt>
		<dd>
			<?php echo h($solointerese['Solointerese']['fecha']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Solointerese'), array('action' => 'edit', $solointerese['Solointerese']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Solointerese'), array('action' => 'delete', $solointerese['Solointerese']['id']), null, __('Are you sure you want to delete # %s?', $solointerese['Solointerese']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Solointerese'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Solointerese'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cheque'), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Solointerese'), array('controller' => 'solointerese', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Interese'), array('controller' => 'solointerese', 'action' => 'add')); ?> </li>
	</ul>
</div>
