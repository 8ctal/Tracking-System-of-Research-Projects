<?php
@include "../models/conecction.php";
@include "../includes/header.php";
@include "../includes/sidebarAdmin.php";
@include "../includes/footer.php";
?>
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
        select {
            padding: 10px;
            width: 100%;
            max-width: 300px;
            margin: 0 auto;
            display: block;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Filtrar Eventos por Proyecto de Investigación</h1>
        <form action="" method="GET">
            <select name="proyecto_id" onchange="this.form.submit()">
                <option value="">Selecciona un Proyecto</option>
                <?php

                $query = "SELECT proyecto_id, titulo FROM proyectos_de_investigacion";
                $result = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    $selected = (isset($_GET['proyecto_id']) && $_GET['proyecto_id'] == $row['proyecto_id']) ? 'selected' : '';
                    echo "<option value='" . $row['proyecto_id'] . "' $selected>" . $row['titulo'] . "</option>";
                }
                ?>
            </select>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Ubicación</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['proyecto_id']) && !empty($_GET['proyecto_id'])) {
                    $proyecto_id = $_GET['proyecto_id'];

                    $query = "SELECT evento_id, nombre, fecha, ubicacion, descripcion 
                              FROM eventos 
                              WHERE proyecto_id = $proyecto_id";
                    $result = mysqli_query($connection, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['evento_id'] . "</td>";
                            echo "<td>" . $row['nombre'] . "</td>";
                            echo "<td>" . $row['fecha'] . "</td>";
                            echo "<td>" . $row['ubicacion'] . "</td>";
                            echo "<td>" . $row['descripcion'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No se encontraron eventos para este proyecto.</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Selecciona un proyecto para ver sus eventos.</td></tr>";
                }

                mysqli_close($connection);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
