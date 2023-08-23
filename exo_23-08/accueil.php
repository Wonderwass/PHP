<?php
session_start(); // à mettre avant le html c'est pour démarer une session
if(isset($_SESSION["id"])){// si il n y a pas de session active 
    header("location:index_2.php");//redirige  vers le formulaire de conexion
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include_once "nav.php";?>
</body>
</html>