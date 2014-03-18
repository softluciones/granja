<?php 
echo $this->Form->input('monto',array('id'=>'monto','value'=>$monton,'div'=>null,'label'=>'Monto para Cancelar cheque en totalidad'));
 echo $this->Form->input('montodeuda',array('id'=>'montodeuda','value'=>$monton,'type'=>'hidden'));
?>