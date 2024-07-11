<?php
include '../models/conecction.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
    $presupuesto = $_POST['presupuesto'];

    $query = "INSERT INTO proyectos_de_investigacion (titulo, descripcion, fecha_inicio, fecha_fin, presupuesto) VALUES ('$titulo', '$descripcion', '$fecha_inicio', '$fecha_fin', '$presupuesto')";
    if (mysqli_query($connection, $query)) {
        echo "<script>alert('Proyecto agregado correctamente');</script>";
        echo "<script>window.location.href='http://localhost/DB_project/Tracking-System-of-Researching-Projects/pages/agregarProyectos.php';</script>";
    } else {
        echo "<script>alert('Error al agregar el proyecto: " . mysqli_error($connection) . "');</script>";
    }
}
?>
