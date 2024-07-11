<?php
include '../models/conecction.php';

if (isset($_GET['id'])) {
    $proyecto_id = $_GET['id'];

    // Eliminar registros relacionados en tablas dependientes
    $queries = [
        "DELETE FROM tareas WHERE proyecto_id = $proyecto_id",
        "DELETE FROM financiacion WHERE proyecto_id = $proyecto_id",
        "DELETE FROM eventos WHERE proyecto_id = $proyecto_id",
        "DELETE FROM publicaciones WHERE proyecto_id = $proyecto_id",
        "DELETE FROM proyecto_colaboradores WHERE proyecto_id = $proyecto_id"
    ];

    foreach ($queries as $query) {
        if (!mysqli_query($connection, $query)) {
            die("Error al eliminar registros relacionados: " . mysqli_error($connection));
        }
    }

    // Eliminar el proyecto principal
    $query = "DELETE FROM proyectos_de_investigacion WHERE proyecto_id = $proyecto_id";
    if (mysqli_query($connection, $query)) {
        header('Location: ../pages/editarProyectos.php');
        exit();
    } else {
        die("Error al eliminar el proyecto: " . mysqli_error($connection));
    }
}
?>
