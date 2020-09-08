<?php
//Server=localhost;Database=master;Trusted_Connection=True;
//ConnectionPooling = "ajax"
$conn = new PDO("sqlsrv:Database=dbphp7;server=DESKTOP-SUO5O2T;ConnectionPooling=0","sa","admin");
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