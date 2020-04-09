<?php
class DB{ 
    // patron de disenio singleton
    private static $connection = null; //atributo static y private
   
    //constructor privado para que solo dentro de esta clase pueda crearse objetos
    private function __construct() {
    }
    
    public static function getConnection(){
        try{
            // si no existe la conexion se crea
            if(!isset(self::$connection)){
                self::$connection = 
                    new PDO(
                                "mysql:host=" . SERVERDB . "; port= ".PORT."; dbname=" . NAMEDB, 
                                USER, 
                                PASSWORD
                            );  
                // se inicializa db con la conexion de tipo PDO a la base de datos (motor mysql)
                
                self::$connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
                self::$connection->exec("set character set utf8");
            }
        }catch(Exception $e){
            die(sprintf('No  hay conexión a la base de datos, hubo un error: %s', $e->getMessage()));
        }
        return self::$connection;
    }
}
