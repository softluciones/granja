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

<div class="tipopagos index">
	<div class="box">
	<div class="title">        
            <strong style="color:#333; font-size:14px;"><div align="center" style="font-size: 20px;">Formas de Pago</div></strong>
                       </div>
         <div class="content pages">
             <div class="row">
	<table cellpadding="0">
            <thead >
	<tr>
		
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion','Descripción'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id','Usuario Registro'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
          </thead>
	<?php foreach ($tipopagos as $tipopago): ?>
	<tr>
		
		<td><?php echo h($tipopago['Tipopago']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($tipopago['Tipopago']['descripcion']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tipopago['User']['username'], array('controller' => 'users', 'action' => 'view', $tipopago['Tipopago']['id'])); ?>
		</td>
		<td class="acciones">
                   
                   
                                    
                                   
			<?php  echo $this->Html->image("editar.fw.png", array("alt" => "Editar",'width' => '18', 'heigth' => '18','title'=>'Editar','url' => array('action' => 'edit', $tipopago['Tipopago']['id']))); ?>
			

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

