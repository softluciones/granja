<?php


$cakeDescription = __d('cake_dev', 'Gravimon C.A.');
?>
<script>
    $(document).ready(function(){
        
    
 $(function () {

$("#datepicker").datepicker();
});

  });
  </script>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
                echo $this->Html->css('styles1');
                echo $this->Html->css('jquery-ui-1.10.3.custom');
                echo $this->Html->css('jquery-ui-1.10.3.custom.min');
                echo $this->Html->script('jquery-1.9.1');
                echo $this->Html->script('jquery-ui-1.10.3.custom');
                echo $this->Html->script('jquery-ui-1.10.3.custom.min');
               
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
		</div>
            <div id='cssmenu'>
<ul>
   <li class='has-sub'>
    
         <?php echo $this->Html->link("Ficha Cliente", array('controller'=>'clientes','action' => 'index'), array('escape' => false));?></li>
      
 
   <li class='has-sub'><a href='#'><span>Servicios</span></a>
      <ul>
         <li class='has-sub'><a href='#'><span>Cheques</span></a>
            <ul>
               <li><?php echo $this->Html->link("Nuevo Cheque", array('controller'=>'cheques','action' => 'add'), array('escape' => false));?></li>
               <li><?php echo $this->Html->link("Relación Diaria Cheque", array('controller'=>'cheques','action' => 'index'), array('escape' => false));?></li>
             
               
            </ul>
         </li>
         <li class='has-sub'><a href='#'><span>Prestamos</span></a>
            <ul>
               <li><?php echo $this->Html->link("Nuevo Prestamo", array('controller'=>'cheques','action' => 'add'), array('escape' => false));?></li>
               <li><?php echo $this->Html->link("Relación diaria prestamo", array('controller'=>'cheques','action' => 'index'), array('escape' => false));?></li>
             
               
            </ul>
         </li>
         
         <li class='has-sub'>
    
         <?php echo $this->Html->link("Depositos", array('controller'=>'clientes','action' => 'index'), array('escape' => false));?></li>
          <li class='has-sub'>
    
         <?php echo $this->Html->link("Transferencias", array('controller'=>'clientes','action' => 'index'), array('escape' => false));?></li>
           <li class='has-sub'>
    
         <?php echo $this->Html->link("Otros Servicios", array('controller'=>'clientes','action' => 'index'), array('escape' => false));?></li>
      </ul>
       
   </li>
   
   
   <li class='has-sub'><a href='#'><span>Reportes</span></a>
       
      <ul>
          <li class='has-sub'><a href='#'><span>Cheques</span></a>
            <ul>
               
               <li><?php echo $this->Html->link("Relación Diaria Cheque", array('controller'=>'cheques','action' => 'index'), array('escape' => false));?></li>
             <li><?php echo $this->Html->link("Cheques Devueltos", array('controller'=>'cheques','action' => 'devueltos'), array('escape' => false));?></li>         
         <li><?php echo $this->Html->link("Cheques Cobrados", array('controller'=>'cheques','action' => 'index2'), array('escape' => false));?></li>
               
            </ul>
         </li>
         <li class='has-sub'><a href='#'><span>Prestamo</span></a>
            <ul>
               
               <li><?php echo $this->Html->link("Relación Diaria Prestamo", array('controller'=>'cheques','action' => 'index'), array('escape' => false));?></li>
             <li><?php echo $this->Html->link("Prestamo Paga Diario", array('controller'=>'cheques','action' => 'devueltos'), array('escape' => false));?></li>         
         <li><?php echo $this->Html->link("Prestamo por interes", array('controller'=>'cheques','action' => 'index2'), array('escape' => false));?></li>
               
            </ul>
         </li>
      </ul>
   </li>
   
   <li class='has-sub'><a href='#'><span>Capital </span></a>
       
      <ul>
           <li><?php echo $this->Html->link("Gastos", array('controller'=>'cheques','action' => 'index'), array('escape' => false));?></li>
            <li><?php echo $this->Html->link("Cuentas Por Pagar", array('controller'=>'cheques','action' => 'index'), array('escape' => false));?></li>
         <li class='has-sub'><a href='#'><span>Totales en Cuentas</span></a>
            <ul>
               
               <li><?php echo $this->Html->link("Agregar Cuenta Interna", array('controller'=>'cheques','action' => 'index'), array('escape' => false));?></li>
             <li><?php echo $this->Html->link("Registrar Montos", array('controller'=>'cheques','action' => 'devueltos'), array('escape' => false));?></li>         
         <li><?php echo $this->Html->link("Retiro de Cuenta", array('controller'=>'cheques','action' => 'index2'), array('escape' => false));?></li>
          <li><?php echo $this->Html->link("Deposito en Cuenta", array('controller'=>'cheques','action' => 'index2'), array('escape' => false));?></li>
           <li><?php echo $this->Html->link("Transferencia entre cuentas", array('controller'=>'cheques','action' => 'index2'), array('escape' => false));?></li>
           
               
            </ul>
             
         </li>
         <li><?php echo $this->Html->link("Inventario", array('controller'=>'cheques','action' => 'index'), array('escape' => false));?></li>
          <li class='has-sub'><a href='#'><span>Reportes Capital</span></a>
            <ul>
               
               <li><?php echo $this->Html->link("Ganancias y Perdidas", array('controller'=>'cheques','action' => 'index'), array('escape' => false));?></li>
             <li><?php echo $this->Html->link("Monto en Bancos", array('controller'=>'cheques','action' => 'devueltos'), array('escape' => false));?></li>         
         <li><?php echo $this->Html->link("Ganancias por Cheques", array('controller'=>'cheques','action' => 'index2'), array('escape' => false));?></li>
          <li><?php echo $this->Html->link("Ganancias Por Prestamo", array('controller'=>'cheques','action' => 'index2'), array('escape' => false));?></li>
           <li><?php echo $this->Html->link("Ganancias Por Pagos a Terceros", array('controller'=>'cheques','action' => 'index2'), array('escape' => false));?></li>
           <li><?php echo $this->Html->link("Ganancias Por Transferencias y Depositos", array('controller'=>'cheques','action' => 'index2'), array('escape' => false));?></li>
           <li><?php echo $this->Html->link("Otros Ingresos", array('controller'=>'cheques','action' => 'index2'), array('escape' => false));?></li>
               
            </ul>
             
         </li>
         <li><?php echo $this->Html->link("Gestionar Ingresos Varios", array('controller'=>'cheques','action' => 'index'), array('escape' => false));?></li>
         <li class='has-sub'><a href='#'><span>Cheques Propios</span></a>
            <ul>
               
               <li><?php echo $this->Html->link("Cheques Recibidos", array('controller'=>'cheques','action' => 'index'), array('escape' => false));?></li>
             <li><?php echo $this->Html->link("Cheques Entregados", array('controller'=>'cheques','action' => 'devueltos'), array('escape' => false));?></li>         
            
            </ul>
             
         </li>
      </ul>
   </li>
   <li class='has-sub last'><a href='#'><span>Parametros</span></a>
      <ul>
         <li><?php echo $this->Html->link("Clientes", array('controller'=>'clientes','action' => 'index'), array('escape' => false));?></li>    
          <li><?php echo $this->Html->link("Usuarios", array('controller'=>'users','action' => 'index'), array('escape' => false));?></li>         
          <li><?php echo $this->Html->link("Bancos", array('controller'=>'bancos','action' => 'index'), array('escape' => false));?></li>         
         <li><?php echo $this->Html->link("Estado de Cheques", array('controller'=>'estadocheques','action' => 'index'), array('escape' => false));?></li>         
          <li><?php echo $this->Html->link("Roles", array('controller'=>'roles','action' => 'index'), array('escape' => false));?></li>         
          <li><?php echo $this->Html->link("Formas de Pago", array('controller'=>'tipopagos','action' => 'index'), array('escape' => false));?></li>         
          <li class="last"><?php echo $this->Html->link("Intereses", array('controller'=>'interese','action' => 'index'), array('escape' => false));?></li>         

      </ul>
   </li>
   <li><?php 
  
        echo $this->Html->link("Cerrar Sesión", array('controller'=>'users','action' => 'logout'), array('escape' => false));?></li>
</ul>
</div>

		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
            
		<div id="footer">
			<?php echo 'Derechos reservados Gravimon C.A.';
					
				
			?>
		</div>
	</div>
	<?php #echo $this->element('sql_dump'); ?>
</body>
</html>
