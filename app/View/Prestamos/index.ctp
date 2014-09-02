<div class="prestamos index">
    <table cellpadding="0" cellspacing="0">
	<tr>
			<thead>
                            <th colspan="12" style="background:#cccccc; height: 50px; font-size: 20px;">
                                <div align="center" style="color:#000;"> Listado de Prestamos </div>
                        </th>
                        </thead>
                        <th><?php echo $this->Paginator->sort('Codigo del prestamo'); ?></th>
			<th><?php echo $this->Paginator->sort('cliente_id'); ?></th>
			<th><?php echo $this->Paginator->sort('monto'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha inicio'); ?></th>
                        <th><?php echo $this->Paginator->sort('fecha fin'); ?></th>
			<th><?php echo $this->Paginator->sort('montodeuda'); ?></th>
			<th><?php echo $this->Paginator->sort('interesprestamo_id'); ?></th>
			<th><?php echo $this->Paginator->sort('diascalculados'); ?></th>
			<th><?php echo $this->Paginator->sort('diaspagados'); ?></th>
			<th><?php echo $this->Paginator->sort('aprobarprestamo'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
        <?php foreach ($prestamos as $prestamo): ?>
        <tr>
            <?php #debug($prestamo); exit(0);?>
            <?php $var=date('Y-m-d');
            #debug($var<$prestamo['Prestamo']['fechafin']&&$prestamo['Prestamo']['diascalculados']>$prestamo['Prestamo']['diaspagados']);
               ?>
                <td><?php echo h($prestamo['Prestamo']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($prestamo['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $prestamo['Cliente']['id'])); ?>
		</td>
		<td><?php echo h($prestamo['Prestamo']['monto']); ?>&nbsp;</td>
		<td><?php echo h($prestamo['Prestamo']['fechainicio']); ?>&nbsp;</td>
                <td><?php echo h($prestamo['Prestamo']['fechafin']); ?>&nbsp;</td>
		<td><?php echo h($prestamo['Prestamo']['montodeuda']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($prestamo['Interesprestamo']['valor'], array('controller' => 'interesprestamos', 'action' => 'view', $prestamo['Interesprestamo']['id'])); ?>
		</td>
		<td><?php echo h($prestamo['Prestamo']['diascalculados']); ?>&nbsp;</td>
		<td><?php echo h($prestamo['Prestamo']['diaspagados']); ?>&nbsp;</td>
		<td><?php echo h($prestamo['Prestamo']['aprobarprestamo']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($prestamo['User']['username'], array('controller' => 'users', 'action' => 'view', $prestamo['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php 
                            echo $this->Html->image("pagar.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Pagar','url' => array('controller'=>'pagodeprestamos','action' => 'add'.'/'.$prestamo['Prestamo']['id'],$prestamo['Interesprestamo']['tipoprestamo'])));     
                        ?>
                    
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $prestamo['Prestamo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $prestamo['Prestamo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $prestamo['Prestamo']['id']), null, __('Desea borrar el prestamo # %s?', $prestamo['Prestamo']['id'])); ?>
		</td>
        </tr>
            <?php endforeach; ?>
    </table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nuevo Prestamo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Lista Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
	</ul>
</div>	