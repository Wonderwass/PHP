<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php //echo "<h1>WonderWASS</h1>";
   //concatenation
   $nom="Heng";
   $prenom="Mich";
   $nomComplet=$prenom." ".$nom;
   echo"<p> Bonjour, je suis ".$prenom." ".$nom."</p>";
   // Extraction sous-chaine 
   $phrase="La programmation est amusante";
   $mot=  substr($phrase, 3, 13);
   echo $mot."<br>";
   //Recherche de texte
   $texte="Bonjour tout le monde";
   $position= strpos($texte,"tout");
   echo $position."<br>";
   //Remplacement de texte
   $texte ="les chats sont adorables";
   $nouveauTexte=str_replace("chats","chiens",$texte);
   echo $nouveauTexte."<br>";
   //Metrre majuscule et minuscule
   $texte="Hello World";
   $minuscules= strtolower($texte);
   echo $minuscules."<br>";
   $majuscules=strtoupper($texte);
   echo $majuscules."<br>";
   //Suppression des espaces debut et fin
   $texte="     Bonjour    ";
   $texteSansEspaces= trim($texte);//Resultat :"Bonjour"
   //CONVERSION EN TABLEAU
   $liste="pomme,orange,banane";
   $tableau=explode("e",$liste);//Résultat:["pomm", ",orang", ",banan"]
   //AFFICHAGE TABLEAU
   print_r($tableau);
   ?>
</body>
</html>