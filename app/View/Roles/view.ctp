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
<div class="roles view">
<table>
    <thead>
       
                 <th colspan="2" style="background:#cccccc; height: 50px; font-size: 20px;">
         <div align="center"> Rol</div>
                 </th>
            
         </thead>
	<tr>
		
		<td><?php echo __('Nombre: '); echo h($role['Role']['nombre']); ?></td>
		<td><?php echo __('Descripción: '); echo h($role['Role']['descripcion']); ?></td>
		
	</tr>
</table>


<div class="box">
  
             <div class="title">        
	<strong style="color:#333; font-size:14px;"><?php echo __('Usuarios');?></strong>
                       </div>      
    <div class="content pages">
        <div class="row">
	<?php if (!empty($role['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
              <thead>
	<tr>
		
		<th><?php echo __('Nombre de Usuario'); ?></th>
		
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Apellido'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
              </thead>
	<?php foreach ($role['User'] as $user): ?>
		<tr>
			
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['nombre']; ?></td>
			<td><?php echo $user['apellido']; ?></td>
			<td class="acciones">
                            
                            
                            <?php 
                                echo $this->Html->image("ver.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Ver','url' => array('controller' => 'users', 'action' => 'view', $user['id'])));
 ?>
				
				</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

    </div>

<br>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
        </div>
</div>
<br></br>
<div class="actions">
		<ul>
                    <li class="menu"><?php echo $this->Html->link(__('Listar Roles'), array('action' => 'index')); ?> </li>
                    <li class="menu"><?php echo $this->Html->link(__('Listar Usuarios'), array('controller' => 'users', 'action' => 'index')); ?> </li>
                    <li class="menu"><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>