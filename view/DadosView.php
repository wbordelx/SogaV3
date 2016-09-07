<!--////////////////////My View Part///////////////////////////////////////--> 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"> 
<HTML> 
 <HEAD> 
    <?php
        if(!isset($_SESSION)) { session_start(); } 
        if(!$_SESSION['usuarioID']){
            if(basename($_SERVER["PHP_SELF"])==basename(__FILE__) )
            exit("<script>alert('Nao permitido acesso via URL - Efetue Login Novamente')</script>\n<script>window.location=('../Login.php')</script>");
        }
    ?>
    <link href="../Flat-UI-master/dist/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../Flat-UI-master/dist/css/vendor/bootstrap/css/estilo.css" rel="stylesheet">
        <!-- Loading Flat UI -->
        

        <TITLE>Ultima Leitura de Cada Sensor da Propriedade </TITLE>
    
    <style type="text/css">
        .table_titles, .table_cells_odd, .table_cells_even {
                padding-right: 20px;
                padding-left: 20px;
                color: #000;
        }
        .table_cells_odd {
            background-color: #ff0033;
        }
        .table_cells_even {
            background-color: #FAFAFA;
        }
        table {
            border: 2px solid #333;
        }
        body { font-family: "Trebuchet MS", Arial; }
    </style>   
    
    <?php echo "Olá, " . $_SESSION['usuarioNome']?>
    <a href="../Login.php" class="btn">Sair</a>
    <div class="btn-group btn-group-justified">
        <a class="btn btn-default" href="RelTabGeralView.php?identificador=">Relatório Geral</a>
        <a class="btn btn-default" href="ProdutorView.php?edit=">Novo Cadastro de Produtor</a>
        <a class="btn btn-default" href="SensorView.php">Sensores</a>   
        <a class="btn btn-default" href="ProdutorView.php?edit=true">Editar Perfil</a>
    </div>  
  <?php 
  include("./../controller/DadosCT.php"); 
  
  ///////////////My View Part////////////////// 
  $teste=new \controller\CarregarDados();  //Create object of business logic layer 
  
  $objBALDados= $teste->getDados();
  
  //$objBALDados->setIdentificador(1);      // Set Property 
  //$result= $objBALDados->getDadosName($objBALDados); // excess bll function 
  foreach ($objBALDados as $row)
            {               
                if($row["temperatura_sup"]==0 || $row["temperatura_inf"]==0 || $row["ph"]==0 || $row["oxigenio"]==0){            
                    $css_class=' class="table_cells_odd"';         
                }
                else
                {
                    $css_class=' class="table_cells_even"';
                }       
                echo '<a href="RelTabGeralView.php?identificador='.$row["identificador"].'">';
                echo '<div class="col-sm-6 col-md-4">';
                echo '<div class="thumbnail">';
                echo    '<div class="captionBlue">';
                echo        '<h3>'.$row["identificador"].'</h3>';
                      echo '   <p'.$css_class.'>Temperatura Superficie :<br>'.$row["temperatura_sup"].'°C</p>';
                      echo '   <p'.$css_class.'>Temperatura Submersso :<br>'.$row["temperatura_inf"].'°C</p>';
                      echo '   <p'.$css_class.'>Ph :<br>'.$row["ph"].'</p>';
                      echo '   <p'.$css_class.'>Oxigenio :<br>'.$row["oxigenio"].' mg/L</p>';
                      echo '   <p'.$css_class.'>Última Coleta :<br>'.$row["mx_data_dado"].'</p>';
                echo    '</div>';
                echo  '</div>';
                echo '</div>';
                echo '</a>';
            } 
  ?> 
 </BODY> 
</HTML> 