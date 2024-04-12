<?php

function controleurPrincipal($action){
    $lesActions = array();
    $lesActions["defaut"] = "accueil.php";
    $lesActions["starter"] = "starter.php";
    $lesActions["mentions"] = "mentions.php";
    $lesActions["equipe"] = "equipe.php";
    $lesActions["calendrier"] = "calendrier.php";
    $lesActions["boutique"] = "boutique.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["deconnexion"] = "deconnexion.php";
    $lesActions["inscription"] = "inscription.php";
    $lesActions["panier"] = "panier.php";
    $lesActions["profil"] = "monProfil.php";



   
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }

}

?>