<?php
$conn = new mysqli("localhost:3308","root","","dbphp7");

if($conn->connect_error){
    echo "Error" . $conn->connect_error;
}

// $stmt = $conn->prepare("INSERT INTO tb_usuarios(deslogin,dessenha) VALUES(?,?)");
// $stmt ->bind_param("ss",$login,$pass);
// $login = "user";
// $pass = "12345";
// $stmt ->execute();

$result = $conn->query("SELECT * FROM tb_usuarios ORDER BY deslogin");

while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    var_dump($row);
}


?>