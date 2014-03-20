<?php

$fpdf->AliasNbPages();
$fpdf->AddPage();

$fpdf->SetAutoPageBreak(true,15); 
$fpdf->SetFont('Times','B',12);

 $fpdf->Cell(0,0,utf8_decode('Reporte General de Cheques'),0,0,'C');


$fpdf->Ln(2); 
 

 $totaldeuda=0;
                $debo=0;
                $medeben=0;
                $totalentregado=0;
                $totalmontocheques=0;
                 $devueltos =0;
                    $cobrados=0;
                    $porcobrar=0;

if (!empty($cheques)){
		$fpdf->SetFont('Times','B',10);
		$fpdf->Cell(0,10,'Cheques:',0,1,'C');
		$fpdf->SetFont('Times','',8);
                $fpdf->Cell(0,5,'Simbolo (-) en el monto deuda implica que le debo al cliente',0,1,'R');
		$fpdf->SetFont('Times','',8);
                $fpdf->Ln(5);

//***************   Cheques Diarios*************************************************************

		$header=array('Banco','Cliente','Cheque','Días','Int.','Monto Orig','Deuda','Intereses','Entregado','Recibido','Cobro','Cheque','Edo.','Pago a cheque','Usuario'); 
		$i=0;
		foreach ($cheques as $cheq):
                    $nombrecliente=$cheq['Cliente']['apodo'];
                    if($cheq['Interese']['montofijo']==null){
                       $interes= $cheq['Interese']['porcentaje']."%";
                    }else{
                        $interes=$cheq['Interese']['montofijo'];
                    }
                    $pos = count($cheq['Chequeinterese']);
                    $pose = count($cheq['ChequeEstadocheque']);
                    $recibido = new Datetime($cheq['Cheque']['fecharecibido']);
                    $recibido = $recibido->format('d/m/Y');
                    $cobro = new Datetime($cheq['Cheque']['fechacobro']);
                    $cobro = $cobro->format('d/m/Y');
                   
                    if($cheq['Cheque']['cobrado']==0){
                        $cobrado="Devuelto";
                        $devueltos+=$cheq['Cheque']['monto'];
                    }
                    if($cheq['Cheque']['cobrado']==1){
                        $cobrado="Por Cobrar";
                        $porcobrar += $cheq['Cheque']['monto'];
                    }
                    if($cheq['Cheque']['cobrado']==2){
                        $cobrado="Cobrado";
                        $cobrados+=$cheq['Cheque']['monto'];
                    }
                    if($cheq['ChequeEstadocheque'][$pose-1]['estadocheque_id']==1){
                        $estado = 'R';
                    }
                    if($cheq['ChequeEstadocheque'][$pose-1]['estadocheque_id']==2){
                        $estado = 'C';
                    }
                    if($cheq['ChequeEstadocheque'][$pose-1]['estadocheque_id']==3){
                        $estado = 'AbnGC';
                    }
                    if($cheq['ChequeEstadocheque'][$pose-1]['estadocheque_id']==4){
                        $estado = 'AbnCG';
                    }
                    if($cheq['Cheque']['cheque_id']==null){
                        $apagar = "NO";
                    }else{
                        $apagar = $cheq['Cheque1']['numerodecheque'];
                    }
                    if($apagar==''){
                        $apagar="NO";
                    }
                    $ledebo=0;
                    $pos=count($cheq['Chequeinterese']);
        if($cheq['Chequeinterese'][$pos-1]['montocheque']>0){
      # echo $cheque['ChequeEstadocheque'][$posiciones-1]['estadocheque_id'];
            if($cheq['ChequeEstadocheque'][0]['estadocheque_id']==2){
                if($cheq['Cheque']['cobrado']!=0){
                    $ledebo=1;
                    
                }else{
                    $ledebo=0;
                }
            }
            if($cheq['ChequeEstadocheque'][0]['estadocheque_id']==1){
                if($cheq['Cheque']['cobrado']==2&& $cheq['Cheque']['deuda']==0){
                   $ledebo=0;
                    
                }if($cheq['Cheque']['cobrado']==0){
                   $ledebo=0;
                }
            }
        }   
               
                    $monto=number_format(floatval($cheq['Cheque']['monto']),2,',','.');
                    $totalmontocheques+=$cheq['Cheque']['monto'];
                    if($ledebo==0){ //ME DEBE
                        $montocheque = number_format(floatval($cheq['Chequeinterese'][$pos-1]['montocheque']),2,',','.');
                        $totaldeuda+=$cheq['Chequeinterese'][$pos-1]['montocheque'];
                        $medeben+=$cheq['Chequeinterese'][$pos-1]['montocheque'];
                    }
                    if($ledebo==1){  //LE DEBO
                         $montocheque = number_format(floatval($cheq['Chequeinterese'][$pos-1]['montocheque']),2,',','.');
                        $totaldeuda-=$cheq['Chequeinterese'][$pos-1]['montocheque'];
                        $debo+=$cheq['Chequeinterese'][$pos-1]['montocheque'];
                        $montocheque = "(-)".number_format(floatval($cheq['Chequeinterese'][$pos-1]['montocheque']),2,',','.');
                        
                    }
                    $montointeres = number_format(floatval( $cheq['Chequeinterese'][$pos-1]['montodescuentointeres']),2,',','.');
                    
                    
                    $montoentregado = number_format(floatval($cheq['Chequeinterese'][$pos-1]['montoentregado']),2,',','.');
                    $totalentregado+=$cheq['Chequeinterese'][$pos-1]['montoentregado'];
			$data2[$i]=array($cheq['Banco']['nombre'],$nombrecliente, $cheq['Cheque']['numerodecheque'],$cheq['Cheque']['dias'],$interes,$monto,$montocheque,
                            $montointeres,$montoentregado,$recibido, $cobro, $cobrado, $estado,$apagar,$cheq['User']['username']);
		$i++;
	
		endforeach;	
				
$colWidth = array(15,20,15,10,10,20,22,22,22,15,15,15,10,20,15); 
$fpdf->Tabla($header,$colWidth, $data2); 

$fpdf->Ln(3); 
        $fpdf->SetFont('');
        $fpdf->Cell(0,1,'Por Cobrar: '.number_format(floatval($porcobrar),2,',','.')." Bs.",0,1,'R');
        $fpdf->Ln(3); 
        $fpdf->SetFont('');
        $fpdf->Cell(0,1,'Devueltos: '.number_format(floatval($devueltos),2,',','.')." Bs.",0,1,'R');
        $fpdf->Ln(3);             
        $fpdf->SetFont('');
        $fpdf->Cell(0,1,'Cobrado: '.number_format(floatval($cobrados),2,',','.')." Bs.",0,1,'R');
         $fpdf->Ln(3);  
        $fpdf->SetFont('','B');
	$fpdf->Cell(0,1,'Monto Total en Cheques: '.number_format(floatval($totalmontocheques),2,',','.')." Bs.",0,1,'R');
        $fpdf->Ln(3);
        $fpdf->SetFont('');
        $fpdf->Cell(0,1,'Debo(-): '.number_format(floatval($debo),2,',','.')." Bs.",0,1,'R');
        $fpdf->Ln(3);
        $fpdf->SetFont('');
        $fpdf->Cell(0,1,'Me deben(+): '.number_format(floatval($medeben),2,',','.')." Bs.",0,1,'R');
        $fpdf->Ln(3);             
        $fpdf->SetFont('','B');
        $fpdf->Cell(0,1,'Total deuda: '.number_format(floatval($totaldeuda),2,',','.')." Bs.",0,1,'R');
        $fpdf->Ln(3);             
        $fpdf->SetFont('','B');
        $fpdf->Cell(0,1,'Monto Entregado: '.number_format(floatval($totalentregado),2,',','.')." Bs.",0,1,'R');

$fpdf->AddPage(); 
     if(!empty($pago)){   

		$fpdf->SetFont('Times','B',10);
		$fpdf->Cell(0,10,'Pagos:',0,1,'C');
		$fpdf->SetFont('Times','',8);
                $fpdf->Ln(2);

//***************   Pagos con Cheque*************************************************************

		$header=array('Cliente','Monto','Cheque','Concepto de','Tipo de Pago','Usuario'); 
		$i=0;
                $totalpagos=0;
		foreach ($pago as $pagos):
                    $nombrecliente = $pagos['Cliente']['nombre']." ".$pagos['Cliente']['apellido'];
                    $monto=number_format(floatval($pagos['Pago']['monto']),2,',','.');
                    $totalpagos+=$pagos['Pago']['monto'];
                    $data3[$i]=array($nombrecliente, $monto,$pagos['Cheque']['numerodecheque'],$pagos['Pago']['conceptode'],
                    $pagos['Tipopago']['descripcion'],$pagos['User']['username']);
                    $i++;
		endforeach;	
				
$colWidth = array(50,40,40,40,40,35); 
$fpdf->Tabla($header,$colWidth, $data3); 
$fpdf->Ln(3); 
        $fpdf->SetFont('','B');
        $fpdf->Cell(0,1,'Total de Pagos: '.number_format(floatval($totalpagos),2,',','.')." Bs.",0,1,'R');

     }
         if(!empty($pagoterceros)){  
        
		$fpdf->SetFont('Times','B',10);
		$fpdf->Cell(0,10,'Pagos a Terceros:',0,1,'C');
		$fpdf->SetFont('Times','',8);
                $fpdf->Ln(2);
//***************   Pagos a Terceros*************************************************************

		$header=array('Fecha','Dia','Cheque','Monto','Concepto de','Origen','Destino','Usuario'); 
		$i=0;
                $totalpagos=0;
                
		foreach ($pagoterceros as $pagos):
                    $nombrecliente = $pagos['Cliente']['nombre']." ".$pagos['Cliente']['apellido'];
                    $nombrecliente1 = $pagos['Cliente1']['nombre']." ".$pagos['Cliente1']['apellido'];
                    $fechas=new Datetime($pagos['Pagotercero']['created']);
                    $fechas = $fechas->format('d/m/Y');
                    $monto=number_format(floatval($pagos['Pagotercero']['monto']),2,',','.');
                    $totalpagos+=$pagos['Pagotercero']['monto'];
                    $data3[$i]=array($fechas, $pagos['Pagotercero']['dia'],$pagos['Cheque']['numerodecheque'],$monto,
                    $pagos['Pagotercero']['conceptode'],$nombrecliente,$nombrecliente1,$pagos['User']['username']);
                    $i++;
		endforeach;	
				
$colWidth = array(30,30,30,30,30,30,30,35); 
$fpdf->Tabla($header,$colWidth, $data3); 
$fpdf->Ln(3); 
        $fpdf->SetFont('','B');
        $fpdf->Cell(0,1,'Total de Pagos a Terceros: '.number_format(floatval($totalpagos),2,',','.')." Bs.",0,1,'R');


         }
  

	

}

//*********************************************************************************************************




//*********************************************************************************************************

$fpdf->Output(utf8_decode('General '.date('d/m/Y')),'I'); 

?> 