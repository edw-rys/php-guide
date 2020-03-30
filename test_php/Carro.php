<?php
class Carro
{
    // los atributos los definimos como una variable normal, pero estos pueden ser públicos o privados.
    public $marca ;
    public $color ;
    public $velcoidad ;
    public $ruedas ;
    public $motor ;
    private $estaEncendido= false; // false: apagado, true: encendido
    private $estaEnArranque= false; // false: arrancando, true: detenido
    // el constructor tiene que ser público, lo definimos con el nombre de __construct
    public function __construct($marca, $color, $velo, $ruedas, $motor){
        $this->marca = $marca; 
        $this->color = $color ;
        $this->velcoidad = $velo ;
        $this->ruedas = $ruedas ;
        $this->motor = $motor ;
        // listo, ahora si podemos enviar valores a nuestro objeto
    }
    // las funciones aquí se denominan métodos.
    public function encender()
    {
        if($this->estaEncendido){
            echo "El carro $this->marca ya está encendido.";
        }else{
            $this->estaEncendido =true;
            echo "Carro de marca $this->marca encendido.";
        }
    }
    public function arranca()
    {
        if($this->estaEncendido){
            echo "Carro de marca $this->marca arrancando";
        }else{
            $this->estaEnArranque =true;
            echo "Carro de marca $this->marca no está encendido";
        }
    }
    public function frena()
    {
        if($this->estaEncendido){
            if($this->estaEnArranque){
                $this->estaEnArranque =false;
                echo "Carro de marca $this->marca frenando";
            }else{
                echo "Se necesita arrancar con el auto de marca $this->marca";
            }
        }else{
            echo "Carro de marca $this->marca no está encendido";
        }    
    }
    public function gira($lado)
    {
        if($this->estaEncendido){
            echo "Carro de marca $this->marca girando hacia la " . $lado;
        }else{
            echo "Carro de marca $this->marca no está encendido";
        }
    }
    public function apagar( )
    {
        if($this->estaEncendido){
            echo "Carro de marca $this->marca apagado";
            $this->estaEncendido = false;
        }else{
            echo "Carro de marca $this->marca no está encendido";
        }
    }
}
?>