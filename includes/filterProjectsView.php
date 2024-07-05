
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtrar Proyectos por Instituciones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        form {
            margin-bottom: 20px;
        }
        select, button {
            padding: 10px;
            font-size: 16px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Filtrar proyectos por instituciones</h1>
        <form method="POST" action="../models/filterProjects.php">
            <label for="institucion">Selecciona una Institución:</label>
            <select id="institucion" name="institucion_id">
                <!-- Aquí se llenarán las opciones con PHP -->
                <?php
                include '../models/conecction.php';
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
                if (isset($result)) {
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
</body>
</html>
