<?php
namespace controller;

include("./../conexao/dbconnect.php");
include("./../model/DadosMD.php"); 

//class DALDados implements \model\iDados 
//{ 
//public function getDadosName(\model\DadosProperty $objDadosProperty) 
//    { 
//                $result= pg_query("SELECT m.identificador, 
//                                       m.ph,
//                                       m.temperatura_sup, 
//                                       m.temperatura_inf,
//                                       m.ph,
//                                       m.oxigenio,
//                                       mx_data_dado 
//                                 FROM ( SELECT identificador, MAX(data_dado) AS mx_data_dado  FROM dados GROUP BY identificador ) t 
//                                 JOIN dados m ON m.identificador = t.identificador AND t.mx_data_dado = m.data_dado 
//                                 ORDER BY m.identificador;"); // fire query  
//           return $result; 
//               } 
//}


class CarregarDados extends \model\DadosProperty 
{ 
    public $conn;
    
    function __construct() {
        $this->conn = \database\DatabaseConnection::getDatabase();
    }
    
    function getDados() {
    $sql = 'SELECT m.identificador, 
                    m.ph,
                    m.temperatura_sup, 
                    m.temperatura_inf,
                    m.ph,
                    m.oxigenio,
                    m.codigo_unico,
                    mx_data_dado 
              FROM ( SELECT identificador, MAX(data_dado) AS mx_data_dado  FROM dados GROUP BY identificador ) t 
              JOIN dados m ON m.identificador = t.identificador AND t.mx_data_dado = m.data_dado 
              where m.codigo_unico in (select codigo_unico from sensor_produtor where id_produtor='.$_SESSION['usuarioID'].')
              ORDER BY m.identificador;';
    
    $statement = $this->conn->prepare($sql);
    $statement->execute();
    
    return $statement->fetchAll();
    }
    
   
    
}