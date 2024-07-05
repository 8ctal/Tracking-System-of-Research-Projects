<?php
session_start();
session_destroy();
header('Location: http://localhost/DB_project/Tracking-System-of-Researching-Projects/pages/login.php');
?>