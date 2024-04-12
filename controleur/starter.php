<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

$titre = "Starter - PokéDaily";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueStarter.php";
include "$racine/vue/pied.html.php";

?>