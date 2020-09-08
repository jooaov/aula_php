<?php
//Server=localhost;Database=master;Trusted_Connection=True;
$conn = new PDO("mysql:dbname=dbphp7;host=localhost:3308","root","");
$conn->beginTransaction();
$stmt = $conn->prepare("INSERT INTO tb_usuarios (deslogin,dessenha) VALUES (?,?)");
$login = "joão novo";
$password = "123";
$stmt->execute(array($login,$password));

$conn->commit();
//retorna a transação $conn->rollBack();
?>