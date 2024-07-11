<?php
include '../models/conecction.php';

if (isset($_GET['id'])) {
    $proyecto_id = $_GET['id'];
    $query = "SELECT * FROM proyectos_de_investigacion WHERE proyecto_id = $proyecto_id";
    $result = mysqli_query($connection, $query);
    $project = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $proyecto_id = $_POST['proyecto_id'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
    $presupuesto = $_POST['presupuesto'];

    $query = "UPDATE proyectos_de_investigacion 
              SET titulo = '$titulo', descripcion = '$descripcion', fecha_inicio = '$fecha_inicio', fecha_fin = '$fecha_fin', presupuesto = $presupuesto 
              WHERE proyecto_id = $proyecto_id";
    mysqli_query($connection, $query);

    header('Location: ../pages/editarProyectos.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Proyecto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
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
        input, textarea {
            padding: 10px;
            margin-top: 5px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            padding: 10px 15px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 20px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Proyecto</h1>
        <form method="POST" action="editProject.php">
            <input type="hidden" name="proyecto_id" value="<?php echo $project['proyecto_id']; ?>">
            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="titulo" value="<?php echo $project['titulo']; ?>" required>

            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" rows="5" required><?php echo $project['descripcion']; ?></textarea>

            <label for="fecha_inicio">Fecha de Inicio</label>
            <input type="date" id="fecha_inicio" name="fecha_inicio" value="<?php echo $project['fecha_inicio']; ?>" required>

            <label for="fecha_fin">Fecha de Fin</label>
            <input type="date" id="fecha_fin" name="fecha_fin" value="<?php echo $project['fecha_fin']; ?>" required>

            <label for="presupuesto">Presupuesto</label>
            <input type="number" id="presupuesto" name="presupuesto" value="<?php echo $project['presupuesto']; ?>" step="0.01" required>

            <button type="submit">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>
