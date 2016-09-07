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
        
        <link href="../Flat-UI-master/dist/css/css/style.css" rel="stylesheet" type="text/css"/>
        
        <link href='../Flat-UI-master/dist/js/flat-ui.js' rel='stylesheet' type='text/javascript'>
        
        <link href="../Flat-UI-master/dist/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../Flat-UI-master/dist/css/flat-ui.css" rel="stylesheet">
        <link rel="shortcut icon" href="../Flat-UI-master/dist/img/favicon.ico">
    
        <script type="text/javascript" src="../Flat-UI-master/dist/js/js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="../Flat-UI-master/dist/js/js/jquery.maskedinput.min.js"></script>
        <script type="text/javascript" src="../Flat-UI-master/dist/js/js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="../Flat-UI-master/dist/js/js/jquery.zebra-datepicker.js"></script>
        <!-- Loading Flat UI -->
        
        <TITLE>SOGÁ - Sistema Orientado a Gestão da Água</TITLE>
    
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
        table td{
            border: 1px solid black; 
            background-color: #269abc;
        }
        table th {
            border: 1px solid black;      
        }
        body { font-family: "Trebuchet MS", Arial; }
    </style>   
 <BODY>
      <a onclick="window.print();return false" href="javascript:;">
          <img src="./../img/impressora.jpg"/></a>
     <label>Data de Inicial</label>
     <input name="datepicker1" type="text" id="datepicker1">                           

     <label>Data de Final</label>    
     <input name="datepicker5" type="text"  id="datepicker5" onselect="atualizaTela()"> 
     
     
            <?php 
             include("./../controller/RelatorioCT.php");
             use model\DadosProperty;
             
             $dados= new \model\DadosProperty();
             //$dados->setIdentificador($_GET["identificador"]);
             $dados->setIdentificador(filter_var($_GET["identificador"],FILTER_SANITIZE_SPECIAL_CHARS));
           
             
///////////////My View Part////////////////// 
            $teste=new \reports\CarregarDados();  //Create object of business logic layer 

            if($dados->getIdentificador()==null || $dados->getIdentificador()==""){
                echo '<H1>Relatório da ultima semana de todos os sensores</H1>';
                $objBALDados= $teste->getDados();
            }  else {
                echo '<input style="display:none;" id="identificador" value='.$dados->getIdentificador().'></input>';
                echo '<H1>Relatório da ultima semana do sensor '.$dados->getIdentificador().'</H1>';           
                $objBALDados= $teste->getDadosIdentificador($dados); 
            } 
            ?>
      
            <TABLE cellspacing="0" cellpadding="4">
                <tr>            
                   <td class="table_titles">Identificador</td>
                   <td class="table_titles">Temperatura Água Superior</td>
                   <td class="table_titles">Temperatura Água Submerso</td>
                   <td class="table_titles">PH</td>
                   <td class="table_titles">Oxigênio</td>
                   <td class="table_titles">Data da Coléta</td>           
               </tr>
               
          <?php 
          
          echo '<tbody id="atualizar_tela">';
          foreach ($objBALDados as $row)
                    {               
                        if($row["temperatura_sup"]==0 || $row["temperatura_inf"]==0 || $row["ph"]==0 || $row["oxigenio"]==0){            
                            $css_class=' class="table_cells_odd"';         
                        }
                        else
                        {
                            $css_class=' class="table_cells_even"';
                        }  
                        echo '<tr>';
                        echo '   <td'.$css_class.'>'.$row["identificador"].'</td>';
                        echo '   <td'.$css_class.'>'.$row["temperatura_sup"].'</td>';
                        echo '   <td'.$css_class.'>'.$row["temperatura_inf"].'</td>';
                        echo '   <td'.$css_class.'>'.$row["ph"].'</td>';
                        echo '   <td'.$css_class.'>'.$row["oxigenio"].'</td>';
                        echo '   <td'.$css_class.'>'.$row["data_dado"].'</td>';
                        echo '</tr>';
                    } 
          echo '</tbody>';
          ?> 
  
  </TABLE>  
     
 
<SCRIPT type="text/javascript">
        function atualizaTela(){
            var data_inicial= $('#datepicker1').val();
            var data_final= $('#datepicker5').val();
            var identificador =$('#identificador').val();
            if(data_inicial>data_final){
                alert("Data INICIAL maior que data FINAL");
                exit();
            }
            var url="Atualizar_tabela_tela.php?data_inicial="+data_inicial+
                                              "&data_final="+data_final+
                                              "&identificador="+identificador;  
            $.get(url,function(dataReturn){
                $('#atualizar_tela').html(dataReturn);
            });
        }      

</SCRIPT> </BODY> 

</HTML> 
