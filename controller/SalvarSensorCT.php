<?php

include ("./../controller/SensorCT.php");
include ("./../model/SensorMD.php");
use modelsensor\SensorProperty;
$sensor= new modelsensor\SensorProperty();

use sensor\CarregarSensor;
$salvar= new \sensor\CarregarSensor();

    if (isset($_POST["excluir"])){ 
       $sensor->setId($_POST['excluir']);
       $salvar->ExcluirSensor($sensor);
   }
   if (isset($_POST["salvar"])){
       if($_POST['codigo_unico']){
            $sensor->setCodigo_unico($_POST['codigo_unico']);
            $salvar->SalvarSensor($sensor);
       }
       else{
           exit("<script>alert('Preencha o Código Unico')</script>\n<script>window.location=('../view/SensorView.php')</script>");
       }
   }


header("Location: ../view/SensorView.php"); 
?>
