<style>
    div.form, div.index, div.view {
float: left;
width: 76%;
border-left: 0px solid #666666;
padding: 10px 1%;
}
input[type=submit],
.actions ul li a,
.actions a {
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
.actions ul li a:hover,
.actions a:hover {
	background: none;
        padding: 0px;
        border: none;
}

</style>
<script>
    $(document).ready(function(){
        
    
 $(function () {

$("#datepicker").datepicker();
});
  $('#selector').change(function(){
      
        if($('#selector option:selected').val()=="1"){
            $('#fecha1').css('display','none');
            $('#texto').css('display','block');
        }else{
            $('#fecha1').css('display','block');
            $('#texto').css('display','none');
        }
    });
  });
  </script>
  
   <div class="box">
     <?php echo $this->Form->create('Cheque', array('url' => array('action' => 'index'))); ?> 
   <div style="float:left;width:50%; ">
      <fieldset>
<legend><?php 
#debug($cheques);
echo __('Cheques ') ; ?>
<?php  echo $this->Html->image("anade.fw.png", array("alt" => "Agregar Cheque",'width' => '20', 'heigth' => '20','title'=>'Agregar Cheque','url' => array('action' => 'add'))); ?></legend>
</fieldset>	
   
      <div style="float:left; width:80%"> 

          <?php echo $this->Form->input('selector', array(
    'options' => array('Seleccione fecha a consultar.','Otro.'),
    'id' => 'selector', 'label'=>'','div'=>null
)); ?>
       </br>


    

    </div> 
       <?php if($yabusco==2 || $yabusco==0){ ?>
    <div id="search_box"> 
    <div style="float:left; width:100%; " id="fecha1">
    <?php 

echo $this->Form->label('Búsqueda por fecha') ?>
<?php echo $this->Form->input('search_text', array('id'=>'datepicker','style' => 'width: 80%;', 'div'=> false,'label' => false,
                                                    'placeholder'=>'Haz click aquí','readonly'=>'readonly')); ?> 
<?php echo $this->Form->end('Buscar'); ?>      
</div> 
<div style="float:left; width:100%; display: none;" id="texto">
    <?php 

echo $this->Form->label('Búsqueda') ?>
<?php echo $this->Form->input('search_text1', array('style' => 'width:80%;', 'div'=> false,'label' => false,
                                                    'placeholder'=>'Ingrese Nro. cheque o banco o cliente, etc...  ')); ?> 
<?php echo $this->Form->end('Buscar'); ?>      
</div> 

</div> 
       <?php }else{
           
           ?>
       <div id="search_box"> 
    <div style="float:left; width:100%; display: none;" id="fecha1">
    <?php 

echo $this->Form->label('Búsqueda por fecha') ?>
<?php echo $this->Form->input('search_text', array('id'=>'datepicker','style' => 'width: 80%;', 'div'=> false,'label' => false,
                                                    'placeholder'=>'Haz click aquí','readonly'=>'readonly')); ?> 
<?php echo $this->Form->end('Buscar'); ?>      
</div> 
<div style="float:left; width:100%; " id="texto">
    <?php 

echo $this->Form->label('Búsqueda') ?>
<?php echo $this->Form->input('search_text1', array('style' => 'width:80%;', 'div'=> false,'label' => false,
                                                    'placeholder'=>'Ingrese Nro. cheque o banco o cliente, etc...  ')); ?> 
<?php echo $this->Form->end('Buscar'); ?>      
</div> 

</div> 
       <?php
       } ?>
    </div>
</form>

<div style="float:left;  width:50%; clear: none; padding-top: 40px; ">
               
    <?php if(!empty($sumas)){ ?>
    <h3>Monto a cobrar por cheques por cobrar y por cheques devueltos</h3>
    <table cellpadding="0" cellspacing="0" style="width: 100%;">
        <thead>
        <tr style="background: #528CE0;"><?php //azul ?>
            <th>Estado del cheque</th>
            <th>Monto total cheques a cobrar</th>
        </tr>
        </thead>
        <tr>
            <th>Monto por cobrar</th>       
            <th><div style="float: right"><?php if(!empty($sumas[0])){
                        if($sumas[0]['cheques']['cobrado']==1){    
                             echo h(number_format(floatval($sumas[0][0]['sumato']),2,',','.'))." Bs";
                        }else{
                            if(!empty($sumas[1])){
                           echo h(number_format(floatval($sumas[1][0]['sumato']),2,',','.'))." Bs";
                            }else{
                                echo "0,00 Bs";
                            }
                        }}else{
                            echo h(number_format(floatval(0),2,',','.'))." Bs";
                        }?></div></th>
        </tr>
        <tr>
            <th>Cheques Devueltos</th>
            <th><div style="float: right">
                <?php if(!empty($sumas[1])){
                        if($sumas[1]['cheques']['cobrado']==0){    
                             echo h(number_format(floatval($sumas[1][0]['sumato']),2,',','.'))." Bs";
                        }else{
                            echo h(number_format(floatval($sumas[0][0]['sumato']),2,',','.'))." Bs";
                        }
                        
                        }else{
                            echo h(number_format(floatval(0),2,',','.'))." Bs";
                        }?></div></th>
        </tr>
        <tr>
            <th>Total de "Por Cobrar y Devueltos":</th>
            <th><div style="float: right">
                <?php 
                if(empty($sumas[0]))
                    echo h(number_format(floatval($sumas[1][0]['sumato']),2,',','.'))." Bs";
                else
                    if(empty($sumas[1]))
                        echo h(number_format(floatval($sumas[0][0]['sumato']),2,',','.'))." Bs";
                    else
                        echo h(number_format(floatval($sumas[1][0]['sumato']+$sumas[0][0]['sumato']),2,',','.'))." Bs";
                ?></div></th>
        </tr>
    </table>
    <?php } 
    ?>
    </div>

     <table style="width:50%;">
         <thead>
             <tr>
                 <th colspan="4">
         <div align="center"> LEYENDA DE COLORES </div>
                 </th>
             </tr>
         <tr>
             <th>Cheque Se Cobra Hoy</th>
             <th>Cheque cobrar en un futuro</th>
             <th>Cheque Devuelto</th>
             <th>Cheque olvidados por cobrar</th>
         </tr>
         </thead>
         <tr>
             <th style="background: #528CE0;"><br><br></th>
             <th style="background: #ffffff;"><br><br></th>
             <th style="background: #f00;"><br><br></th>
             <th style="background: #FECA40;"><br><br></th>
         </tr>
     </table>    
    <h2><?php #debug($sumas); 

       ?>
<h2 style="clear: both">
    <?php 
            echo __('Cheques por cobrar y devueltos ');
            
            ?></h2>
            
        
	<table cellpadding="0" cellspacing="0" align="center" style="width:100%">
            <thead>
	<tr>
			
			<th style="width:5%;" scope="col"><?php echo $this->Paginator->sort('banco_id', 'Banco'); ?></th>
			<th style="width:5%;" scope="col"><?php echo $this->Paginator->sort('cliente_id','Cliente'); ?></th>
			
			
			<th style="width:5%;" scope="col"><?php echo $this->Paginator->sort('numerodecheque', 'Nro. Cheque');?></th>
                        <th style="width:1%;" scope="col"><?php echo $this->Paginator->sort('dias','Dias'); ?></th>
			<th style="width:1%;" scope="col"><?php echo $this->Paginator->sort('interese_id','Interes'); ?></th>
                        <th style="width:5%;" scope="col" align="right"><?php echo $this->Paginator->sort('monto','Monto deuda'); ?></th>
                        <th style="width:5%;" scope="col"><?php echo $this->Paginator->sort('montointereses','Intereses'); ?></th>
                        <th style="width:5%;" scope="col"><?php echo $this->Paginator->sort('montoentregado', 'Entregado'); ?></th>
                        
			<th style="width:5%;" scope="col"><?php echo $this->Paginator->sort('fecharecibido', 'Recibido'); ?></th>
			<th style="width:10%;" scope="col"><?php echo $this->Paginator->sort('fechacobro','Cobro'); ?></th>
			
			<th style="width:10%;" scope="col"><?php echo $this->Paginator->sort('modified','Modificado'); ?></th>
			<th style="width:5%;" scope="col"><?php echo $this->Paginator->sort('cheque','Cheque'); ?></th>
                        <th style="width:0.5%;" scope="col"><?php echo $this->Paginator->sort('estado','Edo.'); ?></th>
			<th style="width:5%;" scope="col"><?php echo $this->Paginator->sort('id_cheque','Pago de'); ?></th>
			<th style="width:5%;" scope="col"><?php echo $this->Paginator->sort('user_id', 'Usuario'); ?></th>
			<th style="width:10%;"><?php echo __('Acciones'); ?></th>
	</tr>
        </thead>

<?php 
       # debug($cheques);
        foreach ($cheques as $cheque): ?>
	<?php 

#debug($cheque);
                $fecha1=$cheque['Cheque']['fechacobro'];
                $fecha2=date('Y-m-d');
                
                //debug($fecha1);
                #debug($fecha2);
                $y=new DateTime($fecha1);
                $y=$y->format('Y-m-d');
                
                /*#$y=new DateTime($fecha1);
                #$y=$y->format('Y-m-d');*/
                $date1 = $y;
                $date2 = $fecha2;
                $diff = abs(strtotime($date2) - strtotime($date1));
                $years = floor($diff / (365*60*60*24));
                $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                $dias = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                $dias++;
                #debug($dias);
                if($date1>$date2){
                    
                        $dias=$dias*(-1);
                    
                    
                }else{
                    if($date1<$date2){
                        $dias;
                    }else{
                        $dias=$cheque['Cheque']['dias'];
                    }
                }
                
                #debug($dias);
                $format='Y-m-d';
                $cheque['Cheque']['fechacobro']=new Datetime($cheque['Cheque']['fechacobro']);
                $fechaux = $cheque['Cheque']['fechacobro'];
                $cheque['Cheque']['fechacobro'] = $cheque['Cheque']['fechacobro']->format($format);
                $fechacobro=$cheque['Cheque']['fechacobro'];
                $cheque['Cheque']['fechacobro'] = $fechaux->format('d/m/Y');
                 $cheque['Cheque']['fecharecibido']=new Datetime($cheque['Cheque']['fecharecibido']);
                $cheque['Cheque']['fecharecibido'] = $cheque['Cheque']['fecharecibido']->format('d/m/Y');
                 $cheque['Cheque']['modified']=new Datetime($cheque['Cheque']['modified']);
                $cheque['Cheque']['modified'] = $cheque['Cheque']['modified']->format('d/m/Y H:i:s');
                $hoy=date($format);
        
			$cantidad = count($cheque['ChequeEstadocheque'])-1;
                        
			$estado=$cheque['ChequeEstadocheque'][$cantidad]['Estadocheque']['nomenclatura'];
			$cobrado=$cheque['Cheque']['cobrado'];
                        
			$porcentaje=$cheque['Interese']['porcentaje'];
                        
			$montofijo=$cheque['Interese']['montofijo'];
                        $deuda=$cheque['Cheque']['deuda'];
			/*validando que la fecha de cobro es de hoy*/
        if($fechacobro==$hoy){
			/*cuando el cheque está por cobrar*/
                    if($cobrado==1){
				/*cuando se confia en el cliente y se le ha pagado antes de cobrar el cheque*/
                			if($estado=='R'){
	 ?>	
						<tr style="background: #528CE0; color: white;">
							<td><?php echo $this->Html->link($cheque['Banco']['nombre'], array('controller' => 'bancos', 'action' => 'view', $cheque['Banco']['id'])); ?></td>
							<td><?php echo $this->Html->link($cheque['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $cheque['Cliente']['id'])); ?></td>
							<td><?php echo $this->Html->link(__($cheque['Cheque']['numerodecheque']), array('action' => 'view', $cheque['Cheque']['id'])); ?>&nbsp;</td>
							<td><?php echo h($cheque['Cheque']['dias']); ?>&nbsp;</td>
							<td><?php 
								if($porcentaje==null){
								echo $this->Html->link($montofijo, array('controller' => 'interese', 'action' => 'view', $cheque['Interese']['id']))." Bs"; 
												
												}else
								echo $this->Html->link($porcentaje, array('controller' => 'interese', 'action' => 'view', $cheque['Interese']['id']))." %"; 
								?></td>
												<?php $total=count($cheque['Chequeinterese']);
												//debug($total);
												?>
							 <td><div style="float: right"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montocheque']),2,',','.'));?></div></td>
							 <td><div style="float: right"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montodescuentointeres']),2,',','.'));?></div></td>
							 <td><div style="float: right"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montoentregado']),2,',','.')); ?></div></td>
							 <td><?php echo h($cheque['Cheque']['fecharecibido']); ?></td>
							 <td><?php echo h($cheque['Cheque']['fechacobro']); ?></td>
							 <td><?php echo h($cheque['Cheque']['modified']); ?>&nbsp;</td>
							 <td><?php echo h('Por Cobrar'); ?></td>
							 <td><?php echo h($estado); ?>&nbsp;</td>
							 <td><?php echo h($cheque['Cheque1']['numerodecheque']); ?>&nbsp;</td>
							 <td><?php echo $this->Html->link($cheque['User']['username'], array('controller' => 'users', 'action' => 'view', $cheque['User']['id'])); ?></td>
							 <?/*estas son las acciones para modificar si está devuelto y esas cosas*/?>
							 <td class="actions">
									<?php echo $this->Html->image("historial.fw.png", array("alt" => "Historial",'width' => '18', 'heigth' => '18','title'=>'Historial','url' => array('action' => 'reporteinteres', $cheque['Cheque']['id'])));?>
									<?php echo $this->Html->image("devuelto.fw.png", array("alt" => "Devuelto",'width' => '18', 'heigth' => '18','title'=>'Devuelto','url' => array('action' => 'editadevuelto/'. $cheque['Cheque']['id'],0)));?>
									<?php echo $this->Html->image("cobrado.fw.png", array("alt" => "Cobrado",'width' => '18', 'heigth' => '18','title'=>'Cobrado','url' => array('action' => 'editadevuelto/'. $cheque['Cheque']['id'],2)));?>
									<?php echo $this->Html->image("ver.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Ver','url' => array('action' => 'view', $cheque['Cheque']['id'])));?>
									<?php echo $this->Html->image("editar.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Editar','url' => array('action' => 'edit', $cheque['Cheque']['id']))); ?>
									<?php $imagen= $this->Html->image("borrargrande.fw.png", array("alt" => "borrar",'width' => '18', 'heigth' =>'18','title'=>'Borrar'));
										echo $this->Html->link($imagen, array('action' => 'delete', $cheque['Cheque']['id']), array('escape'=>false), sprintf(__('Seguro que quiere eliminar el registro?', $cheque['Cheque']['id'])));?>
						</td>			
		<?php }else{
				/*en esta parte le debemos al cliente el monto del cheque menos el monto interes :D*/
				if($estado=='C'){?>
					<tr style="background: #528CE0; color: white;">
								<td><?php echo $this->Html->link($cheque['Banco']['nombre'], array('controller' => 'bancos', 'action' => 'view', $cheque['Banco']['id'])); ?></td>
								<td><?php echo $this->Html->link($cheque['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $cheque['Cliente']['id'])); ?></td>
								<td><?php echo $this->Html->link(__($cheque['Cheque']['numerodecheque']), array('action' => 'view', $cheque['Cheque']['id'])); ?>&nbsp;</td>
								<td><?php echo h($cheque['Cheque']['dias']); ?>&nbsp;</td>
								<td><?php 
									if($porcentaje==null)
									echo $this->Html->link($montofijo, array('controller' => 'interese', 'action' => 'view', $cheque['Interese']['id']))." Bs"; 
									else
									echo $this->Html->link($porcentaje, array('controller' => 'interese', 'action' => 'view', $cheque['Interese']['id']))." %"; 
									?></td>
								 <td><div style="float: right"><?php echo h(number_format(floatval($cheque['Chequeinterese'][0]['montocheque']),2,',','.'));?></div></td>
								 <td><div style="float: right"><?php echo h(number_format(floatval($cheque['Chequeinterese'][0]['montodescuentointeres']),2,',','.'));?></div></td>
								 <td><div style="float: right; background: #0f0;"><?php echo h(number_format(floatval($cheque['Chequeinterese'][0]['montoentregado']),2,',','.')); ?></div></td>
								 <td><?php echo h($cheque['Cheque']['fecharecibido']); ?></td>
								 <td><?php echo h($cheque['Cheque']['fechacobro']); ?></td>
								 <td><?php echo h($cheque['Cheque']['modified']); ?>&nbsp;</td>
								 <td><?php echo h('Por Cobrar'); ?></td>
								 <td><?php echo h($estado); ?>&nbsp;</td>
								 <td><?php echo h($cheque['Cheque1']['numerodecheque']); ?>&nbsp;</td>
								 <td><?php echo $this->Html->link($cheque['User']['username'], array('controller' => 'users', 'action' => 'view', $cheque['User']['id'])); ?></td>
								 <?/*estas son las acciones para modificar si está devuelto y esas cosas*/?>
								 <td class="actions">
												 <?php echo $this->Html->image("historial.fw.png", array("alt" => "Historial",'width' => '18', 'heigth' => '18','title'=>'Historial','url' => array('action' => 'reporteinteres', $cheque['Cheque']['id'])));?>                             
										<?php echo $this->Html->image("devuelto.fw.png", array("alt" => "Devuelto",'width' => '18', 'heigth' => '18','title'=>'Devuelto','url' => array('action' => 'editadevuelto/'. $cheque['Cheque']['id'],0)));?>
										<?php echo $this->Html->image("cobrado.fw.png", array("alt" => "Cobrado",'width' => '18', 'heigth' => '18','title'=>'Cobrado','url' => array('action' => 'editadevuelto/'. $cheque['Cheque']['id'],2)));?>
										<?php echo $this->Html->image("ver.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Ver','url' => array('action' => 'view', $cheque['Cheque']['id'])));?>
										<?php echo $this->Html->image("editar.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Editar','url' => array('action' => 'edit', $cheque['Cheque']['id']))); ?>
										<?php $imagen= $this->Html->image("borrargrande.fw.png", array("alt" => "borrar",'width' => '18', 'heigth' =>'18','title'=>'Borrar'));
											echo $this->Html->link($imagen, array('action' => 'delete', $cheque['Cheque']['id']), array('escape'=>false), sprintf(__('Seguro que quiere eliminar el registro?', $cheque['Cheque']['id'])));?>
					</td>
		  <?php }?>
		
		<?php }}
		
		/*cuando el cheque es devuelto*/
						if($cobrado==0){
							/*el cheque fue devuelto por el banco. el cliente nos debe el monto del cheque mas intereses diarios*/
							if($estado=='R'){
							/*eso se pinta de rojo */
											?>
							
							<tr style="background: #f00; color: white;">
							<td><?php echo $this->Html->link($cheque['Banco']['nombre'], array('controller' => 'bancos', 'action' => 'view', $cheque['Banco']['id'])); ?></td>
							<td><?php echo $this->Html->link($cheque['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $cheque['Cliente']['id'])); ?></td>
							<td><?php echo $this->Html->link(__($cheque['Cheque']['numerodecheque']), array('action' => 'view', $cheque['Cheque']['id'])); ?>&nbsp;</td>
							<td><?php echo h($cheque['Cheque']['dias']); ?>&nbsp;</td>
							<td><?php 
								if($porcentaje==null)
								echo $this->Html->link($montofijo, array('controller' => 'interese', 'action' => 'view', $cheque['Interese']['id']))." Bs"; 
								else
								echo $this->Html->link($porcentaje, array('controller' => 'interese', 'action' => 'view', $cheque['Interese']['id']))." %"; 
								?></td>
												<?php $total=count($cheque['Chequeinterese']);
												//debug($total);
												?>
							 <td><div style="float: right"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montocheque']),2,',','.'));?></div></td>
							 <td><div style="float: right"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montodescuentointeres']),2,',','.'));?></div></td>
							 <td><div style="float: right"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montoentregado']),2,',','.')); ?></div></td>
							 <td><?php echo h($cheque['Cheque']['fecharecibido']); ?></td>
							 <td><?php echo h($cheque['Cheque']['fechacobro']); ?></td>
							 <td><?php echo h($cheque['Cheque']['modified']); ?>&nbsp;</td>
							 <td><?php echo h('Devuelto'); ?></td>
							 <td><?php echo h($estado); ?>&nbsp;</td>
							 <td><?php echo h($cheque['Cheque1']['numerodecheque']); ?>&nbsp;</td>
							 <td><?php echo $this->Html->link($cheque['User']['username'], array('controller' => 'users', 'action' => 'view', $cheque['User']['id'])); ?></td>
							 <?/*estas son las acciones para modificar si está devuelto y esas cosas*/?>
							 <td class="actions">
									<?php echo $this->Html->image("historial.fw.png", array("alt" => "Historial",'width' => '18', 'heigth' => '18','title'=>'Historial','url' => array('action' => 'reporteinteres', $cheque['Cheque']['id'])));?>
									<?php echo $this->Html->image("cobrado.fw.png", array("alt" => "Cobrado",'width' => '18', 'heigth' => '18','title'=>'Cobrado','url' => array('action' => 'editadevuelto/'. $cheque['Cheque']['id'],2)));?>
									<?php echo $this->Html->image("ver.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Ver','url' => array('action' => 'view', $cheque['Cheque']['id'])));?>
									
									<?php $imagen= $this->Html->image("borrargrande.fw.png", array("alt" => "borrar",'width' => '18', 'heigth' =>'18','title'=>'Borrar'));
										echo $this->Html->link($imagen, array('action' => 'delete', $cheque['Cheque']['id']), array('escape'=>false), sprintf(__('Seguro que quiere eliminar el registro?', $cheque['Cheque']['id'])));?>
							 </td>			
		<?php }else{
				/*en esta parte del cheque del cliente solo nos debe el monto del interes cobrado. :D*/
				if($estado=='C'){?>
					<tr style="background: #f00; color: white;">
			<td><?php echo $this->Html->link($cheque['Banco']['nombre'], array('controller' => 'bancos', 'action' => 'view', $cheque['Banco']['id'])); ?></td>
			<td><?php echo $this->Html->link($cheque['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $cheque['Cliente']['id'])); ?></td>
			<td><?php echo $this->Html->link(__($cheque['Cheque']['numerodecheque']), array('action' => 'view', $cheque['Cheque']['id'])); ?>&nbsp;</td>
			<td><?php echo h($cheque['Cheque']['dias']); ?>&nbsp;</td>
            <td><?php 
				if($porcentaje==null)
				echo $this->Html->link($montofijo, array('controller' => 'interese', 'action' => 'view', $cheque['Interese']['id']))." Bs"; 
				else
				echo $this->Html->link($porcentaje, array('controller' => 'interese', 'action' => 'view', $cheque['Interese']['id']))." %"; 
				?></td>
                                <?php $total=count($cheque['Chequeinterese']);
                                //debug($total);
                                ?>
             <td><div style="float: right"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montocheque']),2,',','.'));?></div></td>
             <td><div style="float: right"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montodescuentointeres']),2,',','.'));?></div></td>
             <td><div style="float: right;"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montoentregado']),2,',','.')); ?></div></td>
			 <td><?php echo h($cheque['Cheque']['fecharecibido']); ?></td>
			 <td><?php echo h($cheque['Cheque']['fechacobro']); ?></td>
			 <td><?php echo h($cheque['Cheque']['modified']); ?>&nbsp;</td>
			 <td><?php echo h('Devuelto'); ?></td>
			 <td><?php echo h($estado); ?>&nbsp;</td>
             <td><?php echo h($cheque['Cheque1']['numerodecheque']); ?>&nbsp;</td>
			 <td><?php echo $this->Html->link($cheque['User']['username'], array('controller' => 'users', 'action' => 'view', $cheque['User']['id'])); ?></td>
			 <?/*estas son las acciones para modificar si está devuelto y esas cosas*/?>
			 <td class="actions">
                    <?php echo $this->Html->image("historial.fw.png", array("alt" => "Historial",'width' => '18', 'heigth' => '18','title'=>'Historial','url' => array('action' => 'reporteinteres', $cheque['Cheque']['id'])));?>                             
                    <?php echo $this->Html->image("cobrado.fw.png", array("alt" => "Cobrado",'width' => '18', 'heigth' => '18','title'=>'Cobrado','url' => array('action' => 'editadevuelto/'. $cheque['Cheque']['id'],2)));?>
                    <?php echo $this->Html->image("ver.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Ver','url' => array('action' => 'view', $cheque['Cheque']['id'])));?>
					<?php $imagen= $this->Html->image("borrargrande.fw.png", array("alt" => "borrar",'width' => '18', 'heigth' =>'18','title'=>'Borrar'));
						echo $this->Html->link($imagen, array('action' => 'delete', $cheque['Cheque']['id']), array('escape'=>false), sprintf(__('Seguro que quiere eliminar el registro?', $cheque['Cheque']['id'])));?>
			 </td>
		
		<?php }
		/*ESTE ESTADO CAMBIA SI EL CLIENTE ESTÁ EN R O EN C Y EL CHEQUE ESTÁ DEVUELTO*/
		?>
			
                <?php }}
                      if($cobrado==2){
                        if($estado=='R'){
                            if($deuda==0){
                ?>
            <tr style="background: #ffcaca; color: white;">
			<td><?php echo $this->Html->link($cheque['Banco']['nombre'], array('controller' => 'bancos', 'action' => 'view', $cheque['Banco']['id'])); ?></td>
			<td><?php echo $this->Html->link($cheque['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $cheque['Cliente']['id'])); ?></td>
			<td><?php echo $this->Html->link(__($cheque['Cheque']['numerodecheque']), array('action' => 'view', $cheque['Cheque']['id'])); ?>&nbsp;</td>
			<td><?php echo h($cheque['Cheque']['dias']); ?>&nbsp;</td>
            <td><?php 
				if($porcentaje==null)
				echo $this->Html->link($montofijo, array('controller' => 'interese', 'action' => 'view', $cheque['Interese']['id']))." Bs"; 
				else
				echo $this->Html->link($porcentaje, array('controller' => 'interese', 'action' => 'view', $cheque['Interese']['id']))." %"; 
				?></td>
                                <?php $total=count($cheque['Chequeinterese']);
                                //debug($total);
                                ?>
             <td><div style="float: right"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montocheque']),2,',','.'));?></div></td>
             <td><div style="float: right"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montodescuentointeres']),2,',','.'));?></div></td>
             <td><div style="float: right;"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montoentregado']),2,',','.')); ?></div></td>
			 <td><?php echo h($cheque['Cheque']['fecharecibido']); ?></td>
			 <td><?php echo h($cheque['Cheque']['fechacobro']); ?></td>
			 <td><?php echo h($cheque['Cheque']['modified']); ?>&nbsp;</td>
			 <td><?php echo h('Cobrado con Deuda'); ?></td>
			 <td><?php echo h($estado); ?>&nbsp;</td>
             <td><?php echo h($cheque['Cheque1']['numerodecheque']); ?>&nbsp;</td>
			 <td><?php echo $this->Html->link($cheque['User']['username'], array('controller' => 'users', 'action' => 'view', $cheque['User']['id'])); ?></td>
			 <?/*estas son las acciones para modificar si está devuelto y esas cosas*/?>
			 <td class="actions">                   
                    <?php echo $this->Html->image("historial.fw.png", array("alt" => "Historial",'width' => '18', 'heigth' => '18','title'=>'Historial','url' => array('action' => 'reporteinteres', $cheque['Cheque']['id'])));?>                             
                    <?php echo $this->Html->image("ver.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Ver','url' => array('action' => 'view', $cheque['Cheque']['id'])));?>
					<?php $imagen= $this->Html->image("borrargrande.fw.png", array("alt" => "borrar",'width' => '18', 'heigth' =>'18','title'=>'Borrar'));
						echo $this->Html->link($imagen, array('action' => 'delete', $cheque['Cheque']['id']), array('escape'=>false), sprintf(__('Seguro que quiere eliminar el registro?', $cheque['Cheque']['id'])));?>
			 </td>                    
                    <?php }}}  
                
                }
		/*cheques por fechado :D
		::::::::::::::::::::::::
		::::::::::::::::::::::::
		::::::::::::::::::::::::
		::::::::::::::::::::::::
		::::::::::::::::::::::::
		::::::::::::::::::::::::*/
		if($fechacobro>$hoy){
			/*cheques cuando aun no se ha cobrado*/
			if($cobrado==1){
				if($estado=='R'){
		?>
		<tr style="background: #ffffff; color: white;">
			<td><?php echo $this->Html->link($cheque['Banco']['nombre'], array('controller' => 'bancos', 'action' => 'view', $cheque['Banco']['id'])); ?></td>
			<td><?php echo $this->Html->link($cheque['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $cheque['Cliente']['id'])); ?></td>
			<td><?php echo $this->Html->link(__($cheque['Cheque']['numerodecheque']), array('action' => 'view', $cheque['Cheque']['id'])); ?>&nbsp;</td>
			<td><?php echo h($cheque['Cheque']['dias']); ?>&nbsp;</td>
            <td><?php 
				if($porcentaje==null)
				echo $this->Html->link($montofijo, array('controller' => 'interese', 'action' => 'view', $cheque['Interese']['id']))." Bs"; 
				else
				echo $this->Html->link($porcentaje, array('controller' => 'interese', 'action' => 'view', $cheque['Interese']['id']))." %"; 
				?></td>
                                <?php $total=count($cheque['Chequeinterese']);
                                //debug($total);
                                ?>
             <td><div style="float: right"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montocheque']),2,',','.'));?></div></td>
             <td><div style="float: right"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montodescuentointeres']),2,',','.'));?></div></td>
             <td><div style="float: right"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montoentregado']),2,',','.')); ?></div></td>
			 <td><?php echo h($cheque['Cheque']['fecharecibido']); ?></td>
			 <td><?php echo h($cheque['Cheque']['fechacobro']); ?></td>
			 <td><?php echo h($cheque['Cheque']['modified']); ?>&nbsp;</td>
			 <td><?php echo h('Por Cobrar'); ?></td>
			 <td><?php echo h($estado); ?>&nbsp;</td>
             <td><?php echo h($cheque['Cheque1']['numerodecheque']); ?>&nbsp;</td>
			 <td><?php echo $this->Html->link($cheque['User']['username'], array('controller' => 'users', 'action' => 'view', $cheque['User']['id'])); ?></td>
			 <?/*estas son las acciones para modificar si está devuelto y esas cosas*/?>
			 <td class="actions">
                    <?php echo $this->Html->image("historial.fw.png", array("alt" => "Historial",'width' => '18', 'heigth' => '18','title'=>'Historial','url' => array('action' => 'reporteinteres', $cheque['Cheque']['id'])));?>                             
                    <?php echo $this->Html->image("ver.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Ver','url' => array('action' => 'view', $cheque['Cheque']['id'])));?>
					<?php echo $this->Html->image("editar.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Editar','url' => array('action' => 'edit', $cheque['Cheque']['id']))); ?>
					<?php $imagen= $this->Html->image("borrargrande.fw.png", array("alt" => "borrar",'width' => '18', 'heigth' =>'18','title'=>'Borrar'));
						echo $this->Html->link($imagen, array('action' => 'delete', $cheque['Cheque']['id']), array('escape'=>false), sprintf(__('Seguro que quiere eliminar el registro?', $cheque['Cheque']['id'])));?>
			 </td>			
		<?php }else{
				/*en esta parte le debemos al cliente el monto del cheque menos el monto interes :D*/
				if($estado=='C'){?>
					<tr style="background: #ffffff; color: white;">
			<td><?php echo $this->Html->link($cheque['Banco']['nombre'], array('controller' => 'bancos', 'action' => 'view', $cheque['Banco']['id'])); ?></td>
			<td><?php echo $this->Html->link($cheque['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $cheque['Cliente']['id'])); ?></td>
			<td><?php echo $this->Html->link(__($cheque['Cheque']['numerodecheque']), array('action' => 'view', $cheque['Cheque']['id'])); ?>&nbsp;</td>
			<td><?php echo h($cheque['Cheque']['dias']); ?>&nbsp;</td>
            <td><?php 
				if($porcentaje==null)
				echo $this->Html->link($montofijo, array('controller' => 'interese', 'action' => 'view', $cheque['Interese']['id']))." Bs"; 
				else
				echo $this->Html->link($porcentaje, array('controller' => 'interese', 'action' => 'view', $cheque['Interese']['id']))." %"; 
				?></td>
                                <?php $total=count($cheque['Chequeinterese']);
                                //debug($total);
                                ?>
             <td><div style="float: right"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montocheque']),2,',','.'));?></div></td>
             <td><div style="float: right"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montodescuentointeres']),2,',','.'));?></div></td>
             <td><div style="float: right; background: #0f0;"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montoentregado']),2,',','.')); ?></div></td>
			 <td><?php echo h($cheque['Cheque']['fecharecibido']); ?></td>
			 <td><?php echo h($cheque['Cheque']['fechacobro']); ?></td>
			 <td><?php echo h($cheque['Cheque']['modified']); ?>&nbsp;</td>
			 <td><?php echo h('Por Cobrar'); ?></td>
			 <td><?php echo h($estado); ?>&nbsp;</td>
             <td><?php echo h($cheque['Cheque1']['numerodecheque']); ?>&nbsp;</td>
			 <td><?php echo $this->Html->link($cheque['User']['username'], array('controller' => 'users', 'action' => 'view', $cheque['User']['id'])); ?></td>
			 <?/*estas son las acciones para modificar si está devuelto y esas cosas*/?>
			 <td class="actions">
                    <?php echo $this->Html->image("historial.fw.png", array("alt" => "Historial",'width' => '18', 'heigth' => '18','title'=>'Historial','url' => array('action' => 'reporteinteres', $cheque['Cheque']['id'])));?>                                                 
                    <?php echo $this->Html->image("ver.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Ver','url' => array('action' => 'view', $cheque['Cheque']['id'])));?>
					<?php echo $this->Html->image("editar.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Editar','url' => array('action' => 'edit', $cheque['Cheque']['id']))); ?>
					<?php $imagen= $this->Html->image("borrargrande.fw.png", array("alt" => "borrar",'width' => '18', 'heigth' =>'18','title'=>'Borrar'));
						echo $this->Html->link($imagen, array('action' => 'delete', $cheque['Cheque']['id']), array('escape'=>false), sprintf(__('Seguro que quiere eliminar el registro?', $cheque['Cheque']['id'])));?>
			 </td>
		<?php }}} 
			if($cobrado==0){
				if($estado=='R'){
		?>
		<tr style="background: #f00; color: white;">
			<td><?php echo $this->Html->link($cheque['Banco']['nombre'], array('controller' => 'bancos', 'action' => 'view', $cheque['Banco']['id'])); ?></td>
			<td><?php echo $this->Html->link($cheque['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $cheque['Cliente']['id'])); ?></td>
			<td><?php echo $this->Html->link(__($cheque['Cheque']['numerodecheque']), array('action' => 'view', $cheque['Cheque']['id'])); ?>&nbsp;</td>
			<td><?php echo h($cheque['Cheque']['dias']); ?>&nbsp;</td>
            <td><?php 
				if($porcentaje==null)
				echo $this->Html->link($montofijo, array('controller' => 'interese', 'action' => 'view', $cheque['Interese']['id']))." Bs"; 
				else
				echo $this->Html->link($porcentaje, array('controller' => 'interese', 'action' => 'view', $cheque['Interese']['id']))." %"; 
				?></td>
                                <?php $total=count($cheque['Chequeinterese']);
                                //debug($total);
                                ?>
             <td><div style="float: right"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montocheque']),2,',','.'));?></div></td>
             <td><div style="float: right"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montodescuentointeres']),2,',','.'));?></div></td>
             <td><div style="float: right"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montoentregado']),2,',','.')); ?></div></td>
			 <td><?php echo h($cheque['Cheque']['fecharecibido']); ?></td>
			 <td><?php echo h($cheque['Cheque']['fechacobro']); ?></td>
			 <td><?php echo h($cheque['Cheque']['modified']); ?>&nbsp;</td>
			 <td><?php echo h('Por Cobrar'); ?></td>
			 <td><?php echo h($estado); ?>&nbsp;</td>
             <td><?php echo h($cheque['Cheque1']['numerodecheque']); ?>&nbsp;</td>
			 <td><?php echo $this->Html->link($cheque['User']['username'], array('controller' => 'users', 'action' => 'view', $cheque['User']['id'])); ?></td>
			 <?/*estas son las acciones para modificar si está devuelto y esas cosas*/?>
			 <td class="actions">
                    <?php #echo $this->Html->image("devuelto.fw.png", array("alt" => "Devuelto",'width' => '18', 'heigth' => '18','title'=>'Devuelto','url' => array('action' => 'editadevuelto/'. $cheque['Cheque']['id'],0)));?>
                    <?php echo $this->Html->image("historial.fw.png", array("alt" => "Historial",'width' => '18', 'heigth' => '18','title'=>'Historial','url' => array('action' => 'reporteinteres', $cheque['Cheque']['id'])));?>                             
                    <?php echo $this->Html->image("cobrado.fw.png", array("alt" => "Cobrado",'width' => '18', 'heigth' => '18','title'=>'Cobrado','url' => array('action' => 'editadevuelto/'. $cheque['Cheque']['id'],2)));?>
                    <?php echo $this->Html->image("ver.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Ver','url' => array('action' => 'view', $cheque['Cheque']['id'])));?>
					<?php echo $this->Html->image("editar.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Editar','url' => array('action' => 'edit', $cheque['Cheque']['id']))); ?>
					<?php $imagen= $this->Html->image("borrargrande.fw.png", array("alt" => "borrar",'width' => '18', 'heigth' =>'18','title'=>'Borrar'));
						echo $this->Html->link($imagen, array('action' => 'delete', $cheque['Cheque']['id']), array('escape'=>false), sprintf(__('Seguro que quiere eliminar el registro?', $cheque['Cheque']['id'])));?>
			 </td>			
		<?php }else{
				/*en esta parte le debemos al cliente el monto del cheque menos el monto interes :D*/
				if($estado=='C'){?>
					<tr style="background: #f00; color: white;">
			<td><?php echo $this->Html->link($cheque['Banco']['nombre'], array('controller' => 'bancos', 'action' => 'view', $cheque['Banco']['id'])); ?></td>
			<td><?php echo $this->Html->link($cheque['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $cheque['Cliente']['id'])); ?></td>
			<td><?php echo $this->Html->link(__($cheque['Cheque']['numerodecheque']), array('action' => 'view', $cheque['Cheque']['id'])); ?>&nbsp;</td>
			<td><?php echo h($cheque['Cheque']['dias']); ?>&nbsp;</td>
            <td><?php 
				if($porcentaje==null)
				echo $this->Html->link($montofijo, array('controller' => 'interese', 'action' => 'view', $cheque['Interese']['id']))." Bs"; 
				else
				echo $this->Html->link($porcentaje, array('controller' => 'interese', 'action' => 'view', $cheque['Interese']['id']))." %"; 
				?></td>
                                <?php $total=count($cheque['Chequeinterese']);
                                //debug($total);
                                ?>
             <td><div style="float: right"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montocheque']),2,',','.'));?></div></td>
             <td><div style="float: right"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montodescuentointeres']),2,',','.'));?></div></td>
             <td><div style="float: right;"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montoentregado']),2,',','.')); ?></div></td>
			 <td><?php echo h($cheque['Cheque']['fecharecibido']); ?></td>
			 <td><?php echo h($cheque['Cheque']['fechacobro']); ?></td>
			 <td><?php echo h($cheque['Cheque']['modified']); ?>&nbsp;</td>
			 <td><?php echo h('Por Cobrar'); ?></td>
			 <td><?php echo h($estado); ?>&nbsp;</td>
             <td><?php echo h($cheque['Cheque1']['numerodecheque']); ?>&nbsp;</td>
			 <td><?php echo $this->Html->link($cheque['User']['username'], array('controller' => 'users', 'action' => 'view', $cheque['User']['id'])); ?></td>
			 <?/*estas son las acciones para modificar si está devuelto y esas cosas*/?>
			 <td class="actions">
                    <?php echo $this->Html->image("historial.fw.png", array("alt" => "Historial",'width' => '18', 'heigth' => '18','title'=>'Historial','url' => array('action' => 'reporteinteres', $cheque['Cheque']['id'])));?>                             
                    <?php echo $this->Html->image("devuelto.fw.png", array("alt" => "Devuelto",'width' => '18', 'heigth' => '18','title'=>'Devuelto','url' => array('action' => 'editadevuelto/'. $cheque['Cheque']['id'],0)));?>
                    <?php echo $this->Html->image("cobrado.fw.png", array("alt" => "Cobrado",'width' => '18', 'heigth' => '18','title'=>'Cobrado','url' => array('action' => 'editadevuelto/'. $cheque['Cheque']['id'],2)));?>
                    <?php echo $this->Html->image("ver.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Ver','url' => array('action' => 'view', $cheque['Cheque']['id'])));?>
					<?php echo $this->Html->image("editar.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Editar','url' => array('action' => 'edit', $cheque['Cheque']['id']))); ?>
					<?php $imagen= $this->Html->image("borrargrande.fw.png", array("alt" => "borrar",'width' => '18', 'heigth' =>'18','title'=>'Borrar'));
						echo $this->Html->link($imagen, array('action' => 'delete', $cheque['Cheque']['id']), array('escape'=>false), sprintf(__('Seguro que quiere eliminar el registro?', $cheque['Cheque']['id'])));?>
			 </td>
		
		
		<?php }}}} if($cobrado==2){
                        if($estado=='R'){
                            if($deuda==0){
                ?>
            <tr style="background: #ffcaca; color: white;">
			<td><?php echo $this->Html->link($cheque['Banco']['nombre'], array('controller' => 'bancos', 'action' => 'view', $cheque['Banco']['id'])); ?></td>
			<td><?php echo $this->Html->link($cheque['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $cheque['Cliente']['id'])); ?></td>
			<td><?php echo $this->Html->link(__($cheque['Cheque']['numerodecheque']), array('action' => 'view', $cheque['Cheque']['id'])); ?>&nbsp;</td>
			<td><?php echo h($cheque['Cheque']['dias']); ?>&nbsp;</td>
            <td><?php 
				if($porcentaje==null)
				echo $this->Html->link($montofijo, array('controller' => 'interese', 'action' => 'view', $cheque['Interese']['id']))." Bs"; 
				else
				echo $this->Html->link($porcentaje, array('controller' => 'interese', 'action' => 'view', $cheque['Interese']['id']))." %"; 
				?></td>
                                <?php $total=count($cheque['Chequeinterese']);
                                //debug($total);
                                ?>
             <td><div style="float: right"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montocheque']),2,',','.'));?></div></td>
             <td><div style="float: right"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montodescuentointeres']),2,',','.'));?></div></td>
             <td><div style="float: right;"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montoentregado']),2,',','.')); ?></div></td>
			 <td><?php echo h($cheque['Cheque']['fecharecibido']); ?></td>
			 <td><?php echo h($cheque['Cheque']['fechacobro']); ?></td>
			 <td><?php echo h($cheque['Cheque']['modified']); ?>&nbsp;</td>
			 <td><?php echo h('Cobrado con Deuda'); ?></td>
			 <td><?php echo h($estado); ?>&nbsp;</td>
             <td><?php echo h($cheque['Cheque1']['numerodecheque']); ?>&nbsp;</td>
			 <td><?php echo $this->Html->link($cheque['User']['username'], array('controller' => 'users', 'action' => 'view', $cheque['User']['id'])); ?></td>
			 <?/*estas son las acciones para modificar si está devuelto y esas cosas*/?>
			 <td class="actions">                   
                    <?php echo $this->Html->image("historial.fw.png", array("alt" => "Historial",'width' => '18', 'heigth' => '18','title'=>'Historial','url' => array('action' => 'reporteinteres', $cheque['Cheque']['id'])));?>                             
                    <?php echo $this->Html->image("cobrado.fw.png", array("alt" => "Cobrado",'width' => '18', 'heigth' => '18','title'=>'Cobrado','url' => array('action' => 'editadevuelto/'. $cheque['Cheque']['id'],2)));?>
                    <?php echo $this->Html->image("ver.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Ver','url' => array('action' => 'view', $cheque['Cheque']['id'])));?>
					<?php $imagen= $this->Html->image("borrargrande.fw.png", array("alt" => "borrar",'width' => '18', 'heigth' =>'18','title'=>'Borrar'));
						echo $this->Html->link($imagen, array('action' => 'delete', $cheque['Cheque']['id']), array('escape'=>false), sprintf(__('Seguro que quiere eliminar el registro?', $cheque['Cheque']['id'])));?>
			 </td>                    
                    <?php }}}
		
		/*cheques por fechado :D
		::::::::::::::::::::::::
		::::::::::::::::::::::::
		::::::::::::::::::::::::
		::::::::::::::::::::::::
		::::::::::::::::::::::::
		::::::::::::::::::::::::*/
		if($fechacobro<$hoy){
			/*cheques cuando aun no se ha cobrado*/
			if($cobrado==1){
				if($estado=='R'){
		?>
		<tr style="background: #FECA40; color: white;">
			<td><?php echo $this->Html->link($cheque['Banco']['nombre'], array('controller' => 'bancos', 'action' => 'view', $cheque['Banco']['id'])); ?></td>
			<td><?php echo $this->Html->link($cheque['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $cheque['Cliente']['id'])); ?></td>
			<td><?php echo $this->Html->link(__($cheque['Cheque']['numerodecheque']), array('action' => 'view', $cheque['Cheque']['id'])); ?>&nbsp;</td>
			<td><?php echo h($cheque['Cheque']['dias']); ?>&nbsp;</td>
            <td><?php 
				if($porcentaje==null)
				echo $this->Html->link($montofijo, array('controller' => 'interese', 'action' => 'view', $cheque['Interese']['id']))." Bs"; 
				else
				echo $this->Html->link($porcentaje, array('controller' => 'interese', 'action' => 'view', $cheque['Interese']['id']))." %"; 
				?></td>
                                <?php $total=count($cheque['Chequeinterese']);
                                //debug($total);
                                ?>
             <td><div style="float: right"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montocheque']),2,',','.'));?></div></td>
             <td><div style="float: right"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montodescuentointeres']),2,',','.'));?></div></td>
             <td><div style="float: right"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montoentregado']),2,',','.')); ?></div></td>
			 <td><?php echo h($cheque['Cheque']['fecharecibido']); ?></td>
			 <td><?php echo h($cheque['Cheque']['fechacobro']); ?></td>
			 <td><?php echo h($cheque['Cheque']['modified']); ?>&nbsp;</td>
			 <td><?php echo h('Por Cobrar'); ?></td>
			 <td><?php echo h($estado); ?>&nbsp;</td>
             <td><?php echo h($cheque['Cheque1']['numerodecheque']); ?>&nbsp;</td>
			 <td><?php echo $this->Html->link($cheque['User']['username'], array('controller' => 'users', 'action' => 'view', $cheque['User']['id'])); ?></td>
			 <?/*estas son las acciones para modificar si está devuelto y esas cosas*/?>
			 <td class="actions">
                    <?php echo $this->Html->image("historial.fw.png", array("alt" => "Historial",'width' => '18', 'heigth' => '18','title'=>'Historial','url' => array('action' => 'reporteinteres', $cheque['Cheque']['id'])));?>                             
                    <?php echo $this->Html->image("devuelto.fw.png", array("alt" => "Devuelto",'width' => '18', 'heigth' => '18','title'=>'Devuelto','url' => array('action' => 'editadevuelto/'. $cheque['Cheque']['id'],0)));?>
                    <?php echo $this->Html->image("cobrado.fw.png", array("alt" => "Cobrado",'width' => '18', 'heigth' => '18','title'=>'Cobrado','url' => array('action' => 'editadevuelto/'. $cheque['Cheque']['id'],2)));?>
                    <?php echo $this->Html->image("ver.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Ver','url' => array('action' => 'view', $cheque['Cheque']['id'])));?>
					<?php echo $this->Html->image("editar.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Editar','url' => array('action' => 'edit', $cheque['Cheque']['id']))); ?>
					<?php $imagen= $this->Html->image("borrargrande.fw.png", array("alt" => "borrar",'width' => '18', 'heigth' =>'18','title'=>'Borrar'));
						echo $this->Html->link($imagen, array('action' => 'delete', $cheque['Cheque']['id']), array('escape'=>false), sprintf(__('Seguro que quiere eliminar el registro?', $cheque['Cheque']['id'])));?>
			 </td>			
		<?php }else{
				/*en esta parte le debemos al cliente el monto del cheque menos el monto interes :D*/
				if($estado=='C'){?>
					<tr style="background: #FECA40; color: white;">
			<td><?php echo $this->Html->link($cheque['Banco']['nombre'], array('controller' => 'bancos', 'action' => 'view', $cheque['Banco']['id'])); ?></td>
			<td><?php echo $this->Html->link($cheque['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $cheque['Cliente']['id'])); ?></td>
			<td><?php echo $this->Html->link(__($cheque['Cheque']['numerodecheque']), array('action' => 'view', $cheque['Cheque']['id'])); ?>&nbsp;</td>
			<td><?php echo h($cheque['Cheque']['dias']); ?>&nbsp;</td>
            <td><?php 
				if($porcentaje==null)
				echo $this->Html->link($montofijo, array('controller' => 'interese', 'action' => 'view', $cheque['Interese']['id']))." Bs"; 
				else
				echo $this->Html->link($porcentaje, array('controller' => 'interese', 'action' => 'view', $cheque['Interese']['id']))." %"; 
				?></td>
                                <?php $total=count($cheque['Chequeinterese']);
                                //debug($total);
                                ?>
             <td><div style="float: right"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montocheque']),2,',','.'));?></div></td>
             <td><div style="float: right"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montodescuentointeres']),2,',','.'));?></div></td>
             <td><div style="float: right; background: #0f0;"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montoentregado']),2,',','.')); ?></div></td>
			 <td><?php echo h($cheque['Cheque']['fecharecibido']); ?></td>
			 <td><?php echo h($cheque['Cheque']['fechacobro']); ?></td>
			 <td><?php echo h($cheque['Cheque']['modified']); ?>&nbsp;</td>
			 <td><?php echo h('Por Cobrar'); ?></td>
			 <td><?php echo h($estado); ?>&nbsp;</td>
             <td><?php echo h($cheque['Cheque1']['numerodecheque']); ?>&nbsp;</td>
			 <td><?php echo $this->Html->link($cheque['User']['username'], array('controller' => 'users', 'action' => 'view', $cheque['User']['id'])); ?></td>
			 <?/*estas son las acciones para modificar si está devuelto y esas cosas*/?>
			 <td class="actions">
                    <?php echo $this->Html->image("historial.fw.png", array("alt" => "Historial",'width' => '18', 'heigth' => '18','title'=>'Historial','url' => array('action' => 'reporteinteres', $cheque['Cheque']['id'])));?>                             
                    <?php echo $this->Html->image("cobrado.fw.png", array("alt" => "Cobrado",'width' => '18', 'heigth' => '18','title'=>'Cobrado','url' => array('action' => 'editadevuelto/'. $cheque['Cheque']['id'],2)));?>
                    <?php echo $this->Html->image("ver.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Ver','url' => array('action' => 'view', $cheque['Cheque']['id'])));?>

					<?php $imagen= $this->Html->image("borrargrande.fw.png", array("alt" => "borrar",'width' => '18', 'heigth' =>'18','title'=>'Borrar'));
						echo $this->Html->link($imagen, array('action' => 'delete', $cheque['Cheque']['id']), array('escape'=>false), sprintf(__('Seguro que quiere eliminar el registro?', $cheque['Cheque']['id'])));?>
			 </td>
		<?php }}} 
			if($cobrado==0){
				if($estado=='R'){
		?>
		<tr style="background: #f00; color: white;">
			<td><?php echo $this->Html->link($cheque['Banco']['nombre'], array('controller' => 'bancos', 'action' => 'view', $cheque['Banco']['id'])); ?></td>
			<td><?php echo $this->Html->link($cheque['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $cheque['Cliente']['id'])); ?></td>
			<td><?php echo $this->Html->link(__($cheque['Cheque']['numerodecheque']), array('action' => 'view', $cheque['Cheque']['id'])); ?>&nbsp;</td>
			<td><?php echo h($cheque['Cheque']['dias']); ?>&nbsp;</td>
            <td><?php 
				if($porcentaje==null)
				echo $this->Html->link($montofijo, array('controller' => 'interese', 'action' => 'view', $cheque['Interese']['id']))." Bs"; 
				else
				echo $this->Html->link($porcentaje, array('controller' => 'interese', 'action' => 'view', $cheque['Interese']['id']))." %"; 
				?></td>
                                <?php $total=count($cheque['Chequeinterese']);
                                //debug($total);
                                ?>
             <td><div style="float: right"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montocheque']),2,',','.'));?></div></td>
             <td><div style="float: right"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montodescuentointeres']),2,',','.'));?></div></td>
             <td><div style="float: right"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montoentregado']),2,',','.')); ?></div></td>
			 <td><?php echo h($cheque['Cheque']['fecharecibido']); ?></td>
			 <td><?php echo h($cheque['Cheque']['fechacobro']); ?></td>
			 <td><?php echo h($cheque['Cheque']['modified']); ?>&nbsp;</td>
			 <td><?php echo h('Devuelto'); ?></td>
			 <td><?php echo h($estado); ?>&nbsp;</td>
             <td><?php echo h($cheque['Cheque1']['numerodecheque']); ?>&nbsp;</td>
			 <td><?php echo $this->Html->link($cheque['User']['username'], array('controller' => 'users', 'action' => 'view', $cheque['User']['id'])); ?></td>
			 <?/*estas son las acciones para modificar si está devuelto y esas cosas*/?>
			 <td class="actions">
                    <?php echo $this->Html->image("historial.fw.png", array("alt" => "Historial",'width' => '18', 'heigth' => '18','title'=>'Historial','url' => array('action' => 'reporteinteres', $cheque['Cheque']['id'])));?>                             
                    <?php echo $this->Html->image("cobrado.fw.png", array("alt" => "Cobrado",'width' => '18', 'heigth' => '18','title'=>'Cobrado','url' => array('action' => 'editadevuelto/'. $cheque['Cheque']['id'],2)));?>
                    <?php echo $this->Html->image("ver.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Ver','url' => array('action' => 'view', $cheque['Cheque']['id'])));?>

					<?php $imagen= $this->Html->image("borrargrande.fw.png", array("alt" => "borrar",'width' => '18', 'heigth' =>'18','title'=>'Borrar'));
						echo $this->Html->link($imagen, array('action' => 'delete', $cheque['Cheque']['id']), array('escape'=>false), sprintf(__('Seguro que quiere eliminar el registro?', $cheque['Cheque']['id'])));?>
			 </td>			
		<?php }else{
				/*en esta parte le debemos al cliente el monto del cheque menos el monto interes :D*/
				if($estado=='C'){?>
					<tr style="background: #f00; color: white;">
			<td><?php echo $this->Html->link($cheque['Banco']['nombre'], array('controller' => 'bancos', 'action' => 'view', $cheque['Banco']['id'])); ?></td>
			<td><?php echo $this->Html->link($cheque['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $cheque['Cliente']['id'])); ?></td>
			<td><?php echo $this->Html->link(__($cheque['Cheque']['numerodecheque']), array('action' => 'view', $cheque['Cheque']['id'])); ?>&nbsp;</td>
			<td><?php echo h($cheque['Cheque']['dias']); ?>&nbsp;</td>
            <td><?php 
				if($porcentaje==null)
				echo $this->Html->link($montofijo, array('controller' => 'interese', 'action' => 'view', $cheque['Interese']['id']))." Bs"; 
				else
				echo $this->Html->link($porcentaje, array('controller' => 'interese', 'action' => 'view', $cheque['Interese']['id']))." %"; 
				?></td>
                                <?php $total=count($cheque['Chequeinterese']);
                                //debug($total);
                                ?>
             <td><div style="float: right"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montocheque']),2,',','.'));?></div></td>
             <td><div style="float: right"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montodescuentointeres']),2,',','.'));?></div></td>
             <td><div style="float: right;"><?php echo h(number_format(floatval($cheque['Chequeinterese'][$total-1]['montoentregado']),2,',','.')); ?></div></td>
			 <td><?php echo h($cheque['Cheque']['fecharecibido']); ?></td>
			 <td><?php echo h($cheque['Cheque']['fechacobro']); ?></td>
			 <td><?php echo h($cheque['Cheque']['modified']); ?>&nbsp;</td>
			 <td><?php echo h('Devuelto'); ?></td>
			 <td><?php echo h($estado); ?>&nbsp;</td>
             <td><?php echo h($cheque['Cheque1']['numerodecheque']); ?>&nbsp;</td>
			 <td><?php echo $this->Html->link($cheque['User']['username'], array('controller' => 'users', 'action' => 'view', $cheque['User']['id'])); ?></td>
			 <?/*estas son las acciones para modificar si está devuelto y esas cosas*/?>
			 <td class="actions">                   
                    <?php echo $this->Html->image("historial.fw.png", array("alt" => "Historial",'width' => '18', 'heigth' => '18','title'=>'Historial','url' => array('action' => 'reporteinteres', $cheque['Cheque']['id'])));?>                             
                    <?php echo $this->Html->image("cobrado.fw.png", array("alt" => "Cobrado",'width' => '18', 'heigth' => '18','title'=>'Cobrado','url' => array('action' => 'editadevuelto/'. $cheque['Cheque']['id'],2)));?>
                    <?php echo $this->Html->image("ver.fw.png", array("alt" => "Ver",'width' => '18', 'heigth' => '18','title'=>'Ver','url' => array('action' => 'view', $cheque['Cheque']['id'])));?>
					<?php $imagen= $this->Html->image("borrargrande.fw.png", array("alt" => "borrar",'width' => '18', 'heigth' =>'18','title'=>'Borrar'));
						echo $this->Html->link($imagen, array('action' => 'delete', $cheque['Cheque']['id']), array('escape'=>false), sprintf(__('Seguro que quiere eliminar el registro?', $cheque['Cheque']['id'])));?>
			 </td>
		
		
		<?php }}} 
                
                    } ?>
<?php  endforeach; ?>
</table>
     <?php
	echo $this->Paginator->counter(array(
	'format' => __('Página {:page} de {:pages}, mostrando {:current} registros de {:count} en total, iniciando en el registro {:start}, finalizando en {:end}')
	));
	?>	
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('Atras'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>

 </div>