<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "$racine/modele/bd.inc.php";
include_once "$racine/modele/bd.pokemon.inc.php";

$lesExps = getExps();
$lesBalls = getBalls();
$lesBaies = getBaies();
$lesBadges = getBadges();

session_start();
$idU = isset($_SESSION['idU']) ? $_SESSION['idU'] : null;

if(isset($_POST['ajouter_panier'])){

$nomO = $_POST['nom_produit'];
$prixO = $_POST['prix_produit'];
$imageO = $_POST['image_produit'];
$quantiteO = $_POST['quantite_produit'];

$resultat = ajouterPanier($idU, $nomO, $imageO, $prixO, $quantiteO);
}


$titre = "Boutique - PokéDaily";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueBoutique.php";
include "$racine/vue/pied.html.php";

?>