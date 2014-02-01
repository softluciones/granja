<div class="chequeEstadocheques form">
<?php echo $this->Form->create('ChequeEstadocheque'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Restrincion del cheque'); ?></legend>
	<?php
		echo $this->Form->input('cheque_id');
		echo $this->Form->input('estadocheque_id');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Registrar')); ?>
</div>

