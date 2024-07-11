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
            flex-direction: column;
        }
        label {
            margin-top: 10px;
        }
        input[type="text"], input[type="tel"] {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <?php
    if (isset($_GET['id'])) {
        $institucion_id = $_GET['id'];
        $query = "SELECT * FROM instituciones WHERE institucion_id = $institucion_id";
        $result = mysqli_query($connection, $query);
    
        if ($result) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "Error al recuperar la información de la institución: " . mysqli_error($connection);
            exit;
        }
    } else {
        echo "ID de la institución no proporcionado.";
        exit;
    }
    ?>
    <div class="container">
        <h1>Editar Institución</h1>
    
        <form method="POST" action="http://localhost/DB_project/Tracking-System-of-Researching-Projects/models/editInstitutions.php">
            <input type="hidden" name="institucion_id" value="<?php echo $row['institucion_id']; ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>" required>
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" value="<?php echo $row['direccion']; ?>" required>
            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" value="<?php echo $row['telefono']; ?>" required>
            <button type="submit">Actualizar Institución</button>
        </form>
    </div>
</body>
</html>
