<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

$titre = "Mentions - PokéDaily";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueMentions.php";
include "$racine/vue/pied.html.php";

?>