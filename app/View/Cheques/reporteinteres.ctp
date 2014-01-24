
<?php if($id!=NULL){ ?>
<h2>Lista diaria de intereses del cheque # <?php echo $num[0]['cheques']['numerodecheque']; ?></h2>
            <table>
                    <tr>
                        <th>Fecha</th>
                        <th>Monto intereses</th>
                        <th>Monto fijo Total</th>
                        <th>Interes cobrado</th>
                        <th>Cheque</th>
                        <th>Estado</th>
                    </tr>
            <?php    
            for($i=0;$i<$dif;$i++){?>
                <tr>
                        <th><?php echo $fecha; ?></th>
                        <th><?php echo $consulta[0]['solointereses']['montointereses']; ?> Bs</th>
                        <th><?php echo $consulta[0]['solointereses']['monto']; ?> Bs</th>
                        <th><?php echo $consulta[0]['solointereses']['interese_id']; ?> </th>
                        <th><?php echo $consulta[0]['solointereses']['cobrado']; ?> </th>
                        <th><?php echo $consulta[0]['solointereses']['estado']; ?> </th>
                    </tr>
              <?php  $acum=$acum+$consulta[0]['solointereses']['montointereses'];
                $fecha++;
            }
            
                if($consulta[0]['solointereses']['cobrado']==1)
                    if($consulta[0]['solointereses']['estado']=='R')
                        $montointerestoo=  intval($consulta[0]['solointereses']['monto'])-intval($acum);
                else
                    if($consulta[0]['solointereses']['cobrado']==0)
                        if($consulta[0]['solointereses']['estado']=='R')
                            $montointerestoo=  intval($consulta[0]['solointereses']['monto'])+intval($acum);
            ?>
                    <tr>
                        <th>Total en el monto de intereses y monto base: </th>
                        <th><?php echo $acum; ?> Bs</th>
                        <th><?php echo $montointerestoo; ?> Bs</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
            </table>
<?php }else{
    
    echo "Aun no han creado cheques o estas accediendo ilegalmente";
}?>

