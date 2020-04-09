<?php
require_once DB; //Cod-A
class MovieModel{
    private $conn; //Cod-B

    public $id_movie;
    public $name_movie;
    public $sipnosis; 
    public $url_img; 
    public $id_ctg;

    /**
    * Constructor, incializa la conexión. Cod-C
    */
    public function __construct(){
        $this->conn =  DB::getConnection();
        // Con esto ya tenemos la conexión en caso de que el motor de base de datos mysql estén encendido y los datos estén correctos (PUERTO, HOST, USUARIO, PASSWORD)
    }

    public function query(){
        if(is_null($this->conn)) return []; // si es nulo, retorna el arreglo vacío

        // Sino ejecuta la sentencia.
        // Preparamos un try catch en caso de que ocurra un error
        try{
            $query = "SELECT * FROM movie inner join ctg_movie as c on c.id_ctg = movie.id_ctg where status=1;";
            $sentencia = $this->conn->prepare($query); // .**Cod-A-2**
            $sentencia->execute([]);          //.**Cod-A-3**
            $resultSet = $sentencia->fetchAll(PDO::FETCH_OBJ); //.**Cod-A-4**
            return $resultSet;
        }catch(Exception $e){
            /*
            En caso de haber algún error se puede descomentar estas líneas para mostar cuál fue el error
            */
            // die($e->getMessage());
            // die($e->getTrace()); // traza del error
            return [];
        }
    }
    // Agregamos un método para buscar un sólo registro
    public function queryOne(){
        if(is_null($this->conn)) return null; // si es nulo, retorna el arreglo vacío

        // Sino ejecuta la sentencia.
        // Preparamos un try catch en caso de que ocurra un error
        try{
            $query = "SELECT * FROM movie WHERE id_movie = ?;";
            $sentencia = $this->conn->prepare($query); // .**Cod-A-2**
            $sentencia->execute([$this->id_movie]);          //.**Cod-A-3**
            $resultSet = $sentencia->fetch(PDO::FETCH_OBJ); //.**Cod-A-4**
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
    public function create(){
        if(is_null($this->conn)) return []; // si es nulo, retorna el arreglo vacío
        try{
            $sentencia = $this->conn->prepare(
                "insert into movie (name_movie,sipnosis,url_img,id_ctg)".
                " values (?,?,?,?);"
            );
            // Ahora tendremos que preparar un array de valores para enviarlos y que sean reemplazados por los signos "?"
            $parametros = array(
                $this->name_movie,
                $this->sipnosis,
                $this->url_img,
                $this->id_ctg,
            );
            // Dichos datos son enviados al ejecutar
            $sentencia->execute($parametros);
            // Ahora tendremos que retornar el valor de cambios que se hizo para saber si los valores se guardaron o no
            // Para eso usamos la función rowCount
            return $sentencia->rowCount();
        }catch(Exception $e){
            /*
            En caso de haber algún error se puede descomentar estas líneas para mostar cuál fue el error
            */
            // die($e->getMessage());
            // die($e->getTrace()); // traza del error
            return [];
        }
    }
    public function update(){
        if(is_null($this->conn)) return []; // si es nulo, retorna el arreglo vacío
        try{
            $sentencia = $this->conn->prepare(
                "update movie set name_movie=? , sipnosis=? , url_img=? ,id_ctg=? ".
                " where id_movie=? "
            );
            // Ahora tendremos que preparar un array de valores para enviarlos y que sean reemplazados por los signos "?"
            $parametros = array(
                $this->name_movie,
                $this->sipnosis,
                $this->url_img,
                $this->id_ctg,
                $this->id_movie,
            );
            // Dichos datos son enviados al ejecutar
            $sentencia->execute($parametros);
            // Ahora tendremos que retornar el valor de cambios que se hizo para saber si los valores se guardaron o no
            // Para eso usamos la función rowCount
            return $sentencia->rowCount();
        }catch(Exception $e){
            /*
            En caso de haber algún error se puede descomentar estas líneas para mostar cuál fue el error
            */
            // die($e->getMessage());
            // die($e->getTrace()); // traza del error
            return [];
        }
    }
    public function delete(){
        if(is_null($this->conn)) return []; // si es nulo, retorna el arreglo vacío
        try{
            $sentencia = $this->conn->prepare(
                "update movie set status=0 where id_movie=? "
            );
            // En vez de eliminar los datos cambiaremos el estado a 0 que reflejará que ha sido elimiado
            $parametros = array(
                $this->id_movie,
            );
            // Dichos datos son enviados al ejecutar
            $sentencia->execute($parametros);
            // Ahora tendremos que retornar el valor de cambios que se hizo para saber si los valores se guardaron o no
            // Para eso usamos la función rowCount
            return $sentencia->rowCount();
        }catch(Exception $e){
            /*
            En caso de haber algún error se puede descomentar estas líneas para mostar cuál fue el error
            */
            // die($e->getMessage());
            // die($e->getTrace()); // traza del error
            return [];
        }
    }
    /**
     * Obtener todas las categorías
     */
    public function get_category(){
        if(is_null($this->conn)) return []; // si es nulo, retorna el arreglo vacío

        // Sino ejecuta la sentencia.
        // Preparamos un try catch en caso de que ocurra un error
        try{
            $query = "SELECT * FROM ctg_movie";
            $sentencia = $this->conn->prepare($query); // .**Cod-A-2**
            $sentencia->execute([]);          //.**Cod-A-3**
            $resultSet = $sentencia->fetchAll(PDO::FETCH_OBJ); //.**Cod-A-4**
            return $resultSet;
        }catch(Exception $e){
            /*
            En caso de haber algún error se puede descomentar estas líneas para mostar cuál fue el error
            */
            // die($e->getMessage());
            // die($e->getTrace()); // traza del error
            return [];
        }
    }
}