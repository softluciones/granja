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
        $("#datepicker").datepicker();
        $("#datepicker1").datepicker();
        $("#datepicker").datepicker('option', { dateFormat: 'dd-mm-yy' });
          $("#datepicker1").datepicker('option', { dateFormat: 'dd-mm-yy' });
             $('#divcliente').dialog({
                width: 700,
                height: 350,
                modal:true,
                title:'AGREGAR CLIENTE',
                autoOpen:false
             });
              $('#divinteres').dialog({
                width: 500,
                height: 250,
                modal:true,
                title:'AGREGAR INTERES',
                autoOpen:false
             });
         
    });

    function client(){
                $('#divcliente').dialog("open");
        }  
         function interes(){
                $('#divinteres').dialog("open");
        }  
        function guardar(){
            var noentra=0;
            if($('#cedula').val()=='' || $('#nombre').val()=='' || $('#apellido').val()=='' ||  $('#apodo').val()==''){
                noentra=1;
            }
            if(noentra==0){
            if($('#apodo').val()==''){
               $('#apodo').val('xxxxxx');
            }
            if($('#negocio').val()==''){
                $('#negocio').val('xxxxxx');
            }
            if($('#email').val()==''){
                $('#email').val('xxxxxx');
            }
            if($('#direccion').val()==''){
                $('#direccion').val('xxxxxx');
            }
            if($('#celular').val()==''){
                $('#celular').val('xxxxxx');
            }
            if($('#fijo').val()==''){
                $('#celular').val('xxxxxx');
            }
            }
            if(noentra==0){
            $.ajax({
                     type: "GET",
                     
                     url: "busca/"+$('#cedula').val()+"/"+$('#nombre').val()+"/"+$('#apellido').val()+"/"+$('#apodo').val()+"/"+$('#negocio').val()+"/"+$('#email').val()+"/"+$('#direccion').val()+"/"+$('#telefonofijo').val()+"/"+$('#celular').val(),
                     success: function(msg){
                        $('#listacliente').html(msg);
                        $('#divcliente').dialog("close");
                    }
                });
                $('#cedula').val('');
            $('#apellido').val('');
            $('#apellido').val('');
            $('#apodo').val('');
            $('#negocio').val('');
            $('#email').val('');
            $('#direccion').val('');
            $('#telefonofijo').val('');
            $('#celular').val('');
            }else{
            alert("Debe insertar todos los campos obligatorios (*)");
            }
            
        }
        function guardare(){
        var vacio=0;
        if($('#valor').val()==''){
            vacio=1;
            alert("Llena el Valor Porcentaje");
        }else{
            
            if($('#tipoprestamo').val()==''){
                vacio=1;
                alert("Llena el Valor Porcentaje");
            }
        }
        
        if(vacio==0){
            
            $.ajax({
                     type: "GET",
                     url: "buscar/"+$('#valor').val()+"/"+$('#tipoprestamo').val(),
                     success: function(msg){
                       
                        $('#listainteres').html(msg);
                        $('#divinteres').dialog("close");


                    }
                });
                $('#valor').val('');
                 $('#tipoprestamo').val('');
        }
        
        }
</script>
<div id="divcliente" style="height:0px; display: none;width:100%">
            <?php 
            echo $this->Form->input('idcliente',array('id'=>'idcliente','type'=>'hidden'));
		echo "<div style='float:left;width:30%'>";
        ?>
           <?php
             echo $this->Form->label('Cedula *:');
                echo $this->Form->input('cedula',array('id'=>'cedula','div'=>false,'label'=>false,'style'=>'width: 90%;'));
            echo "</div>";
                echo "<div style='float:left;width:35%'>";
                echo $this->Form->label('Nombre *:');
                echo $this->Form->input('nombre',array('id'=>'nombre','div'=>false,'label'=>false,'style'=>'width: 90%;'));
             echo "</div>";    
                echo "<div style='float:left;width:35%'>";
                 echo $this->Form->label('Apellido *:');
                    echo $this->Form->input('apellido',array('id'=>'apellido','div'=>false,'label'=>false,'style'=>'width: 100%;'));
                 echo "</div>";
                 echo "<div style='float:left;width:30%'>";
                 echo $this->Form->label('Apodo *:');
                echo $this->Form->input('apodo',array('id'=>'apodo','maxlength'=>'10','div'=>false,'label'=>false,'style'=>'width: 90%;'));
                 echo "</div>";
                  echo "<div style='float:left;width:35%'>";
                 echo $this->Form->label('Negocio:');
                echo $this->Form->input('negocio',array('id'=>'negocio','div'=>false,'label'=>false,'style'=>'width: 90%;'));
                 echo "</div>";
                 echo "<div style='float:left;width:35%'>";
                 echo $this->Form->label('Email:');
                echo $this->Form->input('email',array('id'=>'email','div'=>false,'label'=>false,'style'=>'width: 100%;'));
                 echo "</div>";
                 echo "<div style='float:left;width:100%'>";
                 echo $this->Form->label('Dirección:');
                echo $this->Form->input('direccion',array('id'=>'direccion','div'=>false,'label'=>false,'style'=>'width: 100%;'));
                 echo "</div>";
                 echo "<div style='float:left;width:50%'>";
                 echo $this->Form->label('Teléfono fijo:');
                echo $this->Form->input('telefonofijo',array('id'=>'telefonofijo','div'=>false,'label'=>false,'style'=>'width: 95%;'));
                 echo "</div>";
                 echo "<div style='float:left;width:50%'>";
                 echo $this->Form->label('Celular:');
                echo $this->Form->input('celular',array('id'=>'celular','div'=>false,'label'=>false,'style'=>'width: 100%;'));
                 echo "</div>";
                 echo "</br>";
                 echo "<div class='row'>";
                echo $this->Form->submit('Guardar', 
    array('id'=>'guardarinteres','title' => 'Guarda Cliente', 'onClick'=>'guardar();'));
                 echo "</div>";
                ?>
           
