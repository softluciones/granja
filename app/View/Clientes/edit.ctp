<style>
      th{
          background: #ffffff;
      }
      tbody tr:hover th{
          background: #ffffff;
      }
      li.menu{
          text-align: center;
      }
  </style>
<div class="clientes form">
<?php echo $this->Form->create('Cliente'); ?>
           <table>
                <thead>
		<th colspan="3" style="background:#cccccc; height: 50px; font-size: 20px;"><div align="center"><?php echo __('Editar Cliente'); ?></div></th>
                
                </thead>
                    <tr>
                        <th colspan="3"><div align="center">Datos personales</div></th>
                    </tr>
                    <tr>
                        <th><?php echo $this->Form->input('cedula'); ?></th>
                        <th><?php echo $this->Form->input('nombre'); ?></th>
                        <th><?php echo $this->Form->input('apellido'); ?></th>
                    </tr>
                    <tr>
                        <th><?php echo $this->Form->input('apodo'); ?></th>
                        <th><?php echo $this->Form->input('negocio'); ?></th>
                        <th><?php echo $this->Form->input('email'); ?></th>
                    </tr>
                    <tr>
                        <th colspan="3"><?php echo $this->Form->input('direccion'); ?></th>
                    </tr>
                    <tr>
                        <th colspan="3"><div align="center">Numero de telefonos</div></th>
                    </tr>
                    <tr>
                        <th><?php echo $this->Form->input('telefonofijo',array('label'=>'Telefono fijo')); ?></th>
                        <th><?php echo $this->Form->input('telefonocelular',array('label'=>'Telefono celular')); ?></th>
                        <th><?php echo $this->Form->input('user_id',array('label'=>'Registrado por')); ?></th>
                    </tr>
                    <tr>
                        <th colspan="3"><?php echo $this->Form->end(__('Modificar')); ?></th>
                        
                    </tr>
                </table>          
        

</div>
  <br></br>
<div class="actions">

	<ul>

            <li class="menu"><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('Cliente.id')), null, __('Esta segun de eliminar el registro # %s?', $this->Form->value('Cliente.id'))); ?></li>
		<li class="menu"><?php echo $this->Html->link(__('Lista Clientes'), array('action' => 'index')); ?></li>
		<li class="menu"><?php echo $this->Html->link(__('Lista Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Nuevo Cheque'), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Lista Cuentas'), array('controller' => 'cuentas', 'action' => 'index')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Nueva Cuenta'), array('controller' => 'cuentas', 'action' => 'add')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Lista Pagos'), array('controller' => 'pagos', 'action' => 'index')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Nuevo Pago'), array('controller' => 'pagos', 'action' => 'add')); ?> </li>
	</ul>
</div>
