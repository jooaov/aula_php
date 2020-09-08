<?php
//Server=localhost;Database=master;Trusted_Connection=True;
$conn = new PDO("mysql:dbname=dbphp7;host=localhost:3308","root","");
$stmt = $conn->prepare("INSERT INTO tb_usuarios (deslogin,dessenha) VALUES (:LOGIN,:PASSWORD)");
$login = "joão";
$password = "123";
$stmt -> bindParam(":LOGIN",$login);
$stmt -> bindParam(":PASSWORD",$password);
$stmt->execute();
?>