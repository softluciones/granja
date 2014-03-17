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
<div class="interese form">
<?php echo $this->Form->create('Interese'); ?>
    <table>
    <threa>
        <fieldset>
		<th colspan="3" style="background:#cccccc; height: 50px; font-size: 20px;"><div align="center"><?php echo __('Agregar intereses'); ?></div></th>
   </threa>
        <tr>
            <th><?php echo $this->Form->input('minimo'); ?></th>
            <th><?php echo $this->Form->input('maximo'); ?></th>
            <th><?php echo $this->Form->input('montofijo'); ?></th>
        </tr>
        <tr>
            <th><?php echo $this->Form->input('porcentaje'); ?></th>
            <th><?php echo $this->Form->input('user_id'); ?></th>
            <th><?php echo $this->Form->end(__('Submit')); ?></th>
        </tr>
       
       <?php
            
		
		
		
	?>
	</fieldset>
        </table>
<?php  ?>
</div>
<div class="actions">
	<h3><?php echo __('Operaciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Lista Intereses'), array('action' => 'index')); ?></li>
	</ul>
</div>
