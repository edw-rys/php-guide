<?php 
require_once MODEL."MovieModel.php";
class MovieController{
    private $movieModel;
    public function __construct(){
        $this->movieModel=new MovieModel();
    }

    public function index(){
        // Primero necesitaremos una variable que guarde el nombre del título de la página
        $pageName="Peliculas";
        // luego haremos la consulta de los datos guardados en base de datos
        // Accedemos al método query del modelo Movie
        $this->movieModel->query();
        // Esto retorna datos, así que podemos guardarlos en un array
        $peliculas = $this->movieModel->query();

        // Ahora simplemente podemos mostrar las vistas, ellas se encargaran de mostrar los datos
        include_once HEADER;
        include_once VIEWS . 'movie/movie.php'; // crearemos un directorio y ahí un archivo para crear la plantilla.
        include_once FOOTER;
    }


    public function saveImage($_name, $route){
        if(!$this->validateExt($_FILES[$_name]['name'])){
            return null;
        }
        opendir($route);
        $parts = explode(".",$_FILES[$_name]['name']);
        // con el final del explode que sería la extensión de la imagen
        $origen=  $_FILES[$_name]['tmp_name'];
        $destino= $route. $_FILES[$_name]['name']. time(). '.'.end($parts);//ends obtiene el último valor del arreglo
        move_uploaded_file($origen, $destino);
        // $_FILES[$_name]['type']; tipo de archivo
        return  $destino;
    }
    private function validateExt( $nombre){
        $patron = "%\.(gif|jpe?g|png|svg)$%i"; 
        return preg_match($patron, $nombre) ;
    }

    public function save(){
        // Guardará sólo si el usuario existe
        if(isset($_SESSION['USER'])){
            // Ahora debemos tener en cuenta los valores que llegan
            if(
                isset($_REQUEST["name"]) && isset($_REQUEST["sipnosis"]) && 
                isset($_REQUEST["ctg"]) && isset($_FILES["img"])
            ){
                // Condicionamos que todos los campos hayan sido enviados
                // Ahora guardamos los datos en el modelo
                $this->movieModel->name_movie = $_REQUEST["name"];
                $this->movieModel->sipnosis = $_REQUEST["sipnosis"];
                $this->movieModel->id_ctg = $_REQUEST["ctg"];
                    // Guardamos la imágen
                $this->movieModel->url_img = $this->saveImage("img", "assets/img/movies/");
                
                // Ahora verificamos si ha llegado un campo de id, para verificar si podremos editar
                if(!isset($_REQUEST["id_movie"])){
                    // Guardar
                    // Ahora guardamos
                    $guardado = $this->movieModel->create();
                    // COndicionamos si guardó
                    if($guardado > 0){
                        header("Location:index.php?c=movie");
                    }else{
                        header("Location:index.php?c=movie&a=show_new");
                    }
                }else{
                    // Editar
                    $this->movieModel->id_movie = $_REQUEST["id_movie"];
                    // Editamos
                    $guardado = $this->movieModel->update();
                    // COndicionamos si guardó
                    if($guardado > 0){
                        header("Location:index.php?c=movie");
                    }else{
                        header("Location:index.php?c=movie&a=show_edit");
                    }
                }
            }
        }else{
            // Caso contrario redireccionará al formulario
            header("Location:index.php?c=movie&a=show_new");
        }
    }
    public function delete(){
        if(isset($_SESSION['USER'])){
            // En caso de que esté logueado se elimina el id
            $id = ( isset($_GET['id'])) ? $_GET['id'] : 0;
            $this->movieModel->id_movie = $id;
            $this->movieModel->delete();
        }
        header("Location:index.php?c=movie");
    }

    public function show_new(){
        $pageName ="Nuevo";
        if(isset($_SESSION['USER'])){
            $categories = $this->movieModel->get_category();
            include_once HEADER;
            include_once VIEWS . 'movie/movieForm.php';
            include_once FOOTER;
        }else{
            header("Location:index.php");
        }
    }

    public function show_edit(){
        $pageName ="Editar";
        if(isset($_SESSION['USER'])){
            // Obtenemos el id enviado por la url
            // localhos/mvc/index.php?c=movie&a?show_edit&id=131
            $id = ( isset($_GET['id'])) ? $_GET['id'] : 0;
            // Asignamos el id al modelo
            $this->movieModel->id_movie = $id;
            // Este método retornará nulo o un objeto con datos de la película
            $dato = $this->movieModel->queryOne();
            
            // Conficionamos si tiene datos
            if(!is_null($dato)){
                // En el caso de que tenga datos podemos guardalos en otra variable
                $pelicula = $dato;
            }
            $categories = $this->movieModel->get_category();
            // Luego pintaremos el formulario
            include_once HEADER;
            include_once VIEWS . 'movie/movieForm.php';
            include_once FOOTER;
        }else{
            header("Location:index.php?c=movie&a=show_new");
        }
    }
}
