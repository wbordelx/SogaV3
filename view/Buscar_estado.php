<?php
include('../controller/ProdutorCT.php');

$pais = $_GET['pais'];  //codigo do estado passado por parametro

 $estado=new \produtor\CarregarProdutor(); 
 $objBALPais= $estado->getEstado($pais);

//monto um array de cidades
foreach ($objBALPais as $row)  {
  $arrEstados[$row['id']] = $row['nome'];
}
?>
<label>Estados:</label>
    <select name="estado" id="estado" class="p">
      <?php foreach($arrEstados as $value => $nome){
        echo "<option value='{$value}'>{$nome}</option>";
      }
    ?>
</select>