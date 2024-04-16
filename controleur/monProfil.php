<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/authentification.inc.php";
include_once "$racine/modele/bd.utilisateur.inc.php";
include_once "$racine/modele/bd.pokemon.inc.php";

if (isLoggedOn()){
    $mailU = getMailULoggedOn();
    $util = getUtilisateurByMailU($mailU);
    
    $titre = "Mon profil - PokéDaily";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueMonProfil.php";
    include "$racine/vue/pied.html.php";
}
else{
    $titre = "Mon profil - PokéDaily";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/pied.html.php";
}

?>