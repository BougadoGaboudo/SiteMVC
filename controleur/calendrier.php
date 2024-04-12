<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

$titre = "Boutique - Pokémon";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueCalendrier.php";
include "$racine/vue/pied.html.php";

?>