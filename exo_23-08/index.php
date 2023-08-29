<!DOCTYPE html>
<html lang="fr
">

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
    <?php include_once "nav.php";?>
    <h1> Page d'inscription</h1>
    <div class="container">
    <form action="traitement_inscription.php" method="post" enctype="multipart/form-data">

        <label for=""></label>

        <label for="nom"></label>
        <input type="text" id="nom" name="pseudo" required placeholder="Votre pseudo"><br><br>

        <label for="email"></label>
        <input type="email" id="email" name="email" required placeholder="Votre email"><br><br>

        <label for="motDePasse"></label>
        <input type="password" id="motDePasse" name="motDePasse" required placeholder="Mot de passe"><br><br>

        <label for="confirmerMotDePasse"></label>
        <input type="password" id="confirmerMotDePasse" name="confirmerMotDePasse" required placeholder="Confirmer le mot de passe"><br><br>

         <label for="fichier"></label>
        <input type="file" id="fichier" name="fichier" required placeholder="Choisir un fichier"><br><br>

        <input type="submit" value="Inscription" id="inscription" name="inscription">
    </form>
</div>


</form>
</body>

</html>