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
            width: 45%;
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
        <h1>Filtrar Publicaciones por Tipo e Institución</h1>
        <form action="" method="GET">
            <select name="tipo">
                <option value="">Selecciona un Tipo</option>
                <?php

                $query = "SELECT DISTINCT tipo FROM publicaciones";
                $result = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    $selected = (isset($_GET['tipo']) && $_GET['tipo'] == $row['tipo']) ? 'selected' : '';
                    echo "<option value='" . $row['tipo'] . "' $selected>" . $row['tipo'] . "</option>";
                }
                ?>
            </select>
            <select name="institucion_id">
                <option value="">Selecciona una Institución</option>
                <?php
                $query = "SELECT institucion_id, nombre FROM instituciones";
                $result = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    $selected = (isset($_GET['institucion_id']) && $_GET['institucion_id'] == $row['institucion_id']) ? 'selected' : '';
                    echo "<option value='" . $row['institucion_id'] . "' $selected>" . $row['nombre'] . "</option>";
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
                    <th>Fecha de Publicación</th>
                    <th>Tipo</th>
                    <th>Proyecto ID</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['tipo']) && !empty($_GET['tipo']) && isset($_GET['institucion_id']) && !empty($_GET['institucion_id'])) {
                    $tipo = $_GET['tipo'];
                    $institucion_id = $_GET['institucion_id'];

                    $query = "SELECT p.publicacion_id, p.titulo, p.fecha_publicacion, p.tipo, p.proyecto_id 
                              FROM publicaciones p
                              JOIN proyectos_de_investigacion pi ON p.proyecto_id = pi.proyecto_id
                              JOIN colaboradores c ON c.institucion_id = $institucion_id
                              JOIN proyecto_colaboradores pc ON pc.proyecto_id = pi.proyecto_id AND pc.colaborador_documento = c.documento
                              WHERE p.tipo = '$tipo'";
                    $result = mysqli_query($connection, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['publicacion_id'] . "</td>";
                            echo "<td>" . $row['titulo'] . "</td>";
                            echo "<td>" . $row['fecha_publicacion'] . "</td>";
                            echo "<td>" . $row['tipo'] . "</td>";
                            echo "<td>" . $row['proyecto_id'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No se encontraron publicaciones para este tipo e institución.</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Selecciona un tipo y una institución para ver las publicaciones.</td></tr>";
                }

                mysqli_close($connection);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
