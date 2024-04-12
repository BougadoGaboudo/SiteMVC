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
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($resultat); $i++) { ?>
                    <tr>
                        <td><?= $resultat[$i]['nomO'] ?></td>
                        <td><img src="img/<?= $resultat[$i]['imageO'] ?>" alt="<?= $resultat[$i]['nomO'] ?>"></td>
                        <td><?= $resultat[$i]['prixO'] ?></td>
                        <td><?= $resultat[$i]['quantiteO'] ?></td>
                        <td><?= $resultat[$i]['prixO']*$resultat[$i]['quantiteO'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</main>
