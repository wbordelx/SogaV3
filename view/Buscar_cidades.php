<?php
include('../controller/ProdutorCT.php');

$estado = $_GET['estado'];  //codigo do estado passado por parametro

 $cidade=new \produtor\CarregarProdutor(); 
 $objBALCidade= $cidade->getCidade($estado);

//monto um array de cidades
foreach ($objBALCidade as $row)  {
  $arrCidades[$row['id']] = $row['nome'];
}
?>
<label>Cidades:</label>
    <select name="cidade" id="cidade" class="p">
      <?php foreach($arrCidades as $value => $nome){
        echo "<option value='{$value}'>{$nome}</option>";
      }
    ?>
</select>
