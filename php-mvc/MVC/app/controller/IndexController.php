<?php
class IndexController{
    public function index(){
        $pageName="Indice";
        require_once HEADER;
        require_once STATIC_.'index.php';
        require_once FOOTER;
    }
    public function static(){
        $pagina = (isset($_REQUEST['p'])) ? $_REQUEST['p'] : 'Index';
        $pageName=$pagina;
        require_once HEADER;
        $dir='views/static/'.$pagina.".php";
        if(!file_exists($dir))
            $dir='views/static/notFound.php';
    	require_once $dir;
    	require_once FOOTER;
    }
    public function notFound(){
        $pageName="Error 404";
        require_once HEADER;
        require_once 'views/static/notFound.php';
        require_once FOOTER;
    }
}
