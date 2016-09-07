<?php
namespace produtor;
include("./../conexao/dbconnect.php");
include("./../model/ProdutorMD.php"); 
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CarregarProdutor extends \modelprodutor\ProdutorProperty
{ 
    public $conn;
    
    function __construct() {
        $this->conn = \database\DatabaseConnection::getDatabase();
    }
    
    function getProdutor() {
        $sql = 'SELECT  id,
                nome,
                telefone,
                email,
                data_cadastro,
                celular,
                dtnasc,
                cep,
                pais,
                estado,
                cidade,
                endereco,
                numero,
                temp_sup,
                temp_sub,
                ph,
                oxigenio,
                login,
                senha
                FROM produtor where id='.$_SESSION['usuarioID'];
    $statement = $this->conn->prepare($sql);
    $statement->execute();
    
    return $statement->fetchAll();
    }    
    
    function getPais() {
        $sql = 'SELECT id,nome FROM pais';
        
    $statement = $this->conn->prepare($sql);
    $statement->execute();
    
    return $statement->fetchAll();
    }  
    
    function getEstado($pais) {
    $sql = 'SELECT * FROM estado WHERE pais ='.$pais.' ORDER BY id';
    $statement = $this->conn->prepare($sql);
    $statement->execute();
    
    return $statement->fetchAll();
    } 
    
    function getCidade($estado) {
        $sql = 'SELECT * FROM cidade WHERE estado ='.$estado.' ORDER BY id';
        
    $statement = $this->conn->prepare($sql);
    $statement->execute();
    
    return $statement->fetchAll();
    } 
    
    function login($nusuario,$nsenha,$cS) {
    $sql = "SELECT login, senha, id, nome FROM produtor WHERE ".$cS." login = '".$nusuario."' AND ".$cS." senha = '".$nsenha."' LIMIT 1";
    $statement = $this->conn->prepare($sql);
    $statement->execute();
    
    return $statement->fetchAll();
    } 
}

    class SalvarProdutor extends \modelprodutor\ProdutorProperty{
        
        function __construct() {
            $this->conn = \database\DatabaseConnection::getDatabase();
        }
    
        function Salvar(\modelprodutor\ProdutorProperty $produtor) {
           
        if($produtor->getId()){
            $sql="update produtor set nome='".$produtor->getNome()."',
                                   telefone='".$produtor->getTelefone()."',
                                   email='".$produtor->getEmail()."',
                                   celular='".$produtor->getTelefone()."',
                                   dtnasc='".$produtor->getDtnasc()."',
                                   cep='".$produtor->getCep()."',
                                pais=".$produtor->getPais().",
                                estado=".$produtor->getEstado().",
                                cidade=".$produtor->getCidade().",
                                endereco='".$produtor->getEndereco()."',
                                numero=".$produtor->getNumero().",
                                login='".$produtor->getLogin()."',
                                senha='".$produtor->getSenha()."' where id=".$produtor->getId();
             
        } else{  
        $sql = "INSERT INTO produtor (nome,
                                telefone,
                                email,
                                data_cadastro,
                                celular,
                                dtnasc,
                                cep,
                                pais,
                                estado,
                                cidade,
                                endereco,
                                numero,
                                login,
                                senha) 
            VALUES ('".$produtor->getNome()."','"
                    .$produtor->getTelefone()."','"
                    .$produtor->getEmail()."',now(),'"
                    .$produtor->getCelular()."','"
                    .$produtor->getDtnasc()."','"
                    .$produtor->getCep()."',"
                    .$produtor->getPais().","
                    .$produtor->getEstado().","
                    .$produtor->getCidade().",'"
                    .$produtor->getEndereco()."',"
                    .$produtor->getNumero().",'"
                    .$produtor->getLogin()."','"
                    .$produtor->getSenha()."');"; 
        }
            $statement = $this->conn->prepare($sql);
            $statement->execute();
    
            $statement->fetchAll();
    
        }
    }