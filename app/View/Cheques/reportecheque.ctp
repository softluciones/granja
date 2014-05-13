<?php

$fpdf->AliasNbPages();
$fpdf->AddPage();

$fpdf->SetAutoPageBreak(true,30); 

$fpdf->SetFont('Times','B',12);
 $fpdf->Cell(0,0,utf8_decode('Reporte de Cheque '.$cheques['Cheque']['numerodecheque']),0,0,'C');


$fpdf->Ln(4); 
 

 $totaldeuda=0;
                $debo=0;
                $medeben=0;
                $totalentregado=0;
                $totalmontocheques=0;
                $devueltos =0;
                $cobrados=0;
                $porcobrar=0;

if (!empty($cheques)){
	
		$fpdf->SetFont('Times','',10);
                $fpdf->Cell(0,4,'Banco: '.$cheques['Banco']['codigo'].' '.$cheques['Banco']['nombre'],0,2,'L');
                $fpdf->Cell(0,4,'Cliente: '.$cheques['Cliente']['nombre'].' '.$cheques['Cliente']['apellido'],0,2,'L');
                $fpdf->Cell(0,4,'Nro. de Cuenta: '.$cheques['Cheque']['numerodecuenta'],0,2,'L');
                $fpdf->Cell(0,4,'Nro. de Cheque: '.$cheques['Cheque']['numerodecheque'],0,2,'L');
                $fpdf->Cell(0,4,'Monto Original: '.$cheques['Cheque']['monto'],0,2,'L');
                $fpdf->Cell(0,4,'Interes: '.$cheques['Interese']['rango'],0,2,'L');
                $recibidos=new Datetime($cheques['Cheque']['fecharecibido']);
                $recibidos=$recibidos->format('d/m/Y');
                $fpdf->Cell(0,4,'Fecha Recibido: '.$recibidos,0,2,'L');
                $recibidos=new Datetime($cheques['Cheque']['fechacobro']);
                $recibidos=$recibidos->format('d/m/Y');
                $fpdf->Cell(0,4,'Fecha de Cobro: '.$recibidos,0,2,'L');
             #   $fpdf->Image('uploads/cheque/filename/'.$cheques['Cheque']['filename'] , 80 ,22, 35 , 38,'JPG');
                $fpdf->Cell(0,4,'Dias: '.$cheques['Cheque']['dias'],0,2,'L');
                if($cheques['Cheque']['cobrado']==0){
                    $cobrado="Devuelto";
                }
                 if($cheques['Cheque']['cobrado']==1){
                    $cobrado="Por Cobrar";
                }
                 if($cheques['Cheque']['cobrado']==2){
                    $cobrado="Cobrado";
                }
                $fpdf->Cell(0,4,'Edo. Cobrado: '.$cobrado,0,2,'L');
                if(!$cheques['Cheque']['cheque_id']){
                    $fpdf->Cell(0,3.5,'Cheque a Pagar: '.$cheques['Cheque1']['numerodecheque'],0,2,'L');
                }
                $fpdf->Cell(0,4,'Usuario de Registro: '.$cheques['User']['username'],0,2,'L');
		$fpdf->SetFont('Times','',8);
                $fpdf->Ln(5);

//***************   Pagos con Cheque*************************************************************
                if(!empty($relacionados)){
                $fpdf->SetFont('Times','B',10);
		$fpdf->Cell(0,10,'Pagos con cheque:',0,1,'C');
		$fpdf->SetFont('Times','',8);
                $fpdf->Ln(2);


  
		$header=array('Banco','Nro. de Cheque','Monto','Días','Interes','Monto Interes','Monto Pagado','Cobrado','Edo','Fecha Recibido','Fecha Cobro','Usuario'); 
		$i=0;
                $totalpagos=0;
		foreach ($relacionados as $cheques1):
                   
                    $monto=number_format(floatval($cheques1['Cheque']['monto']),2,',','.');
                    $totalpagos+=$cheques1['Cheque']['monto'];
                    $pos = count($cheques1['Chequeinterese']);
                    $montodeuda= number_format(floatval($cheques1['Chequeinterese'][$pos-1]['montocheque']),2,',','.');
                     $montointeres= number_format(floatval($cheques1['Chequeinterese'][$pos-1]['montodescuentointeres']),2,',','.');
                      $entregado= number_format(floatval($cheques1['Chequeinterese'][$pos-1]['montoentregado']),2,',','.');
                      if($cheques1['Cheque']['cobrado']==0){
                          $cobrado="Devuelto";
                      }
                      if($cheques1['Cheque']['cobrado']==1){
                          $cobrado="Por Cobrar";
                      }
                       if($cheques1['Cheque']['cobrado']==2){
                          $cobrado="Cobrado";
                      }
                      $pose = count($cheques1['ChequeEstadocheque']);
                      $edo = $cheques1['ChequeEstadocheque'][$pose-1]['Estadocheque']['nomenclatura'];
                      $recibido = new Datetime($cheques1['Cheque']['fecharecibido']);
                      $recibido = $recibido->format('d-m-Y');
                      $cobro = new Datetime($cheques1['Cheque']['fechacobro']);
                      $cobro = $cobro->format('d-m-Y');
                    $data3[$i]=array($cheques1['Banco']['nombre'], $cheques1['Cheque']['numerodecheque'], $monto,$cheques1['Cheque']['dias'], $cheques1['Interese']['rango'],$montointeres,
                    $entregado,$cobrado,$edo, $recibido, $cobro,$cheques1['User']['username']);
                    $i++;
		endforeach;	
				
$colWidth = array(20,20,20,20,20,20,20,20,20,20,20,20); 
$fpdf->Tabla($header,$colWidth, $data3); 
$fpdf->Ln(3); 
        $fpdf->SetFont('','B');
        $fpdf->Cell(0,1,'Total de Pagos con cheque: '.number_format(floatval($totalpagos),2,',','.')." Bs.",0,1,'R');
                }
                
 //******************************************Cheque interese*********************************
                if(!empty($cheques['Chequeinterese'])){
                    $fpdf->SetFont('Times','B',10);
		$fpdf->Cell(0,10,'Historicos de Cheque:',0,1,'C');
		$fpdf->SetFont('Times','',8);
                $fpdf->Ln(2);


  
		$header2=array('Fecha','Monto Deuda','Monto Interes', 'Monto Entregado', 'Cobrado'); 
		$i=0;
                $totalpagos=0;
		foreach ($cheques['Chequeinterese'] as $interes):
                   $fecha = new Datetime($interes['created']);
                    $fecha = $fecha->format('d/m/Y');
                    $montodeuda= number_format(floatval($interes['montocheque']),2,',','.');
                     $montointeres= number_format(floatval($interes['montodescuentointeres']),2,',','.');
                      $montoentregado= number_format(floatval($interes['montoentregado']),2,',','.');
                      if($interes['estadocheque']==0){
                          $estadocheque="Devuelto";
                      }
                      if($interes['estadocheque']==1){
                          $estadocheque="Por Cobrar";
                      }
                      if($interes['estadocheque']==2){
                          $estadocheque="Cobrado";
                      }
                    $data1[$i]=array($fecha,$montodeuda, $montointeres, $montoentregado,$estadocheque);
                    $i++;
		endforeach;	
				
$colWidth1 = array(40,50,50,50,50); 
$fpdf->Tabla($header2,$colWidth1, $data1); 
$fpdf->Ln(3); 
        $fpdf->SetFont('','B');
       
                }
                
                 if(!empty($cheques['ChequeEstadocheque'])){
                    $fpdf->SetFont('Times','B',10);
		$fpdf->Cell(0,10,'Estados:',0,1,'C');
		$fpdf->SetFont('Times','',8);
                $fpdf->Ln(2);


  
		$header1=array('Edo.','Nomenclatura','Fecha','Usuario'); 
		$i=0;
                $totalpagos=0;
		foreach ($cheques['ChequeEstadocheque'] as $estado):
                   $fecha = new Datetime($estado['created']);
                    $fecha = $fecha->format('d/m/Y');
                    $data2[$i]=array($estado['Estadocheque']['nombre'],$estado['Estadocheque']['nomenclatura'],$fecha,$estado['User']['username']);
                    $i++;
		endforeach;	
				
$colWidth1 = array(50,50,70,70); 
$fpdf->Tabla($header1,$colWidth1, $data2); 
$fpdf->Ln(3); 
        $fpdf->SetFont('','B');
       
                }
                
}



//*********************************************************************************************************


$fpdf->Output(utf8_decode('Relacion dia '.date('d/m/Y')),'I'); 
?> 