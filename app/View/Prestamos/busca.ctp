<?php echo $this->Form->input('Cheque.cliente_id',array('label'=>'Cliente','div'=>null)); 
    echo " ";
  echo $this->Html->image("anade.fw.png", array("id"=>"cliente","alt" => "Agregar Cliente",'width' => '20', 'heigth' => '20','title'=>'Agregar Cheque','onClick' => "client();"));
?>