<?php
include '../models/conecction.php';

if (isset($_GET['id'])) {
    $institucion_id = $_GET['id'];

    // Eliminar registros relacionados en otras tablas
    $deleteProyectoColaboradoresQuery = "DELETE FROM proyecto_colaboradores WHERE colaborador_documento IN (SELECT documento FROM colaboradores WHERE institucion_id = $institucion_id)";
    $deletePublicacionColaboradoresQuery = "DELETE FROM publicacion_colaboradores WHERE colaborador_documento IN (SELECT documento FROM colaboradores WHERE institucion_id = $institucion_id)";
    $deleteColaboradoresQuery = "DELETE FROM colaboradores WHERE institucion_id = $institucion_id";
    $deleteFinanciacionQuery = "DELETE FROM financiacion WHERE institucion_id = $institucion_id";

    // Ejecutar las consultas de eliminación de registros relacionados
    mysqli_query($connection, $deleteProyectoColaboradoresQuery);
    mysqli_query($connection, $deletePublicacionColaboradoresQuery);
    mysqli_query($connection, $deleteColaboradoresQuery);
    mysqli_query($connection, $deleteFinanciacionQuery);

    // Eliminar la institución
    $deleteInstitutionQuery = "DELETE FROM instituciones WHERE institucion_id = $institucion_id";

    if (mysqli_query($connection, $deleteInstitutionQuery)) {
        header("Location: adminInstitutions.php");
        exit(); // Asegúrate de salir después de la redirección
    } else {
        echo "Error al eliminar la institución: " . mysqli_error($connection);
    }

    mysqli_close($connection);
} else {
    echo "ID de institución no proporcionado.";
}
?>

