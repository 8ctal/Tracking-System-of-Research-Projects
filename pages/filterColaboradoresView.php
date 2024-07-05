
<?php 
@include "../models/conecction.php";
@include "../includes/header.php";
@include "../includes/sidebar.php";
@include "../includes/footer.php";
?>

    
    <div class="container">
        <h1>Filtrar Colaboradores por Instituciones</h1>
        <form method="POST" action="../models/filterColaboradores.php">
            <label for="institucion">Selecciona una Institución:</label>
            <select id="institucion" name="institucion_id">
                <!-- Aquí se llenarán las opciones con PHP -->
                <?php
/*                 include '../models/conecction.php'; */
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
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                </tr>
            </thead>
            <tbody>
                  <!-- Aquí se llenarán los colaboradores con PHP -->
                  <?php
                if (isset($_POST['institucion_id'])) {
                    $institucion_id = $_POST['institucion_id'];
                    $query = "SELECT documento, nombre, apellido, email, telefono 
                              FROM colaboradores 
                              WHERE institucion_id = $institucion_id";
                    $result = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['documento']}</td>
                                <td>{$row['nombre']}</td>
                                <td>{$row['apellido']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['telefono']}</td>
                              </tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
