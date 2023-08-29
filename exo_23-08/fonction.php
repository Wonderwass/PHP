<?php
require_once "data_base.php";
function getPost(){
    $lesPosts = null;
    $dbconnect = dbConexion();//conexion a la bd
    //preparationde la requete
    // $request = $dbconnect->prepare("SELECT  id__post, likes,
    // membre_id, text, photo FROM posts WHERE membre_id IN(SELECT * FROM membres)");
    $request = $dbconnect->prepare("SELECT id__post, likes, membre_id, text, photo, id_membre, pseudo FROM posts, membres WHERE posts.membre_id = membres.id_membre");

    //execution de la requete
    try{//essaye
        $request->execute();
        //transformer le resultat de la arequete en tableau
        $lesPosts = $request->fetchAll();
    }catch(PDOException $erreur){
        echo $erreur->getMessage();
    }
    return $lesPosts;//retourne la liste des posts+

}