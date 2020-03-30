<?php
require_once "Carro.php";
$carroToyota = new Carro("TOYOTA", "ROJO", 125.5, 4,"V8");// enviaremos valores hacia el objeto respetando el orden de cómo se reciben los atributos
// $marca, $color, $velo, $ruedas, $motor 
// ese es el orden en el cual se enviarán los datos

// vamos a crear otro objeto
$carroMazda = new Carro("MAZDA", "AZUL", 156.3, 4,"V10");//


$carros =[
    new Carro("BMW", "NEGRO",156.2,4,"V8"),
    new Carro("AVEO", "AZUL",196.2,4,"V8"),
    new Carro("KIA", "AZUL",154.5,4,"V8"),
    new Carro("MARZA", "ROJO",253.1,4,"VB"),
    new Carro("TOYOTA", "BLANCO",251,4,"VB"),
];

function encenderCarros( $carros_params)
{
    if(!empty($carros_params)){
        foreach ($carros_params as $key => $carro) {
            echo "<br>";//salto
            echo "Marca: $carro->marca"; // así como también llamamos a las funcionalidades con la flecha, también podemos llamar a los atributos con la misma, siempre y cuándo sean públicos -> public $var;
            $carro->encender();
        }
    }else{
        echo "No hay carros";
    }
}

// ahora probaremos
echo "<br> Envío carros<br>";
encenderCarros($carros);
echo "<br> Vacío<br>";
encenderCarros([]); // se le envía datos vacíos
echo "<br> Envío carros otra vez.<br>";
encenderCarros($carros);