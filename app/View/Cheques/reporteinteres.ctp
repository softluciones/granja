<?php
    if($id!=null){ ?>
        <table>
                    
                    <?php for($i=0;$i<$solointeresestotal;$i++){
                        if($dif[$i][0]==0&&$solointereses[$i]['solointereses']['estado']=='R'){ ?>
            <tr style="background: #F39814">
                        <th colspan="6">Cuando el cheque está devuelto y el estado es R</th>
                    </tr>
                    <tr style="background: #C6E746">
                        <th>Fecha</th>
                        <th>Monto intereses</th>
                        <th>Monto fijo Total</th>
                        <th>Interes cobrado</th>
                        <th>Cheque</th>
                        <th>Estado</th>
                    </tr>
                    
                        <?php } else{
                            if($dif[$i][0]==1&&$solointereses[$i]['solointereses']['estado']=='R'){?>
                                <tr style="background: #F39814">
                                    <th colspan="6">Cuando el cheque está por cobrar y el estado es R</th>
                                </tr>
                                <tr style="background: #C6E746">
                                    <th>Fecha</th>
                                    <th>Monto intereses</th>
                                    <th>Monto fijo Total</th>
                                    <th>Interes cobrado</th>
                                    <th>Cheque</th>
                                    <th>Estado</th>
                                </tr>
                      <?php }
                        }
                        $acum[$i]=0;
                        for($j=0;$j<$dif[$i][1];$j++){ ?>
                    <tr>
                        <th><?php   $fecha=  date_create($solointereses[$i]['solointereses']['fecha']); 
                                    date_add($fecha, date_interval_create_from_date_string(($j).' days'));
                                    echo date_format($fecha,'Y-m-d');
                                    #echo $solointereses[$i]['solointereses']['fecha']; ?></th>
                        <th><?php echo $solointereses[$i]['solointereses']['montointereses']; ?></th>
                        <th><?php echo $solointereses[$i]['solointereses']['monto'] ?></th>
                        <th><?php if($idintereses[$i][0]['intereses']['porcentaje']==NULL){ 
                                    echo $idintereses[$i][0]['intereses']['montofijo']." Bs";
                        }else{
                            echo $idintereses[$i][0]['intereses']['porcentaje']."%";
                        }
?></th>
                        <th><?php echo $dif[$i][0]; ?></th>
                        <th><?php echo $solointereses[$i]['solointereses']['estado']; ?></th>
                        <?php 
                              $acum[$i]=$acum[$i]+$solointereses[$i]['solointereses']['montointereses'];
                        ?>
                    </tr>
                    <?php 
                    } ?>
                    <?php if($dif[$i][0]==1&&$solointereses[$i]['solointereses']['estado']=='R'){ 
                        $total=$solointereses[$i]['solointereses']['monto']-$acum[$i];
                        ?>
                    <tr style="background: gold;">
                        <th>Monto - Intereses</th>
                        <th><?php echo $acum[$i]." Bs"; ?></th>
                        <th><?php echo $total." Bs"; ?></th>
                        <th colspan="3"></th>
                    </tr>
                    <?php }else{ 
                        if($dif[$i][0]==0&&$solointereses[$i]['solointereses']['estado']=='R'){?>
                        <?php $total=$solointereses[$i]['solointereses']['monto']+$acum[$i]; ?>
                    <tr style="background: gold;">
                        <th>Monto+intereses</th>
                        <th><?php echo $acum[$i]." Bs"; ?></th>
                        <th><?php echo $total." Bs"; ?></th>
                        <th colspan="3"></th>
                    </tr>
                    <?php }}} ?>
        </table>
   <?php }
?>