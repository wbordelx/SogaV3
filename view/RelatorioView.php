<?php
   
    if(!isset($_SESSION)) { session_start(); } 
    if(!$_SESSION['usuarioID']){
        if(basename($_SERVER["PHP_SELF"])==basename(__FILE__) )
        exit("<script>alert('Nao permitido acesso via URL - Efetue Login Novamente')</script>\n<script>window.location=('../Login.php')</script>");
    }
  
    include("./../controller/RelatorioCT.php"); 
?>
<html lang="pt-br">
	<head>
        <meta charset="utf-8">
        
        <title></title>
        
        <link href='http://fonts.googleapis.com/css?family=OpenSans:300,400,700' rel='stylesheet' type='text/css'>
        <link href="../Flat-UI-master/dist/css/css/style.css" rel="stylesheet" type="text/css"/>
        
        <link href='../Flat-UI-master/dist/js/flat-ui.js' rel='stylesheet' type='text/javascript'>
        <!-- Loading Bootstrap -->
    <link href="../Flat-UI-master/dist/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="../Flat-UI-master/dist/css/flat-ui.css" rel="stylesheet">
    <link rel="shortcut icon" href="../Flat-UI-master/dist/img/favicon.ico">
        
    <script type="text/javascript" src="../Flat-UI-master/dist/js/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../Flat-UI-master/dist/js/js/jquery.maskedinput.min.js"></script>
    <script type="text/javascript" src="../Flat-UI-master/dist/js/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="../Flat-UI-master/dist/js/js/jquery.zebra-datepicker.js"></script>
   </head> 
<body>   
	<section>
        <form action="RelTabGeralView.php" method="POST">
        <div class="container">
            <div class="row">
                <!--<div class="col-md-12">-->
                    <div class="formulario">  
                        <h2>Parametros do Relatório</h2>
                        <label>Sensor</label>                       
                        <select id="identificador" name="identificador" class="p">
                           <?php $sensores=new \controller\CarregarDados();  //Create object of business logic layer 
                                 $objBALDados= $sensores->getBuscarSensoresUnic();?>                         
                                <option>Selecione...</option>
                                <?php foreach ($objBALDados as $row) { ?>
                                <option value="<?php echo $row['identificador'] ?>"><?php echo $row['identificador'] ?></option>
                                <?php } ?>
                            </select>
                        
                        <label>Data de Inicial</label>
                           <input name="datepicker1" type="text" id="datepicker1">                           
                          
                        <label>Data de Final</label>
                           <input name="datepicker4" type="text"  id="datepicker4">   
                     
                    </div>
                </div>  
            </div>       
        </form>
    </section>
 </BODY> 
</HTML>                    