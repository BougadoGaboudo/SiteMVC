<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "$racine/modele/bd.inc.php";
include_once "$racine/modele/bd.pokemon.inc.php";

$resultat = getObjetsPanier();

$prixTotal = 0;

if(isset($_POST['update_quantite'])){
    $idPanier = $_POST['id_panier'];
    $quantiteO = $_POST['quantite_panier'];

    updatePanier($idPanier, $quantiteO);
    $msg = 'Quantité mise à jour';
    header('location:?action=panier');
}

if(isset($_POST['delete'])){
    $idPanier = $_POST['id_panier'];
    $nomO = $_POST['nomO'];

    deleteObjet($idPanier, $nomO);
    $msg = 'Objet retiré du panier';
    header('location:?action=panier');
}

$titre = "Panier - PokéDaily";
include "$racine/vue/entete.html.php";
include "$racine/vue/vuePanier.php";
include "$racine/vue/pied.html.php";

?>