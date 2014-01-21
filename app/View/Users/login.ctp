<div class="users form">
<?php $_SESSION['varia']=0 ;
echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Bienvenido. Ingrese el usuario y contraseña'); ?></legend>
        <?php echo $this->Form->input('username',array('label'=>'Nombre usuario'));
              echo $this->Form->input('password',array('label'=>'Contraseña'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Ingresar al sistema')); ?>
</div>