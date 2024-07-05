<?php
$server = "127.0.0.1";
$user = "root";
$pass = "admin123";
$db = "gestion_investigacion";

$connection = mysqli_connect($server, $user, $pass, $db);
$connection->set_charset("utf8");

if (!$connection) {
    echo "No se ha podido conectar con el   servidor: " . mysqli_connect_error();
} else {
    echo "Hemos conectado al servidor <br>";
}

/* mysqli_close($connection);

echo "Fuera"; */
?>
