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
            max-width: 1200px;
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
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        button {
            padding: 10px 15px;
            font-size: 16px;
            background-color: #3f5ceb;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #8eb1ed;
        }
        .delete-button {
            background-color: #f44336;
        }
        .delete-button:hover {
            background-color: #e53935;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>ADMINISTRAR PROYECTOS</h1>
        <table>
            <thead>
                <tr>
                    <th>ID Proyecto</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Fin</th>
                    <th>Presupuesto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM proyectos_de_investigacion";
                $result = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['proyecto_id']}</td>
                            <td>{$row['titulo']}</td>
                            <td>{$row['descripcion']}</td>
                            <td>{$row['fecha_inicio']}</td>
                            <td>{$row['fecha_fin']}</td>
                            <td>{$row['presupuesto']}</td>
                            <td><button onclick=\"location.href='http://localhost/DB_project/Tracking-System-of-Researching-Projects/models/editProject.php?id={$row['proyecto_id']}'\">Editar</button>
                            <button class='delete-button' onclick=\"if(confirm('¿Estás seguro de que deseas eliminar este proyecto?')) { location.href='http://localhost/DB_project/Tracking-System-of-Researching-Projects/models/deleteProject.php?id={$row['proyecto_id']}'; }\">Eliminar</button>
                            </td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>