<style>

input[type=submit],
.acciones ul li a,
.accionrs a {
        background: none;
        padding: 0px;
        border: none;
        -webkit-border-radius: 0;
	-moz-border-radius: 0;
	border-radius: none;
	text-decoration: none;
	text-shadow: 0;
	min-width: 0;
	-moz-box-shadow: 0;
	-webkit-box-shadow: none;
	box-shadow: 0;
}
.acciones ul li a:hover,
.acciones a:hover {
	background: none;
        padding: 0px;
        border: none;
}

</style>
<div class="cuentas index">
	<div class="box">
	<div class="title">        
            <strong style="color:#333; font-size:14px;"><div align="center" style="font-size: 20px;">Cuentas</div></strong>
                       </div>
         <div class="content pages">
             <div class="row">
                 
	<table cellpadding="0" cellspacing="0">
              <thead>
	<tr>
			
			<th><?php echo $this->Paginator->sort('numero','Número de Cuenta'); ?></th>
			<th><?php echo $this->Paginator->sort('banco_id','Banco'); ?></th>
			<th><?php echo $this->Paginator->sort('cliente_id', 'Cliente'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id','Usuarios'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
        </thead>
	<?php foreach ($cuentas as $cuenta): ?>
	<tr>
		
		<td><?php echo h($cuenta['Cuenta']['numero']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cuenta['Banco']['codigo'], array('controller' => 'bancos', 'action' => 'view', $cuenta['Banco']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($cuenta['Cliente']['apodo'], array('controller' => 'clientes', 'action' => 'view', $cuenta['Cliente']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($cuenta['User']['username'], array('controller' => 'users', 'action' => 'view', $cuenta['User']['id'])); ?>
		</td>
		<td class="acciones">
                     <?php
                                             echo $this->Html->image("ver.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Ver','url' => array('action' => 'view',$cuenta['Cuenta']['id'])));
			?>
                                    
                                    <?php #echo $this->Html->link(__('Ver'), array('action' => 'view', $cheque['Cheque']['id'])); ?>
			<?php  echo $this->Html->image("editar.fw.png", array("alt" => "Editar",'width' => '18', 'heigth' => '18','title'=>'Editar','url' => array('action' => 'edit', $cuenta['Cuenta']['id']))); ?>
			<?php 
                         $imagen= $this->Html->image("borrargrande.fw.png", array("alt" => "borrar",'width' => '18', 'heigth' =>'18','title'=>'Borrar'));
                                                 echo $this->Html->link($imagen, array('action' => 'delete', $cuenta['Cuenta']['id']), array('escape'=>false), sprintf(__('Seguro que quiere eliminar el registro?', $cuenta['Cuenta']['id'])));
                        
                   ?>
			</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página {:page} de {:pages}, mostrando {:current} registros de {:count} en total, iniciando en {:start}, finalizando en {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
             </div>
             </div>
     </div>
<br></br>    
<div class="actions">
	
	<ul>
		<li><?php echo $this->Html->link(__('Nueva Cuenta'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Bancos'), array('controller' => 'bancos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Banco'), array('controller' => 'bancos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
	</ul>
</div>
