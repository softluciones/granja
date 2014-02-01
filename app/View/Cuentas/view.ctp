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
<div class="cuentas view">
<table>
    <thead>
       
                 <th colspan="3" style="background:#cccccc; height: 50px; font-size: 20px;">
         <div align="center"> Cuenta</div>
                 </th>
            
         </thead>
         <tr style="background:#ffffff;">
		
		<td><?php echo __('Numero de Cuenta: '); echo h($cuenta['Cuenta']['numero']);?></td>
		<td><?php echo __('Banco: '); echo $this->Html->link($cuenta['Banco']['codigo'], array('controller' => 'bancos', 'action' => 'view', $cuenta['Banco']['id'])); ?></td>
		<td><?php echo __('Cliente: '); echo $this->Html->link($cuenta['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $cuenta['Cliente']['id'])); ?></td>	
         </tr>		
         <tr style="background:#ffffff;">
             <td colspan="3"><?php echo __('Usuario: '); echo $this->Html->link($cuenta['User']['username'], array('controller' => 'users', 'action' => 'view', $cuenta['User']['id'])); ?></dt>
		
         </tr>	
</table>		
		
		

</div>
<br></br>
<div class="actions">
	
	<ul>
            <li class="menu"><?php echo $this->Html->link(__('Editar Cuenta'), array('action' => 'edit', $cuenta['Cuenta']['id'])); ?> </li>
		<li class="menu"><?php echo $this->Form->postLink(__('Borrar Cuenta'), array('action' => 'delete', $cuenta['Cuenta']['id']), null, __('Are you sure you want to delete # %s?', $cuenta['Cuenta']['id'])); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Listar Cuentas'), array('action' => 'index')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Nueva Cuenta'), array('action' => 'add')); ?> </li>
		</ul>
</div>
