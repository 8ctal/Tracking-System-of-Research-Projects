
<?php
@include "../models/conecction.php";

if (isset($_POST['submit'])) {

    $user = mysqli_real_escape_string($connection, $_POST['usuario']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['confirm_password']);
    $user_type = $_POST['tipo_usuario'];

    $select = " SELECT * FROM usuarios WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($connection, $select);

    if (mysqli_num_rows($result) > 0) {

        $error[] = 'user already exist!';
    } else {

        if ($pass != $cpass) {
            $error[] = 'no coinciden las contraseñas!';
        } else {
            $insert = "INSERT INTO usuarios(usuario, email, password, type) VALUES('$user','$email','$pass','$user_type')";
            mysqli_query($connection, $insert);
            header('location: ../pages/login.php');
        }
    }
};
?>