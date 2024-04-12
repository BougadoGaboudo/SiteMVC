<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

$titre = "Équipe - PokéDaily";

if(isLoggedOn()){
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueEquipeCo.php";
    include "$racine/vue/pied.html.php";
} else {
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueEquipePasCo.php";
    include "$racine/vue/pied.html.php";
}

?>