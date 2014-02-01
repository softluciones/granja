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
	
	<div class="box">
	<div class="title">        
            <strong style="color:#333; font-size:14px;"><div align="center" style="font-size: 20px;">Estado de Cheque</div></strong>
                       </div>
         <div class="content pages">
             <div class="row">
	<table cellpadding="0">
            <thead >
            <tr>
			
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('nomenclatura'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion','Descripción'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id', 'Usuario'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
        </thead>
	<?php foreach ($estadocheques as $estadocheque): ?>
	<tr>
		
		<td><?php echo h($estadocheque['Estadocheque']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($estadocheque['Estadocheque']['nomenclatura']); ?>&nbsp;</td>
		<td><?php echo h($estadocheque['Estadocheque']['descripcion']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($estadocheque['User']['username'], array('controller' => 'users', 'action' => 'view', $estadocheque['User']['id'])); ?>
		</td>
		<td class="acciones">
                    
                     <?php 
                                                echo $this->Html->image("ver.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Ver','url' => array('action' => 'view',$estadocheque['Estadocheque']['id'])));
			?>
                                    
                                    <?php #echo $this->Html->link(__('Ver'), array('action' => 'view', $cheque['Cheque']['id'])); ?>
			<?php  echo $this->Html->image("editar.fw.png", array("alt" => "Editar",'width' => '18', 'heigth' => '18','title'=>'Editar','url' => array('action' => 'edit', $estadocheque['Estadocheque']['id']))); ?>
			<?php 
                         $imagen= $this->Html->image("borrargrande.fw.png", array("alt" => "borrar",'width' => '18', 'heigth' =>'18','title'=>'Borrar'));
                                                 echo $this->Html->link($imagen, array('action' => 'delete', $estadocheque['Estadocheque']['id']), array('escape'=>false), sprintf(__('Seguro que quiere eliminar el registro?', $estadocheque['Estadocheque']['id'])));
                        
                   ?>
			</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
            'format' => __('Pagina {:page} de {:pages}, mostrando {:current} Registro de {:count} total, a partir del registro {:start}, y termina en {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('Atras'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
        </div>
             </div>
            </div>
</div>
    </div>

