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
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        select {
            padding: 10px;
            width: 100%;
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
        <h1>Filtrar Proyectos por Colaboradores</h1>
        <form action="" method="GET">
            <select name="colaborador_documento">
                <option value="">Selecciona un Colaborador</option>
                <?php

                $query = "SELECT documento, nombre, apellido FROM colaboradores";
                $result = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    $selected = (isset($_GET['colaborador_documento']) && $_GET['colaborador_documento'] == $row['documento']) ? 'selected' : '';
                    echo "<option value='" . $row['documento'] . "' $selected>" . $row['nombre'] . " " . $row['apellido'] . "</option>";
                }
                ?>
            </select>
            <button type="submit">Filtrar</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Fin</th>
                    <th>Presupuesto</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['colaborador_documento']) && !empty($_GET['colaborador_documento'])) {
                    $colaborador_documento = $_GET['colaborador_documento'];

                    $query = "SELECT pi.proyecto_id, pi.titulo, pi.descripcion, pi.fecha_inicio, pi.fecha_fin, pi.presupuesto 
                              FROM proyectos_de_investigacion pi
                              JOIN proyecto_colaboradores pc ON pi.proyecto_id = pc.proyecto_id
                              WHERE pc.colaborador_documento = '$colaborador_documento'";
                    $result = mysqli_query($connection, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['proyecto_id'] . "</td>";
                            echo "<td>" . $row['titulo'] . "</td>";
                            echo "<td>" . $row['descripcion'] . "</td>";
                            echo "<td>" . $row['fecha_inicio'] . "</td>";
                            echo "<td>" . $row['fecha_fin'] . "</td>";
                            echo "<td>" . $row['presupuesto'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No se encontraron proyectos para este colaborador.</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Selecciona un colaborador para ver los proyectos.</td></tr>";
                }

                mysqli_close($connection);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
