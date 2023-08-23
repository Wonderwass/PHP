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
    $connexionRequest = $connect->prepare("SELECT * FROM membres WHERE pseudo= ?"); // selectionne toute les ellément de la base de données dans la tables membres  dont le pseudo correspondant
    //executer la requete
    $connexionRequest->execute(array($pseudo));
    //on recuperre le resultat de la requete
    $utilisateur = $connexionRequest->fetch(PDO::FETCH_ASSOC); //convertir le resultat de la requete en tableau ppour pouvoir le manipuler facilment
    echo "<pre>";
    print_r($utilisateur);
    echo "<pre>";
    if (empty($utilisateur)) {
        echo " Utilisateur inconnu...";
    } else { //sinon 
        //on verifie le mot de passe 
        if (password_verify($mdp, $utilisateur['mdp'])) {
            // echo "connexion reussie";
            //creation de variable de session
            $_SESSION["id"]=$utilisateur["id_membre"];
            $_SESSION["pseudo"] = $utilisateur["pseudo"];
            $_SESSION["img"] = $utilisateur["profil_img"];
            
        } else {
            echo "mot de passe incorrect";
            header('refresh: 2; http://localhost:3000/index_2.php');//renvoi sur  la page de connexion apres 2 secondes.
        }

    }
}