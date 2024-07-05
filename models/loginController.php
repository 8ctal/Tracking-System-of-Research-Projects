<?php
@include "../models/conecction.php";

if(isset($_POST['submit'])){

    $user = mysqli_real_escape_string($connection, $_POST['usuario']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $pass = md5($_POST['password']);
 
    $select = " SELECT * FROM usuarios WHERE usuario = '$user' && password = '$pass' ";

    $result = mysqli_query($connection, $select);
 
    if(mysqli_num_rows($result) > 0){
 
       $row = mysqli_fetch_array($result);
 echo $row['type'];
       if($row['type'] == 'student'){
 
          $_SESSION['id'] = $row['id'];
          header('location: ../index.php');
 
       }elseif($row['type'] == 'teacher'){
 
          $_SESSION['id'] = $row['id'];
          header('location: ../index.php');
 
       }
      
    }else{
       $error[] = 'usuario o contraseña incorrectos!';
    }
 
 };
?>