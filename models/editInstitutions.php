<?php
include '../models/conecction.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $institucion_id = $_POST['institucion_id'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];

    $updateQuery = "UPDATE instituciones SET nombre='$nombre', direccion='$direccion', telefono='$telefono' WHERE institucion_id=$institucion_id";

    if (mysqli_query($connection, $updateQuery)) {
        header("Location: ../pages/adminInstitutions.php");
    } else {
        echo "Error al actualizar la información de la institución: " . mysqli_error($connection);
    }

    mysqli_close($connection);
}