<main>
    <section class="flex">
        <h1 class="h1-panier">Votre panier</h1>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Image</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Prix total</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($resultat); $i++) { ?>
                    <tr>
                        <td><?= $resultat[$i]['nomO'] ?></td>
                        <td><img src="img/<?= $resultat[$i]['imageO'] ?>" alt="<?= $resultat[$i]['nomO'] ?>"></td>
                        <td><?= $resultat[$i]['prixO'] ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id_panier" value="<?= $resultat[$i]['idPanier']; ?>">                             
                                <input type="number" min="1" name="quantite_panier" value="<?= $resultat[$i]['quantiteO'] ?>">
                                <?= $resultat[$i]['quantiteO'] ?>
                                <input type="submit" value="Modifier" name="update_quantite" class="btn">
                            </form>
                        </td>
                        <td><?= $resultat[$i]['prixO']*$resultat[$i]['quantiteO'] ?></td>
                        <td>
                            <form action="" method="post">    
                                <input type="hidden" name="id_panier" value="<?= $resultat[$i]['idPanier']; ?>">
                                <input type="hidden" name="id_produit" value="<?= $resultat[$i]['idO']; ?>">                     
                                <button type="submit" name="delete">X</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</main>
