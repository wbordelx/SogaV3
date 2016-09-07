<?php
namespace database;

class DatabaseConnection{
    
    private static $instance;
    
    private function __construct(){
        
    }
    public static function getDatabase(){
         if (!isset(self::$instance)) {
            self::$instance = new \PDO('pgsql:host=localhost;dbname=sogav3','postgres','waguinho', array(
                //\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                \PDO::ATTR_EMULATE_PREPARES=>FALSE,
                \PDO::MYSQL_ATTR_DIRECT_QUERY=>FALSE,
                \PDO::ATTR_ERRMODE=>  \PDO::ERRMODE_EXCEPTION));  
            
            self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(\PDO::ATTR_ORACLE_NULLS, \PDO::NULL_EMPTY_STRING);
        }

        return self::$instance;
        
    }
}



$MyUsername = "root";  // enter your username for mysql
$MyPassword = "";  // enter your password for mysql
$MyHostname = "localhost";      // this is usually "localhost" unless your database resides on a different server

$dbh = pg_connect("host=localhost port=5432 dbname=sogav2 user=postgres password=waguinho");

?>