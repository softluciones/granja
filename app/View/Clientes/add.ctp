<?php date_default_timezone_set("America/Caracas")?>
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
            <th colspan="3" style="background:#cccccc; height: 50px; font-size: 20px;"><div align="center"><?php echo __('Agregar Cliente'); ?></div></th>
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
                        <th><?php echo $this->Form->input('telefonofijo'); ?></th>
                        <th><?php echo $this->Form->input('telefonocelular'); ?></th>
                        <th><?php echo $this->Form->input('user_id',array('label'=>'Registrado por')); ?></th>
                    </tr>
                    
                    <tr>
                        <th colspan="3"> <?php echo $this->Form->end(__('Registrar')); ?></th>
                        
                    </tr>
                </table>

</div>
  <br></br>
<div class="actions">
	
	<ul>

            <li class="menu"><?php echo $this->Html->link(__('Lista Clientes'), array('action' => 'index')); ?></li>
		<li class="menu"><?php echo $this->Html->link(__('Lista Usuario'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Lista Cheques'), array('controller' => 'cheques', 'action' => 'index')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Nuevo Cheque'), array('controller' => 'cheques', 'action' => 'add')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Lista Cuentas'), array('controller' => 'cuentas', 'action' => 'index')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Nuevo Cuenta'), array('controller' => 'cuentas', 'action' => 'add')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Lista Pagos'), array('controller' => 'pagos', 'action' => 'index')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Nuevo Pago'), array('controller' => 'pagos', 'action' => 'add')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Lista de Pagos terceros'), array('controller' => 'pagoterceros', 'action' => 'index')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Nuevo Pago tercero'), array('controller' => 'pagoterceros', 'action' => 'add')); ?> </li>
	</ul>
</div>
