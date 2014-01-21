
<h2>Lista diaria de intereses del cheque # <?php echo $num[0]['cheques']['numerodecheque']; ?></h2>
            <table>
                    <tr>
                        <th>Fecha</th>
                        <th>Monto intereses</th>
                        <th>Monto fijo Total</th>
                    </tr>
            <?php    
            for($i=0;$i<$dif;$i++){?>
                <tr>
                        <th><?php echo $fecha; ?></th>
                        <th><?php echo $consulta[0]['solointereses']['montointereses']; ?> Bs</th>
                        <th><?php echo $consulta[0]['solointereses']['monto']; ?> Bs</th>
                    </tr>
              <?php  $acum=$acum+$consulta[0]['solointereses']['montointereses'];
                $fecha++;
            } 
            $montointerestoo=  intval($acum)+intval($consulta[0]['solointereses']['monto']);
            ?>
                    <tr>
                        <th>Total en el monto de intereses y monto base: </th>
                        <th><?php echo $acum; ?> Bs</th>
                        <th><?php echo $montointerestoo; ?> Bs</th>
                    </tr>
            </table>
            

