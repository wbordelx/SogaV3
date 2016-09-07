<?php
$data_inicial=$_GET['data_inicial'];
$data_final=$_GET['data_final'];
$identificador = $_GET['identificador'];

require_once '../controller/RelatorioCT.php';

$teste = new \reports\CarregarDados();

$objBALDados= $teste->getDadosData($data_inicial,$data_final,$identificador);
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

