<?php

include_once "bd.inc.php";


function getExps() {
    $resultat = [];

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM objet WHERE typeO='Exp'");
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getBalls() {
    $resultat = [];

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM objet WHERE typeO='Ball'");
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getBaies() {
    $resultat = [];

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM objet WHERE typeO='Baie'");
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getBadges() {
    $resultat = [];

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM objet WHERE typeO='Badge'");
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function ajouterPanier($idU, $nomO, $imageO, $prixO, $quantiteO) {
    $resultat = [];
   
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM panier WHERE nomO=:nomO AND idU=:idU");
        $req->bindValue(':idU', $idU, PDO::PARAM_INT);
        $req->bindValue(':nomO', $nomO, PDO::PARAM_STR);
        $req->execute();

        // Vérifier s'il y a des produits déjà présents dans le panier
        if ($req->rowCount() > 0) {
            $message = 'Objet déjà ajouté au panier !';
        } else {
            // Insérer le produit dans le panier
            $reqInsert = $cnx->prepare("INSERT INTO panier(idU, nomO, imageO, prixO, quantiteO) VALUES(:idU, :nomO, :imageO, :prixO, :quantiteO)");
            $reqInsert->bindValue(':idU', $idU, PDO::PARAM_INT);
            $reqInsert->bindValue(':nomO', $nomO, PDO::PARAM_STR);
            $reqInsert->bindValue(':imageO', $imageO, PDO::PARAM_STR);
            $reqInsert->bindValue(':prixO', $prixO, PDO::PARAM_INT);
            $reqInsert->bindValue(':quantiteO', $quantiteO, PDO::PARAM_INT);

            $reqInsert->execute();

            $message = 'Objet ajouté au panier !';
        }

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getObjetsPanier() {
    $resultat = [];

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM panier");
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function updatePanier($idPanier, $quantiteO){
    $resultat = [];

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("UPDATE panier SET quantiteO=:quantiteO WHERE idPanier=:idPanier");
        $req->bindValue(':idPanier', $idPanier, PDO::PARAM_INT);
        $req->bindValue(':quantiteO', $quantiteO, PDO::PARAM_INT);
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
 
 if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
    header('location:index.php');
 }

function deleteObjet($idPanier, $nomO){
    $resultat = -1;
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("DELETE FROM panier WHERE idPanier=:idPanier and nomO=:nomO");
        $req->bindValue(':idPanier', $idPanier, PDO::PARAM_INT);
        $req->bindValue(':nomO', $nomO, PDO::PARAM_STR);
        
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}