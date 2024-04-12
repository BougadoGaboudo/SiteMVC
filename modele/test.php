<?php

session_start();
$user_id = $_SESSION['idU'];

if(isset($_POST['ajouter_panier'])){

    $nomO = $_POST['nom_produit'];
    $prixO = $_POST['prix_produit'];
    $imageO = $_POST['image_produit'];
    $quantiteO = $_POST['quantite_produit'];

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

};

// if(isset($_POST['update_cart'])){
//    $update_quantity = $_POST['cart_quantity'];
//    $update_id = $_POST['cart_id'];
//    mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
//    $message[] = 'cart quantity updated successfully!';
// }

// if(isset($_GET['remove'])){
//    $remove_id = $_GET['remove'];
//    mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
//    header('location:index.php');
// }
  
// if(isset($_GET['delete_all'])){
//    mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
//    header('location:index.php');
// }

?>