</div>
<div id="divinteres" style="height:0px; display: none;width:100%">
            <?php 
            echo $this->Form->input('idinteres',array('id'=>'idinteres','type'=>'hidden'));
        
		echo "<div style='float:left;width:30%'>";
        ?>
           <?php
                echo $this->Form->label('Porcentaje:');
                echo $this->Form->input('valor',array('id'=>'valor','div'=>false,'label'=>false,'style'=>'width: 90%;'));
                echo "</div>";
                echo "<div style='float:left;width:35%'>";
                echo $this->Form->label('Tipo de Prestamo:');
                $options=array(''=>'Seleccione',
                                    1=>'Pago Diario.',
                                    2=>'Cuota Fija.');
                echo $this->Form->input('tipoprestamo',array('options'=>$options,'id'=>'tipoprestamo','div'=>false,'label'=>false,'style'=>'width: 90%;'));
                echo "</div>";    
                 echo "</br>";
                 echo "<div class='row'>";
                echo $this->Form->submit('Guardar', 
    array('id'=>'guardare','title' => 'Guarda Interes', 'onClick'=>'guardare();'));
                 echo "</div>";
                ?>
           
</div>
<div class="prestamos form">
<?php echo $this->Form->create('Prestamo'); ?>
	<fieldset>
		<legend><?php echo __('Add Prestamo'); ?></legend>
                <table>
                    <thead>
                        <th colspan="3" style="background:#cccccc; height: 50px; font-size: 20px;">
                        <div align="center" style="color:#000;"> Agregar Nuevo Prestamo </div>
                        </th>
                    </thead>
                    <tr>
                        <td><?php  echo "<div style='float:left;width:50%' >";?>
                        <div id="listacliente">
                             <?php echo $this->Form->input('cliente_id',array('label'=>'Cliente','div'=>null));
                             echo " ";
                             echo $this->Html->image("anade.fw.png", array("id"=>"cliente","alt" => "Agregar Cliente",'width' => '20', 'heigth' => '20','title'=>'Agregar Cheque','onClick' => "client();"));
                             echo "</div>";                       
                            ?>
                        </div></td>
                        <td><?php echo $this->Form->input('monto'); ?></td>
                        <td>          
                      <div id="listainteres">
                      <?php 
                        echo $this->Form->input('interesprestamo_id',array('label'=>'Interes','div'=>null)); 
                          echo " ";
                         echo $this->Html->image("anade.fw.png", array("id"=>"binteres","alt" => "Agregar Interes",'width' => '20', 'heigth' => '20','title'=>'Agregar Interes','onClick' => "interes();"));
                       echo "</div>";  
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $this->Form->input('fechainicio',array('label'=>'Fecha Inicio','id'=>'datepicker','type'=>'text','style'=>'width:50%;','placeholder'=>'Haz Click aquí','readonly'=>'readonly')); ?></td>
                        <td><?php echo $this->Form->input('fechafin',array('label'=>'Fecha Fin','id'=>'datepicker1','type'=>'text','style'=>'width:50%;','placeholder'=>'Haz Click aquí','readonly'=>'readonly')); ?></td>
                        <td><?php echo $this->Form->input('montodeuda',array('type'=>'hidden')); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $this->Form->input('user_id'); ?></td>
                        <td><?php echo $this->Form->end(__('Guardando')); ?></td>
                        <td></td>
                    </tr>
                </table>
	<?php
	?>
	</fieldset>
<?php  ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Lista Prestamos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Lista Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>		
	</ul>
</div>
