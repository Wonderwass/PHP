<?php
require_once("fonction.php");
session_start(); // à mettre avant le html c'est pour démarer une session
// echo $_COOKIE['id_user'];
if(!isset($_COOKIE['id_user'])){// si il n y a pas de session active 
    header("location: index_2.php");//redirige  vers le formulaire de conexion
}
$listPost = getPost();//recuperer la liste des posts 
// echo"<pre>";
// print_r($listPost);
// echo"<pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/exo_23-08/CSS/style.css">
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include_once "nav.php";?>

    <div class="container">
     <?php foreach($listPost as $post){ ?>
        <div class="post">
            <div class="postimg">
                <img src="imgs/<?= $post['photo'];?>" alt="image">
            </div>
            <p><?=$post['text']; ?></p>
            <span><?= $post['likes'];?>likes</span>
           <a href="traitement_inscription.php?idpost=<?= $post['id__post'];?>">
            <i class="fa-regular fa-thumbs-up"></i></a> 
        </div>
      <?php } ?>
    </div>

</body>
</html>