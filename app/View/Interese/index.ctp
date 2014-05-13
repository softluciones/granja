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

<div class="interese index">
	<div class="box">
	<div class="title">        
            <strong style="color:#333; font-size:14px;"><div align="center" style="font-size: 20px;">Interes</div></strong>
                       </div>
         <div class="content pages">
             <div class="row">
	<table cellpadding="0">
            <thead >
	<tr>
			
			
			<th><?php echo $this->Paginator->sort('minimo'); ?></th>
			<th><?php echo $this->Paginator->sort('maximo'); ?></th>
			<th><?php echo $this->Paginator->sort('montofijo'); ?></th>
			<th><?php echo $this->Paginator->sort('porcentaje'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
            </thead>
	<?php 
 
        foreach ($interese as $interese): ?>
	<tr>
		
		
		<td><?php echo h($interese['Interese']['minimo']); ?></td>
		<td><?php echo h($interese['Interese']['maximo']); ?>&nbsp;</td>
		<td><?php echo h($interese['Interese']['montofijo']); ?>&nbsp;</td>
		<td><?php 
                if($interese['Interese']['porcentaje'])
                    echo h($interese['Interese']['porcentaje'].'%'); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($interese['User']['username'], array('controller' => 'users', 'action' => 'view', $interese['User']['id'])); ?>
		</td>
                <td class="acciones">
                   
                   
                                    
                                   
			<?php  echo $this->Html->image("editar.fw.png", array("alt" => "Editar",'width' => '18', 'heigth' => '18','title'=>'Editar','url' => array('action' => 'edit',$interese['Interese']['id']))); ?>
			<?php
                        
                        $puedoborrar=count($interese['Cheque']);
                        if($puedoborrar==0){
                        $imagen= $this->Html->image("borrargrande.fw.png", array("alt" => "borrar",'width' => '18', 'heigth' =>'18','title'=>'Borrar'));
										echo $this->Html->link($imagen, array('action' => 'delete', $interese['Interese']['id']), array('escape'=>false), sprintf(__('Seguro que quiere eliminar el registro?', $interese['Interese']['id'])));
                        }
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
            <li class="menu"><?php echo $this->Html->link(__('Nuevo Interes'), array('action' => 'add')); ?></li>
           </ul>
</div>
