<?php date_default_timezone_set("America/Caracas") ?>
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
<script>
    $(document).ready(function(){
        
   $('#banco1').change(function(){
      
       var selected = $(this).val();
       var monto = $('#monto').val();
       $('#cuentas').css('display','block');
          if(selected!=null){
          $.ajax({
               type: "GET",
                     
                     url: "../../cuentaspropias/getcuentas/"+selected+"/"+monto,
                     success: function(msg){
                       
                        $('#cuentas').html(msg);
                    }
        });
          }
      
   });

  $('#selector').change(function(){
     
        if($('#selector option:selected').val()=="1"){
            $('#referencias').css('display','none');
           $('#descuenta').css('display','block');
            $('#bancos').css('display','none');
            $('#cuentas').css('display','none');
        }
        
        if($('#selector option:selected').val()=="2"){
            $('#referencias').css('display','block');
             $('#descuenta').css('display','none');
             $('#bancos').css('display','block');
             
        }
        if($('#selector option:selected').val()=="3"){
            $('#referencias').css('display','block');
             $('#descuenta').css('display','none');
             $('#bancos').css('display','none');
             $('#cuentas').css('display','none');
            
        }
        
    });
  });
  </script>


<div class="pagos form">
<?php echo $this->Form->create('Pago'); ?>
	<table>
            <thead>
            <th colspan="4" style="background:#cccccc; height: 50px; font-size: 20px;">
            <div align="center" style="color:#000;">
            <?php
           # print_r($cheques);
           echo __('Entregar Monto de Cheque'); ?></div></th>
            </thead>
	<?php
        echo '<tr>';
		echo '<th>'; echo $this->Form->input('cliente_id'); echo '</th>';
        
		echo '<th>'; echo $this->Form->input('monto',array('id'=>'monto','value'=>$montos)); echo '</th>';
                echo '<th colspan="2">'; echo $this->Form->input('conceptode', array('label'=>'Observación','placeholder'=>'En caso de que el monto entregado sea menor al que debía entregarsele por una deuda que tenia el cliente con la empresa')); echo '</th>';
               
        echo '</tr>';
         echo '<tr>';
        
         echo '<th>';
         echo '<div>';
         echo $this->Form->input('tipopago_id',array('id'=>'selector','label'=>"Forma de Entrega")); echo '</th>';
          echo '</div>';
         echo '<th>'; 
     echo '<div id="bancos" style="display:none">';
       
     echo $this->Form->input('Cuentaspropia.banco_id',array('id'=>'banco1','label'=>"Banco de Mi Cuenta", 'options'=>$banco, 'empty'=>'Seleccione'));
         echo '</div>';
         echo '</th>';
         
         echo '<th>'; 
          echo '<div id="cuentas" style="display:block">';
           
         echo '</div>';
         echo '</th>';
         
         echo '<th>';  
         echo '<div id="referencias" style="display:none">';
         echo $this->Form->input('nrotransferencia',array('id'=>'referencia1','label'=>"Nro. Referencia o Deposito", 'style'=>'width:50%; float:left;'));
         echo '</div>';
         echo '<div id="descuenta" style="display:block">';
         echo $this->Form->label('Descuenta Caja Chica');
         echo '</div>';
         echo '</th>';      
         
         echo '</tr>';
         
       
         
          echo '<tr>';
          
         echo '<th>'; echo $this->Form->input('user_id',array('label'=>'Registrado por')); echo '</th>';
         echo '<th colspan="3">';echo $this->Form->input('cheque_id');  echo '</th>';
         
         echo '</tr>';
           echo '<tr>';
	echo '<th>'; echo $this->Form->end(__('Registrar')); echo '</th>';	
        echo '<th>';  echo '</th>';
        echo '<th>';  echo '</th>';
        echo '<th>';  echo '</th>';
	 echo '</tr>';	
	?>
	</table>

</div>

