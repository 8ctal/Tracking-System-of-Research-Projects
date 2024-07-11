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
        <h1>Eventos de Investigación</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Ubicación</th>
                    <th>Descripción</th>
                    <th>Proyecto Asociado</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $query = "SELECT e.evento_id, e.nombre, e.fecha, e.ubicacion, e.descripcion, p.titulo as proyecto 
                          FROM eventos e
                          JOIN proyectos_de_investigacion p ON e.proyecto_id = p.proyecto_id";
                $result = mysqli_query($connection, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['evento_id'] . "</td>";
                        echo "<td>" . $row['nombre'] . "</td>";
                        echo "<td>" . $row['fecha'] . "</td>";
                        echo "<td>" . $row['ubicacion'] . "</td>";
                        echo "<td>" . $row['descripcion'] . "</td>";
                        echo "<td>" . $row['proyecto'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No se encontraron eventos.</td></tr>";
                }

                mysqli_close($connection);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
