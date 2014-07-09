<div class="prestamos view">


<table>
    <thead>
            <th colspan="3" style="background:#cccccc; height: 50px; font-size: 20px;">
                <div align="center" style="color:#fff;"> Prestamo N°: <?php echo h($prestamo['Prestamo']['id']); ?> </div>
            </th>
    </thead>
    <tr>
        <td><?php echo __('Codigo del Prestamo:')." ".h($prestamo['Prestamo']['id']); ?></td>
        <td><?php echo __('Cliente:')." ".$this->Html->link($prestamo['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $prestamo['Cliente']['id'])); ?></td>
        <td><?php echo __('Monto:')." ".h($prestamo['Prestamo']['monto']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Fechainicio:')." ".h($prestamo['Prestamo']['fechainicio']); ?></td>
        <td><?php echo __('Fechafin:')." ".h($prestamo['Prestamo']['fechafin']); ?></td>
        <td><?php echo __('Montodeuda:')." ".h($prestamo['Prestamo']['montodeuda']);; ?></td>
    </tr>
    <tr>
        <td><?php echo __('Dias Calculados:')." ".h($prestamo['Prestamo']['diascalculados']); ?></td>
        <td><?php echo __('Dias Pagados:')." ".h($prestamo['Prestamo']['diaspagados']); ?></td>
        <td></td>
    </tr>
    <tr>
        <td><?php echo __('Interesprestamo:')." ".$this->Html->link($prestamo['Interesprestamo']['valor'], array('controller' => 'interesprestamos', 'action' => 'view', $prestamo['Interesprestamo']['id']));; ?></td>
        <td><?php echo __('Registrado por:')." ".$this->Html->link($prestamo['User']['username'], array('controller' => 'users', 'action' => 'view', $prestamo['User']['id'])); ?></td>
        <td></td>
    </tr>
    
</table>
<br><br>
<div class="related">
	<h3></h3>
	<?php if (!empty($prestamo['Cuota'])): ?>
	<table cellpadding = "0" cellspacing = "0">
        <thead>
            <th colspan="4" style="background:#cccccc; height: 50px; font-size: 20px;">
                <div align="center" style="color:#fff;"> Cuotas a pagar diarias </div>
            </th>
        </thead>    
	<tr>
		
		<th><?php echo __('Fecha inicio'); ?></th>
		<th><?php echo __('Fecha fin'); ?></th>
		<th><?php echo __('Nro cuotas'); ?></th>
		<th><?php echo __('Monto cuota diaria'); ?></th>
		
		
	</tr>
	<?php foreach ($prestamo['Cuota'] as $cuota): ?>
		<tr>
		
			<td><?php echo $cuota['fechaini']; ?></td>
			<td><?php echo $cuota['fechafin']; ?></td>
			<td><?php echo $cuota['nrocuotas']; ?></td>
			<td><?php echo $cuota['montocuota']; ?></td>
			
			
		</tr>
	<?php endforeach; ?>
                <tr>
                    <th colspan="4">
                    <div class="actions">
                        <ul>
                            <li><?php echo $this->Html->link(__('New Cuota'), array('controller' => 'cuotas', 'action' => 'add')); ?> </li>
                        </ul>
                    </div> </th>
                    
                </tr>
	</table>
<?php endif; ?>

	
</div>
<div class="related">
	<h3><?php echo __('Related Garantias'); ?></h3>
	<?php if (!empty($prestamo['Garantia'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Montoquecubre'); ?></th>
		<th><?php echo __('Pertenecea'); ?></th>
		<th><?php echo __('Tipogarantia Id'); ?></th>
		<th><?php echo __('Prestamo Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($prestamo['Garantia'] as $garantia): ?>
		<tr>
			<td><?php echo $garantia['id']; ?></td>
			<td><?php echo $garantia['nombre']; ?></td>
			<td><?php echo $garantia['descripcion']; ?></td>
			<td><?php echo $garantia['montoquecubre']; ?></td>
			<td><?php echo $garantia['pertenecea']; ?></td>
			<td><?php echo $garantia['tipogarantia_id']; ?></td>
			<td><?php echo $garantia['prestamo_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'garantias', 'action' => 'view', $garantia['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'garantias', 'action' => 'edit', $garantia['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'garantias', 'action' => 'delete', $garantia['id']), null, __('Are you sure you want to delete # %s?', $garantia['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Garantia'), array('controller' => 'garantias', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Gestiondecobranzaprestamos'); ?></h3>
	<?php if (!empty($prestamo['Gestiondecobranzaprestamo'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Prestamo Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($prestamo['Gestiondecobranzaprestamo'] as $gestiondecobranzaprestamo): ?>
		<tr>
			<td><?php echo $gestiondecobranzaprestamo['id']; ?></td>
			<td><?php echo $gestiondecobranzaprestamo['created']; ?></td>
			<td><?php echo $gestiondecobranzaprestamo['descripcion']; ?></td>
			<td><?php echo $gestiondecobranzaprestamo['prestamo_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'gestiondecobranzaprestamos', 'action' => 'view', $gestiondecobranzaprestamo['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'gestiondecobranzaprestamos', 'action' => 'edit', $gestiondecobranzaprestamo['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'gestiondecobranzaprestamos', 'action' => 'delete', $gestiondecobranzaprestamo['id']), null, __('Are you sure you want to delete # %s?', $gestiondecobranzaprestamo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Gestiondecobranzaprestamo'), array('controller' => 'gestiondecobranzaprestamos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">

	<h3><?php echo __('Related Transaccionprestamointeres'); ?></h3>
	<?php if (!empty($prestamo['Transaccionprestamointere'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Prestamo Id'); ?></th>
		<th><?php echo __('Montointeres'); ?></th>
		<th><?php echo __('Fecha'); ?></th>
		<th><?php echo __('Montodeuda'); ?></th>
		<th><?php echo __('Pagodeprestamo Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($prestamo['Transaccionprestamointere'] as $transaccionprestamointere): ?>
		<tr>
			<td><?php echo $transaccionprestamointere['id']; ?></td>
			<td><?php echo $transaccionprestamointere['prestamo_id']; ?></td>
			<td><?php echo $transaccionprestamointere['montointeres']; ?></td>
			<td><?php echo $transaccionprestamointere['fecha']; ?></td>
			<td><?php echo $transaccionprestamointere['montodeuda']; ?></td>
			<td><?php echo $transaccionprestamointere['pagodeprestamo_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'transaccionprestamointeres', 'action' => 'view', $transaccionprestamointere['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'transaccionprestamointeres', 'action' => 'edit', $transaccionprestamointere['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transaccionprestamointeres', 'action' => 'delete', $transaccionprestamointere['id']), null, __('Are you sure you want to delete # %s?', $transaccionprestamointere['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Transaccionprestamointere'), array('controller' => 'transaccionprestamointeres', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
       
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Prestamo'), array('action' => 'edit', $prestamo['Prestamo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Prestamo'), array('action' => 'delete', $prestamo['Prestamo']['id']), null, __('Are you sure you want to delete # %s?', $prestamo['Prestamo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Prestamos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prestamo'), array('action' => 'add')); ?> </li>
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

