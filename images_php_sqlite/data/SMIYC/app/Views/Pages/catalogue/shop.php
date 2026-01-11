<?php

use App\Models\Produit\ProduitModel;

// Liste de produits (à génerer  aprés avec la base de donné )
$produits = new ProduitModel();
$liste_produits = $produits->getDisponibles();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/common.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/index.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/shop.css">

    <script type="text/javascript" src="<?php echo base_url(); ?>js/reloadPage.js" defer></script>

</head>

<body>
    <?= view('Pages/partials/header', ['showCart' => true, 'showList' => true]) ?>

    <div class="container">
        <!-- Colonne gauche : texte / filtre -->
        <div class="left">
            <h2>Catégories</h2>
            <h3><strong>Marques</strong></h3>
            <p>Serge Lutens</p>
            <p>Guerlain</p>
            <p>Dior</p>
            <p>Armani</p>
            <a href="#">Voir plus de marques</a>

            <h4>Prix</h4>
            <input type="range" min="0" max="500" step="5">
        </div>

        <!-- Colonne droite : grille de produits -->
        <div class="right">
            <h2>Parfums Hommes</h2>
            <div class="grid">
                <?php foreach ($liste_produits as $p): ?>
                    <div class="product-card">
                        <!-- clickable area: image + info -->
                        <a href="<?= base_url(relativePath: 'catalogue/product/' . $p->getId()) ?>" class="card">

                            <img src="#" alt="<?= esc($p->getNom()) ?>">
                            <div class="card-bottom">
                                <div class="info">
                                    <span><?= esc($p->getNom()) ?></span>
                                    <strong><?= number_format($p->getPrix(), 2) ?> €</strong>
                                </div>
                            </div>
                        </a>

                        <!-- Use POST form to call Cart::addProduit via route panier/ajouter/{id} -->
                        <form method="post" action="<?= base_url('panier/ajouter/' . $p->getId()) ?>" class="add-to-cart-form">
                            <?= csrf_field() ?>
                            <button type="submit" class="add-to-cart-btn" title="Ajouter au panier">+</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?= view('Pages/partials/footer') ?>

</body>

</html>