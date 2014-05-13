<?php

$fpdf->AliasNbPages();
$fpdf->AddPage();

$fpdf->SetAutoPageBreak(false,15); 
$fpdf->SetFont('Times','B',12);


 $fpdf->Cell(0,0,utf8_decode('Reporte total de bancos que tienen cheques por Cobrar'),10,0,'C');

 

$fpdf->Ln(10); 

if(!empty($bancos)){
    $fpdf->SetFont('Times','B',10);
                $header=array('Banco','Monto','Estado cheques');
                    $j=0;
                    $i=0;
                    $acum=0;
                    foreach ($bancos as $banco):
                        $monto=$banco[$j]['monto'];
                        $nombre=$banco['banco']['nombre'];
                        $data2[$i]=array($nombre,$monto,'Por Cobrar');
                        $acum+=$monto;
                        $i++;
                    endforeach;
                    //debug($data2);
                    //exit(0);

                    $colWidth = array(60,60,60); 
                    $fpdf->Tabla($header,$colWidth, $data2);
                    $fpdf->Ln(3);
        $fpdf->SetFont('Times','',9);
        $fpdf->Cell(0,0,utf8_decode('Total en cheques por cobrar: '.$acum),0,0,'R');

        $acum=0;
    
    if(!empty($bancos2)){
        $fpdf->Ln(5);
        $fpdf->SetFont('Times','B',12);

        $fpdf->Cell(0,0,utf8_decode('Reporte total de bancos que tienen cheques Cobrados'),0,0,'C');

       
        $fpdf->Ln(10); 
        $fpdf->SetFont('Times','B',10);
                    $header=array('Banco','Monto','Estado cheques');
                        $j=0;
                        $i=0;
                        $acum=0;
                        foreach ($bancos2 as $banco):
                            $monto=$banco[$j]['monto'];
                            $nombre=$banco['banco']['nombre'];
                            $data3[$i]=array($nombre,$monto,'Cobrado');
                            $acum+=$monto;
                            $i++;
                        endforeach;
                        //debug($data2);
                        //exit(0);

                        $colWidth = array(60,60,60); 
                        $fpdf->Tabla($header,$colWidth, $data3);
        $fpdf->Ln(3);
        $fpdf->SetFont('Times','',9);
        $fpdf->Cell(0,0,utf8_decode('Total en cheques por cobrados: '.$acum),0,0,'R');

        $acum=0;
    }
    if(!empty($bancos3)){
        $fpdf->Ln(5);
        $fpdf->SetFont('Times','B',12);

        $fpdf->Cell(0,0,utf8_decode('Reporte total de bancos que tienen cheques Devueltos'),0,0,'C');

       
        $fpdf->Ln(10); 
        $fpdf->SetFont('Times','B',10);
                    $header=array('Banco','Monto','Estado cheques');
                        $j=0;
                        $i=0;
                        $acum=0;
                        foreach ($bancos3 as $banco):
                            $monto=$banco[$j]['monto'];
                            $nombre=$banco['banco']['nombre'];
                            $data4[$i]=array($nombre,$monto,'Devuelto');
                            $acum+=$monto;
                            $i++;
                        endforeach;
                        //debug($data2);
                        //exit(0);

                        $colWidth = array(60,60,60); 
                        $fpdf->Tabla($header,$colWidth, $data4);
                        $fpdf->Ln(3);
        $fpdf->SetFont('Times','',9);
        $fpdf->Cell(0,0,utf8_decode('Total en cheques por devueltos: '.$acum),0,0,'R');

        $acum=0;
    }
                    
}






//*********************************************************************************************************

$fpdf->Output(utf8_decode('General '.date('d/m/Y')),'I'); 
?> 