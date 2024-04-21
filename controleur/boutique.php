<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "$racine/modele/bd.inc.php";
include_once "$racine/modele/bd.pokemon.inc.php";
include_once "$racine/modele/authentification.inc.php";
include_once "$racine/modele/bd.utilisateur.inc.php";

$lesExps = getExps();
$lesBalls = getBalls();
$lesBaies = getBaies();
$lesBadges = getBadges();

session_start();
$idU = $_SESSION['idU'];
$mailU = getMailULoggedOn();

if (isLoggedOn()){
    $idPanier = getIdPanierUser($idU);

    if(isset($_POST['ajouter_panier'])){
        $idPanier = $_POST['id_panier'];
        $idO = $_POST['id_produit'];
        $quantiteO = $_POST['quantite_produit'];
    
        ajouterPanier($idPanier, $idO, $quantiteO);
        header('location:?action=boutique');
    }
}




$titre = "Boutique - PokéDaily";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueBoutique.php";
include "$racine/vue/pied.html.php";

?>