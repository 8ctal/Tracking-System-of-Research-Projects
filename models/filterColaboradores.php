<?php
// Conexión a la base de datos
include '../models/conecction.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $institucion_id = $_POST['institucion_id'];

    // Consulta para obtener los colaboradores de la institución seleccionada
    $query = "SELECT documento, nombre, apellido, email, telefono 
              FROM colaboradores 
              WHERE institucion_id = $institucion_id";
    $result = mysqli_query($connection, $query);
    
    // Incluimos nuevamente el HTML para que se vea el resultado del filtro
    include '../pages/filterColaboradoresView.php';
}
?>
