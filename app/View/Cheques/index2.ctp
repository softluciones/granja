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
 
    <h2 style="clear: both"><?php #debug($sumas); 
        echo __('Cheques Cobrados'); ?></h2>
	<table cellpadding="0"  align="center" style="width:100%">
            <thead>
	<tr>
			
			<th><?php echo $this->Paginator->sort('banco_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cliente_id'); ?></th>
			
			
			<th><?php echo $this->Paginator->sort('numerodecheque','Cheque');?></th>
                        <th><?php echo $this->Paginator->sort('dias','Días'); ?></th>
			<th><?php echo $this->Paginator->sort('interese_id','Intereses'); ?></th>
			<th><?php echo $this->Paginator->sort('monto','Monto'); ?></th>
                        <th><?php echo $this->Paginator->sort('montointereses','Monto de Interes'); ?></th>
                        <th><?php echo $this->Paginator->sort('montoentregado','Monto Entregado'); ?></th>
                        
			<th><?php echo $this->Paginator->sort('fecharecibido','Fecha de Recibido'); ?></th>
			<th><?php echo $this->Paginator->sort('fechacobro','Fecha de Cobro'); ?></th>
			
			<th><?php echo $this->Paginator->sort('cheque','Estado de Cheque'); ?></th>
                        <th><?php echo $this->Paginator->sort('estado'); ?></th>
			
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
                        <th class="actions"><?php echo 'Acciones'; ?></th>
	</tr>
        </thead>
	<?php foreach ($cheques as $cheque): ?>
	<?php 
                
                
              
        if($cheque['Cheque']['cobrado']==2){ ?>
        <tr >
		
		<td>
			<?php echo $this->Html->link($cheque['Banco']['nombre'], array('controller' => 'bancos', 'action' => 'view', $cheque['Banco']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($cheque['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $cheque['Cliente']['id'])); ?>
		</td>
                
		
		
		<td><?php echo $this->Html->link(__($cheque['Cheque']['numerodecheque']), array('action' => 'view', $cheque['Cheque']['id']));
                          #echo h(); ?>&nbsp;</td>
                <td><?php echo h($cheque['Cheque']['dias']); ?>&nbsp;</td>
		<td>
			<?php 
                        if($cheque['Interese']['porcentaje']==null)
                        echo $this->Html->link($cheque['Interese']['montofijo'], array('controller' => 'interese', 'action' => 'view', $cheque['Interese']['id']))." Bs"; 
                        else
                        echo $this->Html->link($cheque['Interese']['porcentaje'], array('controller' => 'interese', 'action' => 'view', $cheque['Interese']['id']))." %"; 
                        ?>
                        
		</td>
		<td><?php 
                echo h(number_format(floatval($cheque['Cheque']['monto']),2,',','.'));
                ?>&nbsp;</td>
                <td><?php 
                echo h(number_format(floatval($cheque['Chequeinterese'][0]['montodescuentointeres']),2,',','.'));
                 ?>&nbsp;</td>
                <td><?php 
                echo h(number_format(floatval($cheque['Chequeinterese'][0]['montoentregado']),2,',','.'));
                ?>&nbsp;</td>
                
		<td><?php 
                $cobro = new DateTime($cheque['Cheque']['fecharecibido']);
                $cobro = $cobro->format('d-m-Y');
                echo $cobro; ?>&nbsp;</td>
		<td><?php 
                $cobro = new DateTime($cheque['Cheque']['fechacobro']);
                $cobro = $cobro->format('d-m-Y');
                echo $cobro; ?>&nbsp;</td>
		
                
		<td><?php 
                            if($cheque['Cheque']['cobrado']==1)
                                echo h('Por Cobrar');
                            else
                                if($cheque['Cheque']['cobrado']==2)
                                    echo h('Cobrado');
                                else
                                    echo h('Devuelto');
                                    ?>&nbsp;</td>
		<td><?php echo h($cheque['User']['Estadocheque']['0']['nomenclatura']); ?>&nbsp;</td>
             
		<td>
			<?php echo $this->Html->link($cheque['User']['username'], array('controller' => 'users', 'action' => 'view', $cheque['User']['id'])); ?>
		</td>
                <td>
		<?php $imagen= $this->Html->image("borrargrande.fw.png", array("alt" => "borrar",'width' => '18', 'heigth' =>'18','title'=>'Borrar'));
										echo $this->Html->link($imagen, array('action' => 'delete2', $cheque['Cheque']['id']), array('escape'=>false), sprintf(__('Seguro que quiere eliminar el registro?', $cheque['Cheque']['id'])));?>
                    </td>
	</tr>
        <?php } ?>
<?php  endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página {:page} de {:pages}, mostrando {:current} registros de {:count} en total, iniciando en {:start}, terminando en {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('Atras'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
