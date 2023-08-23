<?php
function dbConexion()
{
    $conexionDb = null; //variable qui doit stocker notre instance de conexion a la base de données 
    try { //try (essayer) de se connecter à la base de donnnées 
        $conexionDb = new PDO("mysql:host=localhost;dbname=cours_db", "root", "");
        //on récupere l'objet de conexion à la base de données dans la variable $conexionDb

    } catch (PDOException $erreur) { //si ces faux il relever une erreur 
        $conexionDb = $erreur; // on recupere l'erreur dans $conexionDb
    }
    return $conexionDb; // retour de l'objet de conexion ou une erreur 
}