<?php
require_once MODEL."UserModel.php";
class UserController{
    private $userModel;
    public function __construct(){
        $this->userModel=new UserModel();
    }

   public function login(){
        //  Condicionar si los datos existen
        $pageName="Login";
        if(  isset( $_POST["username"] )  &&  isset( $_POST["password"] )  ){
            // Asignar los valores a los atributos que declaramos en la clase del modelo
            // Usamos el objeto del modelo
            $this->userModel->username =  $_POST["username"];
            $this->userModel->password =  $_POST["password"];

            // Ahora que los datos están listos, podremos ejecutar el método de query, este método retorna el objeto del usuario en caso de que exista, caso contrario retorna nulo
            $usuario = $this->userModel->query();
            // Condicionamos si retornó datos
            if(!$usuario){
                // Datos vacíos
                // Guardamos en sesión un mensaje de error
                $error = 'Datos del usuario son incorrectos';
                // Ahora redireccionamos a la vista de login (se tendrá que crear)
                /*
                    Para ello incluiremos una vista que se creará en las vistas estáticas.
                */

                include_once HEADER;
                include_once STATIC_ . "login.php";
                include_once FOOTER;
            }else{
                // Datos correctos
                // Guardemos los valores en sesión
                $_SESSION['USER'] = $usuario;
                /*
                En el caso de que los datos están bien se podrá redirigir al inicio
                Usaremos la función de header("Location:");
                */
                header("Location:index.php");
            }
        }else{
            // Si no existen mostraremos una mensaje
            $error = 'Datos del usuario son incorrectos';

            /*Notese que las variables creadas estará disponible también en el archivo de login.php*/
            include_once HEADER;
            include_once STATIC_ . "login.php";
            include_once FOOTER;
        }
    }


    public function logout(){
        // El método de logout será para eliminar la variable de sesión de USER
        unset($_SESSION['USER']);
        header("Location:index.php");
    }
    public function view(){
        // pintará la vista de login
        $pageName="Login";

        include_once HEADER;
        include_once STATIC_. "login.php";
        include_once FOOTER;    
    }
}