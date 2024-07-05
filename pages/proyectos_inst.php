<?php 
@include "../models/conecction.php";
@include "../includes/header.php";
@include "../includes/sidebar.php";
@include "../includes/footer.php";
?>

<div class="container">
        <h1>filtrar proyectos por instituciones</h1>
        <form method="POST" action="../models/filterProjects.php">
            <label for="institucion">Selecciona una Institución:</label>
            <select id="institucion" name="institucion_id">
                <!-- Aquí se llenarán las opciones con PHP -->
                <?php
              /*   include 'dbConnection.php'; */
                $query = "SELECT institucion_id, nombre FROM instituciones";
                $result = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['institucion_id']}'>{$row['nombre']}</option>";
                }
                ?>
            </select>
            <button type="submit">Filtrar</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Fin</th>
                    <th>Presupuesto</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí se llenarán los proyectos con PHP -->
                <?php
                if (isset($_POST['institucion_id'])) {
                    $institucion_id = $_POST['institucion_id'];
                    $query = "SELECT titulo, descripcion, fecha_inicio, fecha_fin, presupuesto 
                              FROM proyectos_de_investigacion 
                              JOIN financiacion ON proyectos_de_investigacion.proyecto_id = financiacion.proyecto_id 
                              WHERE financiacion.institucion_id = $institucion_id";
                    $result = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['titulo']}</td>
                                <td>{$row['descripcion']}</td>
                                <td>{$row['fecha_inicio']}</td>
                                <td>{$row['fecha_fin']}</td>
                                <td>{$row['presupuesto']}</td>
                              </tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>