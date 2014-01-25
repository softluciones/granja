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

<div class="bancos index">
    
    <div class="box">
	<div class="title">        
            <strong style="color:#333; font-size:14px;"><div align="center" style="font-size: 20px;">Bancos</div></strong>
                       </div>
         <div class="content pages">
             <div class="row">
	<table cellpadding="0" cellspacing="0">
            <thead>
                <tr style="height: 30px;">
			
			<th scope="col"><?php echo $this->Paginator->sort('codigo', 'Código'); ?></th>
			<th scope="col"><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th scope="col"><?php echo $this->Paginator->sort('descripcion','Descripción'); ?></th>
			<th scope="col"><?php echo $this->Paginator->sort('user_id','Registrado por'); ?></th>
			<th class="actions"><?php echo __('Acciones de'); ?></th>
	</tr>
        </thead>
	<?php foreach ($bancos as $banco): ?>
	<tr>
		 
		<td><?php echo h($banco['Banco']['codigo']); ?>&nbsp;</td>
		<td><?php echo h($banco['Banco']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($banco['Banco']['descripcion']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($banco['User']['username'], array('controller' => 'users', 'action' => 'view', $banco['User']['id'])); ?>
		</td>
		<td class="acciones">
                    <?php 
                                echo $this->Html->image("ver.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Ver','url' => array('action' => 'view',  $banco['Banco']['id'])));
 ?>
				
				<?php
                                 echo $this->Html->image("editar.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Editar','url' => array('action' => 'edit',  $banco['Banco']['id'])));
                            ?>
				<?php
                                $imagen= $this->Html->image("borrargrande.fw.png", array("alt" => "borrar",'width' => '18', 'heigth' =>'18','title'=>'Borrar'));
                                                 echo $this->Html->link($imagen, array('action' => 'delete', $banco['Banco']['id']), array('escape'=>false), sprintf(__('Seguro que quiere eliminar el registro?', $banco['Banco']['id'])));
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
<br></br>
<div class="actions">

	<ul>
		<li align="center"><?php echo $this->Html->link(__('Nuevo Banco'), array('action' => 'add')); ?></li>
		<li align="center"><?php echo $this->Html->link(__('Lista Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li align="center"><?php echo $this->Html->link(__('Nuevo Cheque'), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
		<li align="center"><?php echo $this->Html->link(__('Lista Cuentas'), array('controller' => 'cuentas', 'action' => 'index')); ?> </li>
		<li align="center"><?php echo $this->Html->link(__('Nueva Cuenta'), array('controller' => 'cuentas', 'action' => 'add')); ?> </li>
	</ul>
</div>
