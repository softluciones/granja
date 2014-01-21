<div class="gestiondecobranzas view">
<h2><?php echo __('Gestiondecobranza'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($gestiondecobranza['Gestiondecobranza']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($gestiondecobranza['Gestiondecobranza']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($gestiondecobranza['Gestiondecobranza']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cheque'); ?></dt>
		<dd>
			<?php echo $this->Html->link($gestiondecobranza['Cheque']['numerodecheque'], array('controller' => 'cheques', 'action' => 'view', $gestiondecobranza['Cheque']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($gestiondecobranza['User']['username'], array('controller' => 'users', 'action' => 'view', $gestiondecobranza['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Gestiondecobranza'), array('action' => 'edit', $gestiondecobranza['Gestiondecobranza']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Gestiondecobranza'), array('action' => 'delete', $gestiondecobranza['Gestiondecobranza']['id']), null, __('Are you sure you want to delete # %s?', $gestiondecobranza['Gestiondecobranza']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Gestiondecobranzas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gestiondecobranza'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cheque'), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
