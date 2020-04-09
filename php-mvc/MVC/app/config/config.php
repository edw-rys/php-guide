<?php
// RUTA DEL SISTEMA
/**
 * Estas rutas son las ubicaciones de los directorios que contienen ficheros php
 */
define('DS'                 , DIRECTORY_SEPARATOR);
define('ROOT'               , getcwd().DS);
define('APP'                , ROOT.'app'.DS);


define('CONFIG'             , APP.'config'.DS);
define('CONTROLLER'         , APP.'controller'.DS);
define('MODEL'              , APP.'model'.DS);
define('CLASSES'            , APP.'classes'.DS);
// Rutas de archivos
define('DB'                 , CLASSES.'db.php');
define('ROUTERCONTROL'      , CLASSES.'router.php');

// Plantillas
define('VIEWS'              , ROOT.'views'.DS);
define('COMPONENTS'         , VIEWS.'components'.DS);
define('TEMPLATES'          , VIEWS.'templates'.DS);
define('STATIC_'             , VIEWS.'static'.DS);

//encabezado y pie
define('HEADER'             , TEMPLATES.'header.php');
define('FOOTER'             , TEMPLATES.'footer.php');
define("NAVIGATION"         , COMPONENTS."nav.php");

/**
 * Estas rutas son para archivos que se requieran para la presentación del archivo HTML, como imágenes, archivos css, js, etc.
 */
//rutas generales
// Definimos el nombre de la app y el servidor
define('SERVER', 'localhost');  // En desarrollo es localhost

define("NAMEAPP", "mvc");
define("ROUTEAPP","http://".SERVER."/".NAMEAPP);  // ruta http://localhost/mvc

// RUTA RECURSOS
define("ROUTECSS"           , ROUTEAPP.'/assets/css');
define("ROUTEJS"            , ROUTEAPP.'/assets/js');
define("ROUTEIMG"           , ROUTEAPP.'/assets/img');



// RUTAS PARA BASE DE DATOS
define("SERVERDB", "localhost");
define("PORT", "3306");
define("NAMEDB", "app_movie_php");
define("USER", "root");
define("PASSWORD", "");


//
define("ADMIN",101);
define("CLIENTE",102);
