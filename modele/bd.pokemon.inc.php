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

function getIdPanierUser($idU){

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT idPanier FROM panier WHERE idU = :idU");
        $req->bindValue(':idU', $idU, PDO::PARAM_INT);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function ajouterPanier($idPanier, $idO, $quantiteO) {
    $resultat = [];
   
    try {
        $cnx = connexionPDO();

        // Vérifier si le produit est déjà dans le panier
        $req = $cnx->prepare("SELECT * FROM contenir WHERE idPanier = :idPanier AND idO = :idO");
        $req->bindValue(':idPanier', $idPanier, PDO::PARAM_INT);
        $req->bindValue(':idO', $idO, PDO::PARAM_INT);
        $req->execute();

        if ($req->rowCount() > 0) {
            // Mettre à jour la quantité du produit dans le panier
            $req = $cnx->prepare("UPDATE contenir SET quantiteO = quantiteO + :quantiteO WHERE idPanier = :idPanier AND idO = :idO");
            $req->bindValue(':idPanier', $idPanier, PDO::PARAM_INT);
            $req->bindValue(':idO', $idO, PDO::PARAM_INT);
            $req->bindValue(':quantiteO', $quantiteO, PDO::PARAM_INT);
            $req->execute();
            
            $message = 'Quantité du produit mise à jour dans le panier !';
        } else {
            // Ajouter le produit au panier
            $req = $cnx->prepare("INSERT INTO contenir(idO, idPanier, quantiteO) VALUES(:idO, :idPanier, :quantiteO)");
            $req->bindValue(':idO', $idO, PDO::PARAM_INT);
            $req->bindValue(':idPanier', $idPanier, PDO::PARAM_INT);
            $req->bindValue(':quantiteO', $quantiteO, PDO::PARAM_INT);
            $req->execute();
            
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

function getObjetsPanier($idPanier) {
    $resultat = [];

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT o.nomO, o.prixO, o.imageO, c.quantiteO, c.idPanier, c.idO FROM contenir c JOIN objet o ON c.idO = o.idO WHERE c.idPanier = :idPanier");
        $req->bindValue(':idPanier', $idPanier, PDO::PARAM_INT);
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
        $req = $cnx->prepare("UPDATE contenir SET quantiteO=:quantiteO WHERE idPanier=:idPanier");
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

function deleteObjet($idPanier, $idO){
    $resultat = -1;
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("DELETE FROM contenir WHERE idPanier=:idPanier and idO=:idO");
        $req->bindValue(':idPanier', $idPanier, PDO::PARAM_INT);
        $req->bindValue(':idO', $idO, PDO::PARAM_INT);
        $resultat = $req->execute();

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}