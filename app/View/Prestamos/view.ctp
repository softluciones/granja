<div class="prestamos view">
<?php foreach ($prestamo['Cuota'] as $cuota): ?>
<table>
    <thead>
       
                 <th colspan="3" style="background:#cccccc; height: 50px; font-size: 20px;">
         <div align="center" style="color:#000000;"> Vista del Prestamo </div>
          </th>
    </thead>
    <tr>
        <td><?php echo __('<strong>Numero de Prestamo: </strong>');  echo h($prestamo['Prestamo']['id']); ?></td>
        <td><?php echo __('<strong>Cliente: </strong>'); echo $this->Html->link($prestamo['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $prestamo['Cliente']['id'])); ?></td>
        <td><?php echo __('Monto: '); echo h($prestamo['Prestamo']['monto']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('<strong>Fecha inicio: </strong>'); echo h($prestamo['Prestamo']['fechainicio']); ?></td>
        <td><?php echo __('<strong>Fecha fin: </strong>'); echo h($prestamo['Prestamo']['fechafin']); ?></td>
        <td><?php echo __('<strong>Monto deuda: <strong>'); echo h($prestamo['Prestamo']['montodeuda']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('<strong>Interes del prestamo: </strong>'); echo $this->Html->link($prestamo['Interesprestamo']['valor'], array('controller' => 'interesprestamos', 'action' => 'view', $prestamo['Interesprestamo']['id'])); ?></td>
        <td><?php echo __('<strong>Dias calculados: </strong>'); echo h($prestamo['Prestamo']['diascalculados']); ?></td>
        <td><?php echo __('<strong>Dias pagados: </strong>'); echo h($prestamo['Prestamo']['diaspagados']); ?></td>
    </tr>
    <tr>
        <td><?php #echo __('Aprobarprestamo'); echo h($prestamo['Prestamo']['aprobarprestamo']); ?></td>        
        <td><?php echo __('<strong>User: </strong>'); echo $this->Html->link($prestamo['User']['username'], array('controller' => 'users', 'action' => 'view', $prestamo['User']['id'])); ?></td>
        <td><?php echo __('<strong>Montocuota: <strong>'); echo $cuota['montocuota']; ?></td>
    </tr>
    <tr>
        <?php $var=date('Y-m-d'); ?>
        <?php if($prestamo['Prestamo']['diascalculados']==$prestamo['Prestamo']['diaspagados']){ ?>
            <td colspan="3" style="color: #0000FF; background: #E6B800"><?php echo __('<strong> ESTE PRESTAMO HA FINALIZADO. UD NO DEBE NADA</strong>'); ?></td>
        <?php }else 
           if($prestamo['Prestamo']['diaspagados']<$prestamo['Prestamo']['diascalculados']||$var2<$prestamo['Prestamo']['fechafin']){ ?>
            <td colspan="3" style="color: #ffffff; background: #EE5757;"><?php echo __('<strong> ESTE PRESTAMO AUN NO HA FINALIZADO. UD TIENE UN SALDO DEUDOR DE: </strong>'); echo "<strong>".h($prestamo['Prestamo']['montodeuda']." Bs. y debe ".($prestamo['Prestamo']['diascalculados']-$prestamo['Prestamo']['diaspagados'])." Cuotas"); ?></td>
            <?php }else{ 
                
            } ?>
    </tr>
</table>
    <?php endforeach; ?>
<br><br><br>

<div class="related"> 
        <table cellpadding = "0" cellspacing = "0">
        <thead>
                <th colspan="6" style="background:#cccccc; height: 50px; font-size: 20px;">
                <div align="center" style="color:#000000;"> Garantia </div>
                </th>
        </thead>
	<?php if (!empty($prestamo['Garantia'])): ?>
    
	<tr>
		<th><?php echo __('Codigo de la Garantia'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Montoquecubre'); ?></th>
		<th><?php echo __('Pertenecea'); ?></th>
		<th><?php echo __('Tipogarantia Id'); ?></th>
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
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'garantias', 'action' => 'view', $garantia['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'garantias', 'action' => 'edit', $garantia['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'garantias', 'action' => 'delete', $garantia['id']), null, __('Are you sure you want to delete # %s?', $garantia['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
<?php endif; ?>
                <tr>
                    <td colspan="6">
                        <div class="actions">
                            <ul>
                                <li><?php echo $this->Html->link(__('Agregar Garantia'), array('controller' => 'garantias', 'action' => 'add')); ?> </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                    
    </table>


	
</div>
<div class="related">
	<h3><?php echo __('Gestion de cobranza'); ?></h3>
	<?php if (!empty($prestamo['Gestiondecobranzaprestamo'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Codigo'); ?></th>
		<th><?php echo __('Fecha'); ?></th>
		<th><?php echo __('Descripción'); ?></th>
		<th class="actions"><?php echo __('Operaciones'); ?></th>
	</tr>
	<?php foreach ($prestamo['Gestiondecobranzaprestamo'] as $gestiondecobranzaprestamo): ?>
		<tr>
			<td><?php echo $gestiondecobranzaprestamo['Codigo']; ?></td>
			<td><?php echo $gestiondecobranzaprestamo['created']; ?></td>
			<td><?php echo $gestiondecobranzaprestamo['descripcion']; ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Gestión de Cobranza'), array('controller' => 'gestiondecobranzaprestamos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Transaccion de prestamo'); ?></h3>
	<?php if (!empty($prestamo['Transaccionprestamointere'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Registro de transaccion'); ?></th>
		<th><?php echo __('Monto interes'); ?></th>
		<th><?php echo __('Fecha inicio acumulación'); ?></th>
                <th><?php echo __('Fecha Modificación'); ?></th>
		<th><?php echo __('Monto deuda capital'); ?></th>
                <th><?php echo __('Monto deuda capital + interes'); ?></th>
		<th><?php echo __('Registro de pago #'); ?></th>
		<th class="actions"><?php #echo __('Actions'); ?></th>
	</tr>
	<?php  foreach ($prestamo['Transaccionprestamointere'] as $transaccionprestamointere):                   
            ?>
		<tr>
			<td><?php echo $transaccionprestamointere['id']; ?></td>
			<td><?php echo $transaccionprestamointere['montointeres']; ?></td>
			<td><?php echo $transaccionprestamointere['fecha']; ?></td>
                        <td><?php echo $transaccionprestamointere['fechamodificacion']; ?></td>
			<td><?php echo $transaccionprestamointere['montodeuda']; ?></td>
                        <td><?php echo $transaccionprestamointere['montodeuda']+$transaccionprestamointere['montointeres']; ?></td>
                        <td><?php 
                        if($transaccionprestamointere['pagodeprestamo_id']!=NULL)
                        echo $transaccionprestamointere['Pagodeprestamo']['montopagado']." Bs"; ?></td>
			<td class="actions">
				<?php /*echo $this->Html->link(__('View'), array('controller' => 'transaccionprestamointeres', 'action' => 'view', $transaccionprestamointere['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'transaccionprestamointeres', 'action' => 'edit', $transaccionprestamointere['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transaccionprestamointeres', 'action' => 'delete', $transaccionprestamointere['id']), null, __('Are you sure you want to delete # %s?', $transaccionprestamointere['id']));*/ ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php #echo $this->Html->link(__('New Transaccionprestamointere'), array('controller' => 'transaccionprestamointeres', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

</div>
<div class="actions">
	<h3><?php echo __('Aciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Prestamo'), array('action' => 'edit', $prestamo['Prestamo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Borrar Prestamo'), array('action' => 'delete', $prestamo['Prestamo']['id']), null, __('Are you sure you want to delete # %s?', $prestamo['Prestamo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Prestamos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Prestamo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Interes prestamos'), array('controller' => 'interesprestamos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Interes prestamo'), array('controller' => 'interesprestamos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Usuarios'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Garantias'), array('controller' => 'garantias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Garantia'), array('controller' => 'garantias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Gestion de cobranza prestamos'), array('controller' => 'gestiondecobranzaprestamos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Gestion de cobranza prestamo'), array('controller' => 'gestiondecobranzaprestamos', 'action' => 'add')); ?> </li>
	</ul>
</div>
