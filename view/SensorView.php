<?php
  include("./../controller/SensorCT.php"); 
    if(!isset($_SESSION)) { session_start(); } 
    if(!$_SESSION['usuarioID']){
        if(basename($_SERVER["PHP_SELF"])==basename(__FILE__) )
        exit("<script>alert('Nao permitido acesso via URL - Efetue Login Novamente')</script>\n<script>window.location=('../Login.php')</script>");
    }
  
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        
        <title></title>
        <link href="../Flat-UI-master/dist/css/css/style.css" rel="stylesheet" type="text/css"/>
        
        <link href='../Flat-UI-master/dist/js/flat-ui.js' rel='stylesheet' type='text/javascript'>
        <!-- Loading Bootstrap -->
        <link href="../Flat-UI-master/dist/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Loading Flat UI -->
        <link href="../Flat-UI-master/dist/css/flat-ui.css" rel="stylesheet">
        <link rel="shortcut icon" href="../../Flat-UI-master/dist/img/favicon.ico">
        <style type="text/css">
            .table_titles, .table_cells_odd, .table_cells_even {
                    padding-right: 20px;
                    padding-left: 20px;
                    color: #000;
            }
            .table_cells_even {
                background-color: #FAFAFA;
            }
            table {
                border: 2px solid #333;
            }
            table td{
                border: 1px solid black; 
                background-color: #269abc;
            }
            table th {
                border: 1px solid black;      
            }
            body { font-family: "Trebuchet MS", Arial; }
            #excluir{ background-color: red}
        </style>
   </head>
   
<body>   
	<section>
            <form action="..\controller\SalvarSensorCT.php" method="POST">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                     
                        <h2>Cadastro de Sensor</h2>
                       <form role="form" action="" method="post" id="validate">  
                           
                           <label>* Código Unico</label>
                           <input id="codigo_unico" name="codigo_unico" type="text" class="g">
                           
                           <button class="button" name="salvar" id="salvar"> Salvar </button>
                       </form>
                     
                        <TABLE cellspacing="0" cellpadding="4">
                        <tr>            
                           <td class="table_titles">Codigo Unico</td>
                           <td class="table_titles">Identificador do Sensor</td>
                           <td class="table_titles">Data Do Cadastro</td>  
                           <td class="table_titles">Excluir</td> 
                       </tr> 
                       
                       <?php
                        $sensor=new \sensor\CarregarSensor();  //Create object of business logic layer 

                        $objBALSensor= $sensor->getSensor();
                        
                        foreach ($objBALSensor as $row)
                            {                                                    
                                $css_class=' class="table_cells_even"';         
                                      
                                //echo '<a href="RelTabGeralView.php?identificador='.$row["identificador"].'">';
                                echo '<tr>';
                                echo '   <td'.$css_class.'>'.$row["codigo_unico"].'</td>';
                                echo '   <td'.$css_class.'>'.$row["identificador"].'</td>';
                                echo '   <td'.$css_class.'>'.$row["dt_cadastro"].'</td>';
                                echo "   <td".$css_class."><button class='button' value=".$row["id"]." name='excluir' id='excluir'>X</button></td>";
                                echo '</tr>';
                            } 
                        ?>                      
                     
                </div>
            </div>
        </div>
        </form>
        </section> 
</body>
</html>