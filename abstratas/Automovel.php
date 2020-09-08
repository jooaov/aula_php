<?php
abstract class Automovel implements Veiculo {

    public function acelerar($velocidade){
        echo "o veiculo acelerou até ".$velocidade." KM/H";
    }

    public function freiar($velocidade){
        echo "o veiculo freiou até ".$velocidade." KM/H";

    }

    public function trocarMarchar($marcha)
    {
        echo "o veiculo engatou a marcha".$marcha;
        
    }
}
?>