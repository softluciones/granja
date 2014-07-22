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
      #cliente{
          cursor:pointer;
      }
       #binteres{
          cursor:pointer;
      }
      
       #guardarinteres{
          cursor:pointer;
      }
       #guardare{
          cursor:pointer;
      }
  </style>
<script language="javascript">
    $(document).ready(function(){
        $('#bancos').change(function(){
          var selected = $(this).val();
     
          if(selected!=null){
          $.ajax({
               type: "GET",
                     
                     url: "../Cheques/getcodigo/"+selected,
                     success: function(msg){
                        $('#cuenta').html(msg);
                    }
        });
          }
});
    });
</script>
<div class="cuentaspropias form">
<?php echo $this->Form->create('Cuentaspropia'); ?>
	<table>
                    <thead>
       
                 <th colspan="3" style="background:#cccccc; height: 50px; font-size: 20px;">
         <div align="center" style="color:#000;"> Agregar Cuenta Propia </div>
          </th>
            
         </thead><tr>
         
                <th>
                   <?php echo $this->Form->input('banco_id', array('empty'=>'Seleccione','id'=>'bancos'));  ?> 
                   </th>  
                    <th>
                    <div id="cuenta">
                         <?php echo $this->Form->input('nrocuenta', array('maxlength'=>'20','label'=>'Nro. de Cuenta'));
                                       
                        ?>
                    </div>   
                        
                </th>
                <th>
                    <?php  echo $this->Form->input('nombretitular', array('label'=>'Nombre Titular')); ?>
                </th>
                    </tr>
                    <tr>
             
                <th>
                   <?php echo $this->Form->input('correotitular',array('label'=>'Correo del Titular'));  ?> 
                   </th>  
                    <th>
                    
                         <?php 
                                echo $this->Form->input('cedulatitular', array('label'=>'Cedula Titular'));        
                        ?>
                   
                        
                </th>
                <th>
                    <?php  echo $this->Form->end(__('Guardar'));  ?>
                </th>
                    </tr>
      
	</table>

</div>
<div class="actions">
	
	<ul>

		<li><?php echo $this->Html->link(__('Listar Mis Cuentas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Bancos'), array('controller' => 'bancos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Banco'), array('controller' => 'bancos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Cheques propios'), array('controller' => 'chequespropios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cheque propio'), array('controller' => 'chequespropios', 'action' => 'add')); ?> </li>
</div>
