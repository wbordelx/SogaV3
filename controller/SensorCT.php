<?php
namespace sensor;
include("./../conexao/dbconnect.php"); 
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class CarregarSensor //extends \modelsensor\SensorProperty
{ 
    public $conn;
    
    function __construct() {
        $this->conn = \database\DatabaseConnection::getDatabase();
    }
         
    function getSensor() {
        $sql = 'SELECT 
                s.id,
                s.codigo_unico,
                d.identificador,
                s.dt_cadastro
                FROM sensor_produtor s
          left join dados d on s.codigo_unico=d.codigo_unico
          where id_produtor = '.$_SESSION['usuarioID'].'
          group by d.identificador,s.codigo_unico,s.dt_cadastro,s.id 
          order by s.codigo_unico;';
    
    $statement = $this->conn->prepare($sql);
    $statement->execute();
    
    return $statement->fetchAll();
    }  
    
    function SalvarSensor(\modelsensor\SensorProperty $sensor){
        
        $sql='insert into sensor_produtor (id_produtor,
                                            codigo_unico,dt_cadastro) 
                                    values ('.$_SESSION['usuarioID'].
                                            ','.$sensor->getCodigo_unico().',now());';
        try{
            $statement = $this->conn->prepare($sql);
            $statement->execute();
        }  catch (\PDOException $e){
            exit("<script>alert('Codigo Unico Já Existe')</script>\n<script>window.location=('../view/SensorView.php')</script>");
        }
    }
    
    function ExcluirSensor(\modelsensor\SensorProperty $sensor) {
        $sql="delete from sensor_produtor where id=".$sensor->getId();
        
        $statement = $this->conn->prepare($sql);
        $statement->execute();
    }
}