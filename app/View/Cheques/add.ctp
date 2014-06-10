


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
        if($('#fijo').val()==''&& $('#porcentaje').val()==''){
            vacio=1;
            alert("Llena los valores porcentaje o los rangos para monto fijo");     
        }
        if($('#minimo').val()==''&&$('#fijo').val()==''&&$('#maximo').val()!=''){
            vacio=1;
            alert("Llena el campo minimo");            
        }
        if($('#maximo').val()==''&&$('#fijo').val()==''&&$('#minimo').val()!=''){
            vacio=1;
            alert("Llena el campo maximo");            
        }
        if($('#maximo').val()==''&&$('#minimo').val()==''&&$('#fijo').val()!=''){
            vacio=1;
            alert("Llena el campo monto fijo");            
        }
        
        if(vacio==0){
            
        if($('#porcentaje').val()!=''){
            
            $('#minimo').val('xxxxxxx');
            $('#maximo').val('xxxxxxx');
            $('#fijo').val('xxxxxxx');
        }
        if($('#fijo').val()!='xxxxxxx'){
            $('#porcentaje').val('xxxxxxx');
        }
            $.ajax({
                     type: "GET",
                     url: "buscar/"+$('#minimo').val()+"/"+$('#maximo').val()+"/"+$('#fijo').val()+"/"+$('#porcentaje').val(),
                     success: function(msg){
                       
                        $('#listainteres').html(msg);
                        $('#divinteres').dialog("close");


                    }
                });
                $('#minimo').val('');
                 $('#maximo').val('');
                  $('#fijo').val('');
             $('#porcentaje').val('');
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
             echo $this->Form->label('Mínimo:');
                echo $this->Form->input('minimo',array('id'=>'minimo','div'=>false,'label'=>false,'style'=>'width: 90%;'));
                echo "</div>";
                echo "<div style='float:left;width:35%'>";
                echo $this->Form->label('Máximo:');
                echo $this->Form->input('maximo',array('id'=>'maximo','div'=>false,'label'=>false,'style'=>'width: 90%;'));
                echo "</div>";    
                echo "<div style='float:left;width:35%'>";
                 echo $this->Form->label('Monto Fijo:');
                echo $this->Form->input('fijo',array('id'=>'fijo','div'=>false,'label'=>false,'style'=>'width: 100%;'));
                 echo "</div>";
                 echo "<div style='float:left;width:30%'>";
                 echo $this->Form->label('Porcentaje %:');
                 echo $this->Form->input('porcentaje',array('id'=>'porcentaje','maxlength'=>15,'div'=>false,'label'=>false,'style'=>'width: 90%;'));
                 echo "</div>";
                 echo "</br>";
                 echo "<div class='row'>";
                echo $this->Form->submit('Guardar', 
    array('id'=>'guardare','title' => 'Guarda Interes', 'onClick'=>'guardare();'));
                 echo "</div>";
                ?>
           
</div>
<div class="cheques form">
<?php echo $this->Form->create('Cheque',array('type'=>'file')); 

?>
	
                <table>
                    <thead>
       
                 <th colspan="3" style="background:#cccccc; height: 50px; font-size: 20px;">
         <div align="center" style="color:#fff;"> Agregar Cheque </div>
          </th>
            
         </thead>
                    <tr>
               <?php  echo "<div style='float:left;width:40%' >";?>
                <th colspan="3">
                    <div id="listacliente">
                         <?php echo $this->Form->input('cliente_id',array('label'=>'Cliente','div'=>null));
                         echo " ";
                         echo $this->Html->image("anade.fw.png", array("id"=>"cliente","alt" => "Agregar Cliente",'width' => '20', 'heigth' => '20','title'=>'Agregar Cheque','onClick' => "client();"));
                         echo "</div>";                       
                        ?>
                    </div>   
                        <?php   ?>
                </th>
                    </tr>
                    <tr>
                        <th><?php echo $this->Form->input('banco_id'); ?></th>
                        <th><?php echo $this->Form->input('numerodecuenta',array('label'=>'Nro. de Cuenta')); ?></th>
                        <th><?php echo $this->Form->input('numerodecheque',array('label'=>'Nro. de Cheque')); ?></th>
                    </tr>
                    <tr>
                        <th><?php echo $this->Form->input('monto'); ?></th>
                        <th>
                        
                      <div id="listainteres">
                      <?php 
                        echo $this->Form->input('interese_id',array('label'=>'Interes','div'=>null)); 
                          echo " ";
                         echo $this->Html->image("anade.fw.png", array("id"=>"binteres","alt" => "Agregar Interes",'width' => '20', 'heigth' => '20','title'=>'Agregar Interes','onClick' => "interes();"));
                       echo "</div>";  
                        ?></th>
                        <th><?php echo $this->Form->input('filename',array('type'=>'file','label'=>'Imagen del Cheque')); ?></th>
                    </tr>
                    <tr>

                        <th><?php echo $this->Form->input('fecharecibido',array('label'=>'Fecha de Recibido','id'=>'datepicker','type'=>'text','style'=>'width:50%;','placeholder'=>'Haz Click aquí','readonly'=>'readonly')); ?></th>
                        <th><?php echo $this->Form->input('fechacobro',array('label'=>'Fecha de Cobro','id'=>'datepicker1','type'=>'text','style'=>'width:50%;','placeholder'=>'Haz Click aquí','readonly'=>'readonly')); ?></th>

                        <th><?php echo $this->Form->input('cobrado',array('options'=>array(
                               '1'=>'Por Cobrar'
                ))); ?></th>
                     
                    </tr>
                    <tr>
                       
                   <th colspan="2"><?php echo $this->Form->input('user_id'); ?></th>
                        <th><?php echo $this->Form->end(__('Guardar')); ?></th>
                        
                    </tr>
                </table>
	<?php
		
		
		echo $this->Form->input('dir',array('type'=>'hidden'));
		
		
		echo $this->Form->input('dias',array('type'=>'hidden'));
		
		
	?>


</div>
  <br></br>
<div class="actions">
	
	<ul>

		<li class="menu"><?php echo $this->Html->link(__('Listar Cheques'), array('action' => 'index')); ?></li>
		<li class="menu"><?php echo $this->Html->link(__('Listar Bancos'), array('controller' => 'bancos', 'action' => 'index')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Nuevo Banco'), array('controller' => 'bancos', 'action' => 'add')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Lista de Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Nuevo Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Listar Intereses'), array('controller' => 'interese', 'action' => 'index')); ?> </li>
		<li class="menu"><?php echo $this->Html->link(__('Nuevo Interes'), array('controller' => 'interese', 'action' => 'add')); ?> </li>
		
	</ul>
</div>
