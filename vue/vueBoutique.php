<main class="bg">

<section>
    <div class="center">
        <div class="width">
            <div class="filter-buttons">
                <button data-filter="*" class="filter-select active-filter" type="button">Tout</button>
                <button data-filter="exp" class="filter-select" type="button">Exp</button>
                <button data-filter="ball" class="filter-select" type="button">Ball</button>
                <button data-filter="baie" class="filter-select" type="button">Baie</button>
                <button data-filter="badge" class="filter-select" type="button">Badge</button>
            </div>
            <div class="boutique">
                <div class="items-container">

                    <?php for ($i = 0; $i < count($lesExps); $i++) { ?>
                        <form action="" method="post">
                        <div data-filter="exp" class="item">
                            <div class="select-img"><img src="img/<?= $lesExps[$i]['imageO'] ?>" alt=""></div>
                            <div class="nom"><?= $lesExps[$i]['nomO'] ?></div>
                            <div class="prix"><h4>₽ <?= $lesExps[$i]['prixO']; ?></h4></div>
                            <input class="article-input" type="number" min="1" name="quantite_produit" value="1">
                            <input type="hidden" name="id_panier" value="<?= $idPanier['idPanier']; ?>">
                            <input type="hidden" name="id_produit" value="<?= $lesExps[$i]['idO']; ?>">
                            <input type="submit" value="Ajouter au panier" name="ajouter_panier" class="btn">
                        </div>
                        </form>
                    <?php } ?>

                    <?php for ($i = 0; $i < count($lesBalls); $i++) { ?>
                        <form action="" method="post">
                        <div data-filter="ball" class="item">
                            <div class="select-img"><img src="img/<?= $lesBalls[$i]['imageO'] ?>" alt=""></div>
                            <div class="nom"><?= $lesBalls[$i]['nomO'] ?></div>
                            <div class="prix"><h4>₽ <?= $lesBalls[$i]['prixO']; ?></h4></div>
                            <input class="article-input" type="number" min="1" name="quantite_produit" value="1">
                            <input type="hidden" name="id_panier" value="<?= $idPanier['idPanier']; ?>">
                            <input type="hidden" name="id_produit" value="<?= $lesBalls[$i]['idO']; ?>">
                            <input type="submit" value="Ajouter au panier" name="ajouter_panier" class="btn">
                        </div>
                        </form>  
                    <?php } ?>

                    <?php for ($i = 0; $i < count($lesBaies); $i++) { ?>
                        <form action="" method="post">
                        <div data-filter="baie" class="item">
                            <div class="select-img"><img src="img/<?= $lesBaies[$i]['imageO'] ?>" alt=""></div>
                            <div class="nom"><?= $lesBaies[$i]['nomO'] ?></div>
                            <div class="prix"><h4>₽ <?= $lesBaies[$i]['prixO']; ?></h4></div>
                            <input class="article-input" type="number" min="1" name="quantite_produit" value="1">
                            <input type="hidden" name="id_panier" value="<?= $idPanier['idPanier']; ?>">
                            <input type="hidden" name="id_produit" value="<?= $lesBaies[$i]['idO']; ?>">
                            <input type="submit" value="Ajouter au panier" name="ajouter_panier" class="btn">
                        </div>
                        </form>
                    <?php } ?>

                    <?php for ($i = 0; $i < count($lesBadges); $i++) { ?>
                        <form action="" method="post">
                        <div data-filter="badge" class="item">
                            <div class="select-img"><img src="img/<?= $lesBadges[$i]['imageO'] ?>" alt=""></div>
                            <div class="nom"><?= $lesBadges[$i]['nomO'] ?></div>
                            <div class="prix"><h4>₽ <?= $lesBadges[$i]['prixO']; ?></h4></div>
                            <input class="article-input" type="number" min="1" name="quantite_produit" value="1">
                            <input type="hidden" name="id_panier" value="<?= $idPanier['idPanier']; ?>">
                            <input type="hidden" name="id_produit" value="<?= $lesBadges[$i]['idO']; ?>">
                            <input type="submit" value="Ajouter au panier" name="ajouter_panier" class="btn">
                        </div>
                        </form>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</section>

</main>

<script src="filter.js"></script>
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>