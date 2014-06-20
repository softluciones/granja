<div class="prestamos index">
	<h2><?php echo __('Prestamos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('Codigo del prestamo'); ?></th>
			<th><?php echo $this->Paginator->sort('cliente_id'); ?></th>
			<th><?php echo $this->Paginator->sort('monto'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha inicio'); ?></th>
                        <th><?php echo $this->Paginator->sort('fecha fin'); ?></th>
			
			<th><?php echo $this->Paginator->sort('monto deuda'); ?></th>
			<th><?php echo $this->Paginator->sort('% en interes'); ?></th>
                        <th><?php echo $this->Paginator->sort('dias calculados'); ?></th>
                        <th><?php echo $this->Paginator->sort('dias pagados'); ?></th>

			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($prestamos as $prestamo): ?>
	<tr>
		<td>
                    <?php echo $this->Html->link(__($prestamo['Prestamo']['id']), array('action' => 'view', $prestamo['Prestamo']['id'])); ?>
                </td>
		<td>
			<?php echo $this->Html->link($prestamo['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $prestamo['Cliente']['id'])); ?>
		</td>
		<td><?php echo h($prestamo['Prestamo']['monto']); ?>&nbsp;</td>
		<td><?php echo h($prestamo['Prestamo']['fechainicio']); ?>&nbsp;</td>
                <td><?php echo h($prestamo['Prestamo']['fechafin']); ?>&nbsp;</td>
		
		<td><?php echo h($prestamo['Prestamo']['montodeuda']); ?>&nbsp;</td>
		<td><?php echo h($prestamo['Interesprestamo']['valor']); ?></td>
                <td><?php echo h($prestamo['Prestamo']['diascalculados']); ?>&nbsp;</td>
                <td><?php echo h($prestamo['Prestamo']['diaspagados']); ?>&nbsp;</td>

		<td>
			<?php echo $this->Html->link($prestamo['User']['username'], array('controller' => 'users', 'action' => 'view', $prestamo['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $prestamo['Prestamo']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $prestamo['Prestamo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $prestamo['Prestamo']['id']), null, __('Desea borrar el prestamo # %s?', $prestamo['Prestamo']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Prestamo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Interesprestamos'), array('controller' => 'interesprestamos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Interesprestamo'), array('controller' => 'interesprestamos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cuotas'), array('controller' => 'cuotas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cuota'), array('controller' => 'cuotas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Garantias'), array('controller' => 'garantias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Garantia'), array('controller' => 'garantias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gestiondecobranzaprestamos'), array('controller' => 'gestiondecobranzaprestamos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gestiondecobranzaprestamo'), array('controller' => 'gestiondecobranzaprestamos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transaccionprestamointeres'), array('controller' => 'transaccionprestamointeres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaccionprestamointere'), array('controller' => 'transaccionprestamointeres', 'action' => 'add')); ?> </li>
	</ul>
</div>
