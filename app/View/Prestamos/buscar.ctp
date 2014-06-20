<?php echo $this->Form->input('Prestamo.interesprestamo_id',array('label'=>'Interes','div'=>null)); 
    echo " ";
    echo $this->Html->image("anade.fw.png", array("id"=>"binteres","alt" => "Agregar Interes",'width' => '20', 'heigth' => '20','title'=>'Agregar Interes','onClick' => "interes();"));
?>