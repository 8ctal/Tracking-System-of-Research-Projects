<?php
// Conexión a la base de datos
include '../models/conecction.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $institucion_id = $_POST['institucion_id'];

    // Consulta para obtener los proyectos de la institución seleccionada
    $query = "SELECT titulo, descripcion, fecha_inicio, fecha_fin, presupuesto 
              FROM proyectos_de_investigacion 
              JOIN financiacion ON proyectos_de_investigacion.proyecto_id = financiacion.proyecto_id 
              WHERE financiacion.institucion_id = $institucion_id";
    $result = mysqli_query($connection, $query);
    
    // Incluimos nuevamente el HTML para que se vea el resultado del filtro
    include '../pages/proyectos_inst.php';
}
