
<?php
@include "../models/conecction.php";

if (isset($_POST['submit'])) {

    $user = mysqli_real_escape_string($connection, $_POST['usuario']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['confirm_password']);
    $user_type = $_POST['tipo_usuario'];
    $documento = mysqli_real_escape_string($connection, $_POST['documento']);

    // Verificar si el documento existe en la tabla de colaboradores
    $query = "SELECT * FROM colaboradores WHERE documento = '$documento'";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        $validation = true;
    }
    $select = " SELECT * FROM usuarios WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($connection, $select);

    if (mysqli_num_rows($result) > 0) {
        $error[] = 'usario existente!';
    } else {

        if ($pass != $cpass) {
            $error[] = 'no coinciden las contraseñas!';
        } else if (!$validation) {
            $error[] = 'El documento no existe en la base de datos de colaboradores';
        } else {
            $insert = "INSERT INTO usuarios (documento, usuario, email, password, type) 
                  VALUES ('$documento', '$user', '$email', '$pass', '$user_type')";
            mysqli_query($connection, $insert);
            header('location: ../pages/login.php');
        }
    }
};
?>