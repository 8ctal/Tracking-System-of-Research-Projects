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
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        input[type="date"],
        textarea {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        textarea {
            resize: vertical;
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Agregar proyecto</h1>
        <form action="http://localhost/DB_project/Tracking-System-of-Researching-Projects/models/insertProject.php" method="POST">
            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="titulo" required>

            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" rows="5" required></textarea>

            <label for="fecha_inicio">Fecha de Inicio</label>
            <input type="date" id="fecha_inicio" name="fecha_inicio" required>

            <label for="fecha_fin">Fecha de Fin</label>
            <input type="date" id="fecha_fin" name="fecha_fin" required>

            <label for="presupuesto">Presupuesto</label>
            <input type="number" id="presupuesto" name="presupuesto" step="0.01" required>

            <button type="submit">Agregar Proyecto</button>
        </form>
    </div>
</body>
</html>
