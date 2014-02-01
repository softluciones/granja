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
<div class="estadocheques view">
<table>
    <thead>
       
                 <th colspan="2" style="background:#cccccc; height: 50px; font-size: 20px;">
         <div align="center"> Estado de Cheque</div>
                 </th>
            
         </thead>
         <tr style="background:#ffffff;">
		<td><?php echo __('Nombre: '); echo h($estadocheque['Estadocheque']['nombre']);?></td>
		<td><?php echo __('Nomenclatura: '); echo h($estadocheque['Estadocheque']['nomenclatura']);?></td>
		
	
               </tr>
               <tr style="background:#ffffff;">
                   <td colspan="2"><?php echo __('Descripción: '); echo h($estadocheque['Estadocheque']['descripcion']);?></td>
		
		
	
               </tr>
		<tr style="background:#ffffff;">
		<td><?php echo __('Usuario: '); echo h($estadocheque['Estadocheque']['nombre']);?></td>
		<td><?php echo $this->Html->link($estadocheque['User']['username'], array('controller' => 'users', 'action' => 'view', $estadocheque['User']['id'])); ?></td>
		
	
               </tr>
		
</table>
</div>
<br></br>
<div class="actions">

	<ul>
            <li class="menu"><?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $estadocheque['Estadocheque']['id'])); ?> </li>
            <li class="menu"><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $estadocheque['Estadocheque']['id']), null, __('Estas Seguro de borrar este Estado del cheque: %s?', $estadocheque['Estadocheque']['nombre'])); ?> </li>
            <li class="menu"><?php echo $this->Html->link(__('Listar'), array('action' => 'index')); ?> </li>
		</ul>
</div>
