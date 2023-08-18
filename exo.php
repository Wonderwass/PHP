<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    //exo1
    $chaine="La maison bleu";
    $mot= substr($chaine,10);
    echo $mot."<br>";
     //exo2
     $avis="Ce film était vraiment mauvais.";
     $nouveauMot=str_replace("mauvais","exelent",$avis);
     echo $nouveauMot. "<br>";
     //exo3
     $texte="bienvenue dans notre site Web!";
     $majuscule=ucfirst($texte);
     echo $majuscule."<br>";
     //exo5  Vous avez des informations sur un produit : nom, prix et quantité.
     // Calculez le prix total pour le produit et affichez-le.
     $nomProduit = "Ordinateur portable";
     $prixUnitaire = 899.99;
     $quantite = 3;
     $prixTotal= $prixUnitaire*$quantite;
     echo $prixTotal."<br>";
     //exo6 Vous avez un panier d'achats avec plusieurs articles et vous souhaitez calculer le prix total avec une remise.
     $article1 = "Livre";
     $prixArticle1 = 12.99;
     $quantiteArticle1 = 2;
     
     $article2 = "DVD";
     $prixArticle2 = 9.99;
     $quantiteArticle2 = 3;
     
     $article3 = "Casque audio";
     $prixArticle3 = 49.99;
     $quantiteArticle3 = 1;
     
     // Calcul du prix total avant remise et affichage
     $prixTotaL= $prixArticle1*$quantiteArticle1+$prixArticle2*$quantiteArticle2+$prixArticle3*$quantiteArticle3;
     echo $prixTotaL ."<br>";
     // Calcul de la remise (10 % du prix total avant remise) et affichage
     $remise=$prixTotaL*10/100;
     echo $remise."<br>";
     // Calcul du prix total après remise et affichage
     $totalRemise= $prixTotaL-$remise;
     echo $totalRemise;
     
     // Exo 7:
     // Vous avez un montant en euros que vous souhaitez convertir en dollars américains.
     // Calculez le montant en dollars puis affichez le
     $montantEuros = 100;
     $tauxChange = 1.18;
     $montantDollars=$montantEuros*$tauxChange;
     echo $montantDollars;
     //Exo8
     # soit la variable age suivante
     $age = 17;
     
     #ecrire le code qui permet de verifier si age est superieur a 18
     # si age est superieur ou egale a 18 afficher => majeur
     if($age>=18){
         echo "<h1>Majeur</h1>"."<br>";
         
        }
        # si age est inferieur a 18 afficher => mineur
     else if($age<18){
         echo "<h1>mineur</h1>"."<br>";
     }
     //EXO9
     // une annee bissextile est une annee divisible par 4 et pas par 100 ou divisible par 400
     // ecrire un programme qui permet de verifier si une annee est bisextile ou pas
     // si elle l'est affiche annee bissextile
     $année=2024;
     if(($année%4 ==0 && $année%100 !=0) OR ($année%400==0)){
         echo "l'année est bissextile"."<br>";

     }
     // si non affiche annee pas bissextile
     else {
         echo "l'année est pas bisextile"."<br>";
     }
     //EXO10
     #soit la variable nombre
     $nombre=50;
     #ecrire un programme qui permet de tester si elle est paire ou impaire
     #si elle est paire afficher => le nombre est paire
     #si non afficher => le npombre est impaire
     if($nombre %2==0){
         echo "c'est un nombre paire";
    
     }
     else{
         echo "c'est pas paire";
     }

    ?>
    
</body>
</html>