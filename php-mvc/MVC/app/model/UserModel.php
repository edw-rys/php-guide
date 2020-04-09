<?php
require_once DB; 
class UserModel{
    private $conn;

    public $username;
    public $password;
    public function __construct(){
        $this->conn =  DB::getConnection();
    }

    public function query(){
        if(is_null($this->conn)) return null; // si es nulo, retorna un dato nulo
        try{
            $query = "SELECT username FROM user_ where username = ? and password = ?;";
            $sentencia = $this->conn->prepare($query); 
            $sentencia->execute(
                [
                    $this->username,
                    $this->password,
                ]
            );
            // Usaremos la función fetch para obtener un solo dato
            $resultSet = $sentencia->fetch(PDO::FETCH_OBJ); 
            return $resultSet;
        }catch(Exception $e){
            /*
            En caso de haber algún error se puede descomentar estas líneas para mostar cuál fue el error
            */
            // die($e->getMessage());
            // die($e->getTrace()); // traza del error
            return null;
        }
    }
}