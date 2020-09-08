<?php
//Server=localhost;Database=master;Trusted_Connection=True;
$conn = new PDO("mysql:dbname=dbphp7;host=localhost:3308","root","");
$stmt = $conn->prepare("SELECT * FROM tb_usuarios ORDER BY deslogin");
$stmt->execute();
//fetchAll(formata todos so resultados)
//PDO::FETCH_ASSOC não mostra o id
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $row) {
    foreach ($row as $key => $value) {
        echo "<strong>".$key.":<strong/>".$value."<br/>".
        "================================================ <br/>";
    }
}

?>