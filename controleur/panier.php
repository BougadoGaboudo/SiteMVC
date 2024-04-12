<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "$racine/modele/bd.inc.php";
include_once "$racine/modele/bd.pokemon.inc.php";

$resultat = getObjetsPanier();

$titre = "Panier - PokéDaily";
include "$racine/vue/entete.html.php";
include "$racine/vue/vuePanier.php";
include "$racine/vue/pied.html.php";

?>