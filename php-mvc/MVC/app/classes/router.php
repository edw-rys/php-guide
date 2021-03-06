<?php
class RouterControl {
    public function route() {
        $this->sessionStart();
        $controller = (isset($_REQUEST['c'])) ? $_REQUEST['c'] : 'Index';
        $action = (isset($_REQUEST['a'])) ? $_REQUEST['a'] : 'index';
        $controller = strtolower($controller); // strtolower Make a string lowercase
        $controller = ucwords($controller) . "Controller"; //ucwords — Uppercase the first character of each word in a string   
        require_once CONTROLLER . $controller . ".php"; // require de la clase del controlador
        $controller = new $controller; // creacion del objeto controlador
        $controller->$action(); //llamada a la funcion del controlador (action) que se va a ejecutar 
    }
    public function sessionStart(){
        if (!isset($_SESSION)) {
            session_start();
        }
    }
}
