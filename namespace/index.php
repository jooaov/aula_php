<?php
require_once("config.php");
use Cliente\Cadastro;

$cad = new Cadastro();
$cad->setNome("Joao");
$cad->setEmail("jjoao.jv13@gmail.com");
$cad->setSenha("123456");
$cad->registrarVenda();

echo $cad;
?>