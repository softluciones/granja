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
li.menu{
          text-align: center;
      }

</style>
<div class="clientes index">
 <div class="box">
	<div class="title">        
            <strong style="color:#333; font-size:14px;"><div align="center" style="font-size: 20px;">Clientes</div></strong>
                       </div>
         <div class="content pages">
             <div class="row">
	<table cellpadding="0">
            <thead >
	<tr style="height: 30px;">
			
			
			<th><?php echo $this->Paginator->sort('cedula'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('apellido'); ?></th>
			<th><?php echo $this->Paginator->sort('apodo'); ?></th>
			<th><?php echo $this->Paginator->sort('negocio'); ?></th>
			<th><?php echo $this->Paginator->sort('direccion'); ?></th>
			<th><?php echo $this->Paginator->sort('telefonofijo','Fijo'); ?></th>
			<th><?php echo $this->Paginator->sort('telefonocelular','Celular'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id', 'Usuario'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
        </tr>
        </thead>
	<?php foreach ($clientes as $cliente): ?>
	<tr>
		
		<td><?php echo h($cliente['Cliente']['cedula']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['apellido']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['apodo']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['negocio']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['direccion']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['telefonofijo']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['telefonocelular']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['email']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cliente['User']['username'], array('controller' => 'users', 'action' => 'view', $cliente['User']['id'])); ?>
		</td>
                <td class="acciones">
                    
                        <?php 
                                                echo $this->Html->image("ver.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Ver','url' => array('action' => 'view',$cliente['Cliente']['id'])));
			?>
                                    
                                    <?php #echo $this->Html->link(__('Ver'), array('action' => 'view', $cheque['Cheque']['id'])); ?>
			<?php  echo $this->Html->image("editar.fw.png", array("alt" => "Editar",'width' => '18', 'heigth' => '18','title'=>'Editar','url' => array('action' => 'edit', $cliente['Cliente']['id']))); ?>
			<?php 
                         $imagen= $this->Html->image("borrargrande.fw.png", array("alt" => "borrar",'width' => '18', 'heigth' =>'18','title'=>'Borrar'));
                                                 echo $this->Html->link($imagen, array('action' => 'delete', $cliente['Cliente']['id']), array('escape'=>false), sprintf(__('Seguro que quiere eliminar el registro?', $cliente['Cliente']['id'])));
                        
                   ?>
                </td>
		
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página {:page} de {:pages}, mostrando {:current} registros de {:count} en total, iniciando en {:start}, terminando en {:end}')
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
		<li align="center"><?php echo $this->Html->link(__('Nuevo Cliente'), array('action' => 'add')); ?></li>
		<li align="center"><?php echo $this->Html->link(__('Listar Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li align="center"><?php echo $this->Html->link(__('Nuevo Cheque'), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
	</ul>
</div>
