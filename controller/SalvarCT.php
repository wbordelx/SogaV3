<?php
namespace salvar;
include './../model/DadosMD.php';
include './../model/ProdutorMD.php';
//include("./../conexao/dbconnect.php");
class SalvarDados //extends \model\DadosProperty 
{ 
    public $conn;
    
    function __construct() {
        $this->conn = \database\DatabaseConnection::getDatabase();
    }
 function Salvar(\model\DadosProperty $dados) {
    $sql = "INSERT INTO dados (identificador,
                               temperatura_sup,
                               temperatura_inf,
                               ph,
                               oxigenio,
                               codigo_unico,
                               data_dado) 
                               VALUES ('".$dados->getIdentificador()."',"
                                        .$dados->getTemperatura_sup().","
                                        .$dados->getTemperatura_inf().","
                                        .$dados->getPh().","
                                        .$dados->getOxigenio().",'"
                                        .$dados->getCodigo_unico()."',"
                                        ."now())"; 
    
            $statement = $this->conn->prepare($sql);
            $statement->execute();
    
            return $statement->fetchAll();
    
    }  
}