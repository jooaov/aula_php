<?php
interface Veiculo {
    public function acelerar($velocidade); 
    public function freiar($velocidade); 
    public function trocarMarchar($marcha); 
}
?>