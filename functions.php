<?php
////////////////////////////////////////////////
//tipos de dados
$nome1   = "João";
//apagar variavel
unset($nome1);
//array
$frutas = array("abacaxi", "laranja","mamão");
//obj
$nascimento = new DateTime();
//mostra o obj
//echo var_dump($nascimento);

//ler arquivos
//type data = stream
$arquivo = fopen("index.php", 'r');
//var_dump($arquivo);

//////////////////////////////////////////

//variaveis pré definidas
//get
// $nome = (int)$_GET["a"];
// $nome2 = (int)$_GET["b"];
// var_dump($nome);
// echo "<br/>";
// var_dump($nome2);
// $ip = $_SERVER["REMOTE_ADDR"];
// echo $ip;
// var_dump($_SERVER);
////////////////////////////////////////
//escopo de variavel
$nome = "joao";

function echoNome()
{
    //define a var nome como global apa o esopo interno da função e o externo
    global $nome;
    echo $nome;
}

// echoNome();

/////////////////////////////////////
//include e require
//pasta includepath
//include importa arquivo de codigo 
//include "arquivo importado";

//arquivo se não existir da erro
//require "arquivo importado";

//once pega somente um require ou um include
//require_once "";
//include_once "";
//////////////////////////////////////

///////////////////////////////////////
//swich

// $diaDaSemana = 5;
// switch ($diaDaSemana) {
//     case 1:
//         echo "foi 1";
//         break;

//     case 2:
//         echo "foi 2";
//         break;

//     default:
//         echo "foi outro numero";
//         break;
// }

///////////////////////////////////////
//constantes
// define("VARCONST","127.0.0.1");
//define como não case sensitive
// define("VARCONSTCSENSITIVE","127.0.0.1",true);
// echo VARCONST;

// echo DIRECTORY_SEPARATOR;
////////////////////////////////////////
//sessão
//sessão é uma var superglobal
// session_start();
// $_SESSION["nome"]= "joao";
//apaga as variaveis
// session_unset($_SESSION["nome"]);
//apaga todas
// session_unset();
//destroi toda a sessão
// session_destroy();
//////////////////////////////////////////
//define o id da sessão
// session_id('123'); 
// session_start();
// // session_regenerate_id();
// echo session_id();
// var_dump($_SESSION);

//////////////////////////////////////////
//funções para sessão

require_once("config.php");
echo "<br/>";
echo session_save_path();
echo "<br/>";
echo session_status();
// echo session_id();

//////////////////////////////////////////
"passagem de parametro por referencia";
//passa o ponteiro  da variavel
//funcao(&$a)
//////////////////////////////////////////
//funcções novas 
//funcção recebe uma quantidade indeterminada de valores e transforma em um array
function soma(int ...$valores){
    return array_sum($valores);
}
echo "<br/>";
echo soma(1,15,20,5);
echo "<br/>";
var_dump(soma2(1,15,20,5));

//: string retorna o dado no tipo string
function soma2(int ...$valores):string{
    return array_sum($valores);
}

//////////////////////////////////////////