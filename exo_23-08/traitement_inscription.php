<?php
session_start();
require_once "data_base.php";

if (isset($_POST["inscription"])) {
    $email = $_POST["email"];
    $pseudo = $_POST["pseudo"];
    $mdp = $_POST["motDePasse"];
    $cmdp = $_POST["confirmerMotDePasse"];
    // crypter le mdp
    $mdpcript = password_hash($mdp, PASSWORD_DEFAULT);
    //recuperer l'image
    $imgName = $_FILES["fichier"]["name"];
    $tmpName = $_FILES["fichier"]["tmp_name"];
    // destination de l'image
    $destination = $_SERVER["DOCUMENT_ROOT"] . '/imgs/' . $imgName;
    //enregistrement de l'mage dans ça destination
    move_uploaded_file($tmpName, $destination);

    // etablir la connexion avec la base de données 
    $dbConexion = dbConexion();
    // preparer la requete 
    $request = $dbConexion->prepare("INSERT INTO membres (email, pseudo, mdp, profil_img) VALUES (?, ?, ?, ?)");
    //execution de requete
    try {
        $request->execute(array($email, $pseudo, $mdpcript, $imgName));

    } catch (PDOException $e) {
        $e->getMessage();
    }


}
// pour la connexion
if (isset($_POST['connexion'])) {
    $pseudo = $_POST["pseudo"];
    $mdp = $_POST['mdp'];
    //pour etablir la conexion avce la base de sonnées
    $connect = dbConexion();
    //préapere la requete
    $connexionRequest = $connect->prepare("SELECT * FROM membres WHERE pseudo = ?"); // selectionne toute les ellément de la base de données dans la tables membres  dont le pseudo correspondant
    //executer la requete
    $connexionRequest->execute(array($pseudo));
    //on recuperre le resultat de la requete
    $utilisateur = $connexionRequest->fetch(PDO::FETCH_ASSOC); //convertir le resultat de la requete en tableau ppour pouvoir le manipuler facilment
    // echo "<pre>";
    // print_r($utilisateur);
    // echo "<pre>";
    if (empty($utilisateur)) {
        //echo " Utilisateur inconnu...";
        $_SESSION['error'] = " Utilisateur inconnu...";//ajouter le message derreur dans le tableau 
        header("Location: index_2.php");//rediriger vers conexion.php
    } else { //sinon 
        //on verifie le mot de passe 
        if (password_verify($mdp, $utilisateur['mdp'])) {
            // echo "connexion reussie";
            //lz variable $session est un tableau
            //toutes superglobal en php est un tableau
            //creation de variable de session
            $_SESSION["id"] = $utilisateur["id_membre"];
            $_SESSION["pseudo"] = $utilisateur["pseudo"];
            $_SESSION["img"] = $utilisateur["profil_img"];
            //creation du cookie qui va stocker l'identifiant de l'utilisateur pour permettre une meilleure experience
            //c'est a dire on va la conneceter automatiquement apres verifiaction du cookie
            setcookie("id_user", $utilisateur['id_membre'], time()+3600, '/','localhost', false, true);

            header("Location: accueil.php");
            
        } else {
            echo "mot de passe incorrect";
            // header('refresh: 2; http://localhost:3000/index_2.php');//renvoi sur  la page de connexion apres 2 secondes.
        }

    }
}
if(isset($_POST['publier'])){
    $message = htmlspecialchars($_POST['message']);

    $image_name = $_FILES['img']['name'];
    $tmp = $_FILES['img']['tmp_name'];
    $destination=$_SERVER['DOCUMENT_ROOT']. '/php/exo_23-08/imgs/' . $image_name;
    
    move_uploaded_file($tmp, $destination);
    //conexion a la bd
    $dbconnect = dbConexion();
    //preparation a la requete 
    $request = $dbconnect->prepare("INSERT INTO posts (membre_id, photo, text) VALUES(?,?,?)");
    try{
        $request->execute(array($_SESSION["id"], $image_name, $message));
        header("Location: accueil.php");

    }catch (PDOException $e){
        echo $e->getMessage();
    }

}
if(isset($_GET['idpost'])){
    $dbconnect = dbConexion();//connexion a la bd
    //prepare la requete 
    $request = $dbconnect->prepare("SELECT likes FROM posts WHERE id__post=?");
    //executer la requete 
    $request->execute(array($_GET['idpost']));
    //on recupere le resultat 
    $likes = $request->fetch(); //convertir tableau
    // echo $likes['likes'];
    //requete pour modifier le nombre de like 
    $request1 = $dbconnect->prepare("UPDATE posts SET likes=? WHERE id__post=?");
    //executer la requete
    $request1->execute(array($likes['likes'] + 1, $_GET['idpost']));
    header("Location: accueil.php");

}