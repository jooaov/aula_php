<?php
class Pessoa
{
    //atributo
    public $nome;
    //metodo
    public function falar()
    {
        return  "meu nome é " . $this->nome;
    }
}

class Carro
{
    private $modelo;
    private $motor;
    private $ano;

    public function getModelo()
    {
        return $this->modelo;
    }

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public function getMotor()
    {
        return $this->motor;
    }

    public function setMotor($motor)
    {
        $this->motor = $motor;
    }

    public function getAno()
    {
        return $this->modelo;
    }

    public function setAno($ano)
    {
        $this->ano = $ano;
    }

    public function exibir()
    {
        return array(
            "modelo" => $this->getModelo(),
            "motor" => $this->getMotor(),
            "ano" => $this->getAno()
        );
    }
}

class Documento
{
    private $numero;

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($num)
    {
        //documento:: acessar função estatica
        $resultado = Documento::validarCpf($num);
        if ($resultado == false) {
            //erro personalizado
            throw new Exception("O cpf informado não é valido", 1);
        } else {
            $this->numero = $num;
        }
    }

    public static function validarCpf($cpf)
    {
        if (empty($cpf)) {
            return false;
        }

        $cpf = preg_match('/[0-9]/', $cpf) ? $cpf : 0;

        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);


        if (strlen($cpf) != 11) {
            echo "length";
            return false;
        } else if (
            $cpf == '00000000000' ||
            $cpf == '11111111111' ||
            $cpf == '22222222222' ||
            $cpf == '33333333333' ||
            $cpf == '44444444444' ||
            $cpf == '55555555555' ||
            $cpf == '66666666666' ||
            $cpf == '77777777777' ||
            $cpf == '88888888888' ||
            $cpf == '99999999999'
        ) {
            return false;
        } else {

            for ($t = 9; $t < 11; $t++) {

                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{
                    $c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{
                $c} != $d) {
                    return false;
                }
            }

            return true;
        }
    }
}

$joao = new Pessoa();
$joao->nome = "joão victor";
// echo $joao->falar();

$carronovo = new Carro();
$carronovo->setAno("1999");
$carronovo->setModelo("uno");
$carronovo->setMotor("bom");
// var_dump($carronovo->exibir());

$cpf = new Documento();
$cpf->setNumero("07279429300");

// var_dump($cpf->getNumero());
//usado o metodo estatico
// var_dump(Documento::validarCpf("07279429300"));
//////////////////////////
//metodos magicos
class Endereco
{
    private $logradouro;
    private $numero;
    private $cidade;

    public function __construct($log, $num, $cidade)
    {
        $this->logradouro = $log;
        $this->numero = $num;
        $this->cidade = $cidade;
    }

    //quando o espaço de memoria é limpo
    public function __destruct()
    {
        var_dump("destruir");
    }   

    public function __toString()
    {
        return $this->logradouro.", ".$this->numero." - ".$this->cidade;
    }
}


$meuEndereco = new Endereco("avenida padre ibiapina", "28", "Abaiara");
// var_dump($meuEndereco);
// echo $meuEndereco;

///////////////////////////////////////////////
//encapsulamento

class Pessoas {
    public $nome = "Joao Victor";
    //protected só a propia classe e classes filhas poder ver
    protected $idade = 20;
    //private só a propia classe pode ver
    private $senha = "123456";

    public function verDados(){
        echo $this->nome . "<br/>";
        echo $this->idade . "<br/>";
        echo $this->senha . "<br/>";
    }
}

class Programador extends Pessoas
{
    public function verDados(){

        echo get_class($this);
        echo "<br/>";

        echo $this->nome . "<br/>";
        echo $this->idade . "<br/>";
    }
}


// $obj = new Pessoas();
// echo $obj->verDados();

// $obj = new Programador();

// $obj->verDados();

/////////////////////////////////////////////////////
//herança

class Documentos {

    private $numero;

    public function getNumero(){
        return $this->numero;
    }

    public function setNumero($n){
        $this -> numero = $n;
    
    }
}

class Cpf extends Documentos{
        
    public function validar():bool{
        //validar cpf
        return true;
    }

}

// $doc = new Cpf();
// $doc -> setNumero("123");
// echo $doc -> getNumero();
// var_dump($doc->validar());

/////////////////////////////////////////////////
//interface

// interface Veiculo {
//     public function acelerar($velocidade); 
//     public function freiar($velocidade); 
//     public function trocarMarchar($marcha); 
// }

// class Civic extends Automovel {

//     public function acelerar($velocidade){
//         echo "o veiculo acelerou até ".$velocidade." KM/H";
//     }

//     public function freiar($velocidade){
//         echo "o veiculo freiou até ".$velocidade." KM/H";

//     }

//     public function trocarMarchar($marcha)
//     {
//         echo "o veiculo engatou a marcha".$marcha;
        
//     }
// }

////////////////////////////////////////////////////////////////////
//classe abstrata
//classe abstrata só serve para ter flihos
// abstract class Automovel implements Veiculo {

//     public function acelerar($velocidade){
//         echo "o veiculo acelerou até ".$velocidade." KM/H";
//     }

//     public function freiar($velocidade){
//         echo "o veiculo freiou até ".$velocidade." KM/H";

//     }

//     public function trocarMarchar($marcha)
//     {
//         echo "o veiculo engatou a marcha".$marcha;
        
//     }
// }

//$this para a classe instanciada e o $parent para a classe pai
//////////////////////////////////////////////////////////////////
//autoload
//quando instanciado uma função é executada essa função
// function __autoload($nomeClasse){
//     require_once($nomeClasse.".php");
// }

function incluirClasses($nomeClasse){
    if(file_exists($nomeClasse.".php") ===true){
        require_once($nomeClasse.".php");
    }
}

spl_autoload_register("incluirClasses");
spl_autoload_register(function($nomeClasse){
    if(file_exists("abstratas".DIRECTORY_SEPARATOR.$nomeClasse.".php") ===true){
        require_once("abstratas".DIRECTORY_SEPARATOR.$nomeClasse.".php");
    }
});
$carrinho = new Civic();
$carrinho -> acelerar("2000");

//////////////////////////////////////////////////////////////////////////////////
//nameSpace



