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
<div class="tipopagos form">
<?php echo $this->Form->create('Tipopago'); ?>
	<fieldset>
		<legend><?php echo __('Editar Tipo de pago'); ?></legend>
	<?php
		echo $this->Form->input('id',array('type'=>'hidden'));
		echo $this->Form->input('nombre');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>
<br></br>
<div class="actions">

	<ul>

            <li class="menu"><?php echo $this->Html->link(__('Listar Tipo de pagos'), array('action' => 'index')); ?></li>
		</ul>
</div>
