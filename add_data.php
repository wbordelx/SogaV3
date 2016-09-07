<?php
    include("conexao/dbconnect.php");
    include("./model/DadosMD.php");
    include("controller/SalvarCT.php"); 
    
    $entrada=$_GET['serial'];
    $array=explode(",",$entrada);
    
    $dados= new model\DadosProperty();
    
    $dados->setIdentificador($array[0]);//$identificador=$array[0];
    $dados->setTemperatura_sup($array[1]/100);//$temperatura_sup=$array[1]/100;
    $dados->setTemperatura_inf($array[2]/100);//$temperatura_inf=$array[2]/100;
    $dados->setPh($array[3]/100);//$ph=$array[3]/100;
    $dados->setOxigenio($array[4]/100);//$oxigenio=$array[4]/100;
    $dados->setCodigo_unico($array[5]);
  
    
    
    ///////////////My View Part////////////////// 
    $salvard=new \salvar\SalvarDados;
    $resp=$salvard->Salvar($dados);
//    
    // Go to the review_data.php (optional)
    header("Location: view/DadosView.php");
?>