<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <?php include_once "nav.php"; ?>
    <form action="traitement_inscription.php" method="POST">
        <?php if(isset($_SESSION['error'])){?>
        <p><?=$_SESSION['error'];?></p>
        <?php } ?>
    <div class="conexion">
        <label for="email"></label>
        <input type="pseudo" id="pseudo" name="pseudo" required placeholder="Votre pseudo"><br><br>

        <label for="motDePasse"></label>
        <input type="password" id="mdp" name="mdp" required placeholder="Mot de passe"><br><br>

        <input type="submit" value="connexion" id="conexion" name="connexion">
</div>
</div>
</form>
</body>
</html>