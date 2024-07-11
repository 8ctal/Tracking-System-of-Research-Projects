<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Vendor CSS Files -->

    <link href="http://localhost/DB_project/Tracking-System-of-Researching-Projects/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost/DB_project/Tracking-System-of-Researching-Projects/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="http://localhost/DB_project/Tracking-System-of-Researching-Projects/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="http://localhost/DB_project/Tracking-System-of-Researching-Projects/assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- LOGIN CSS -->
    <link href="http://localhost/DB_project/Tracking-System-of-Researching-Projects/assets/css/login.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">

    <!-- <link rel="stylesheet" href="css/all.min.css"> -->
    <!-- <link rel="stylesheet" href="css/fontawesome.min.css"> -->
    <link href="http://localhost/DB_project/Tracking-System-of-Researching-Projects/assets/img/LogoHDSP.png" rel="shortcut icon">
    <title>Registro</title>
</head>

<body>
    <img class="wave" src="http://localhost/DB_project/Tracking-System-of-Researching-Projects/assets/img/wave.png">
    <div class="container">
        <div class="img">
            <img src="http://localhost/DB_project/Tracking-System-of-Researching-Projects/assets/img/bg.svg">
        </div>
        <div class="login-content">
            <form method="post" action="">
                <img src="http://localhost/DB_project/Tracking-System-of-Researching-Projects/assets/img/LogoHDSP.png">
                <h2 class="title">BIENVENIDO</h2>
                <?php
                @include "../models/registerController.php";
                
                if(isset($error)){
                   foreach($error as $error){
                      echo '<span class="error-msg">'.$error.'</span>';
                   };
            
                }
                ?>
                 <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Documento</h5>
                        <input id="documento" type="text" class="input" name="documento">
                    </div>
                </div>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Usuario</h5>
                        <input id="usuario" type="text" class="input" name="usuario">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="div">
                        <h5>Email</h5>
                        <input type="email" id="email" class="input" name="email">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Contraseña</h5>
                        <input type="password" id="password" class="input" name="password">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Confirmar Contraseña</h5>
                        <input type="password" id="confirm_password" class="input" name="confirm_password">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Tipo de usuario</h5>
                        <select id="tipo_usuario" name="tipo_usuario" class="input">
                            <option value="estudiante">Estudiante</option>
                            <option value="profesor">Profesor</option>
                            <option value="director">Director</option>
                        </select>
                    </div>
                </div>
                <div class="view">
                    <div class="fas fa-eye verPassword" onclick="vista()" id="verPassword"></div>
                </div>

                <div class="text-center">
                    <a class="font-italic isai5" href="">Olvidé mi contraseña</a>
                    <a class="font-italic isai5" href="http://localhost/DB_project/Tracking-System-of-Researching-Projects/pages/login.php">Ya tengo cuenta, ingresar</a>
                </div>
                <input type="submit" class="btn" name="submit" value="REGISTRARME">
            </form>
        </div>
    </div>
    <script src="http://localhost/DB_project/Tracking-System-of-Researching-Projects/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="http://localhost/DB_project/Tracking-System-of-Researching-Projects/assets/js/main.js"></script>
    <script src="http://localhost/DB_project/Tracking-System-of-Researching-Projects/assets/vendor/bootstrap/js/bootstrap.js"></script>
    <script src="http://localhost/DB_project/Tracking-System-of-Researching-Projects/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>

</body>

</html>