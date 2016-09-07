<?php
namespace reports;

include './../conexao/dbconnect.php';
include './../model/DadosMD.php';
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


class CarregarDados 
{ 
    public $conn;
    
    function __construct() {
        $this->conn = \database\DatabaseConnection::getDatabase();
    }
//    public function getDadosName(DadosProperty $objDadosProperty) 
//    {
//       
//        $objiDados=new DALDados(); 
//        return $objiDados->getDadosName($objDadosProperty); 
//    }
    
    function getDadosData($data_inicial,$data_final,$identificador) {
        
        if($identificador=="" || $identificador==NULL || $identificador== 'undefined'){
            $parametrobusca="";
        }  else {
           $parametrobusca="identificador = '".$identificador."' and";
        }
        
    $sql = "SELECT d.identificador, 
                                       d.ph,
                                       d.temperatura_sup, 
                                       d.temperatura_inf,
                                       d.ph,
                                       d.oxigenio,
                                       data_dado 
                                 FROM  dados d    
                                       where ".$parametrobusca."
                                       d.data_dado BETWEEN '".$data_inicial."' AND '".$data_final."'
                                 ORDER BY d.identificador"
            ;
           
    $statement = $this->conn->prepare($sql);
    $statement->execute();
    
    return $statement->fetchAll();
    }
    
    function getDados() {
    $sql = "SELECT d.identificador, 
                                       d.ph,
                                       d.temperatura_sup, 
                                       d.temperatura_inf,
                                       d.ph,
                                       d.oxigenio,
                                       data_dado 
                                 FROM  dados d    
                                 where d.data_dado BETWEEN CURRENT_DATE -7 AND CURRENT_DATE
                                 ORDER BY d.identificador;";
    $statement = $this->conn->prepare($sql);
    $statement->execute();
    
    return $statement->fetchAll();
    }
    
    function getDadosIdentificador(\model\DadosProperty $dados) {
    $sql = "SELECT d.identificador, 
                                       d.ph,
                                       d.temperatura_sup, 
                                       d.temperatura_inf,
                                       d.ph,
                                       d.oxigenio,
                                       data_dado 
                                 FROM  dados d 
                                 where identificador='".$dados->getIdentificador()."'
                                 and d.data_dado BETWEEN CURRENT_DATE -7 AND CURRENT_DATE
                                 ORDER BY d.identificador;";
    $statement = $this->conn->prepare($sql);
    $statement->execute();
    
    return $statement->fetchAll();
    }
    
    function getBuscarSensoresUnic(){
        $sql = "SELECT identificador 
                FROM dados GROUP BY identificador;";
        
    $statement = $this->conn->prepare($sql);
    $statement->execute();
    
    return $statement->fetchAll();           
    }
}