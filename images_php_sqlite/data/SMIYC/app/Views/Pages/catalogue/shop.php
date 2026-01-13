<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/common.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/index.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/shop.css">

    <script type="text/javascript" src="<?php echo base_url(); ?>js/shop_filter.js" defer></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/reloadPage.js" defer></script>

</head>

<body>
    <?= view('Pages/partials/header', ['showCart' => true, 'showList' => true]) ?>

    <div class="container">
        <!-- Colonne gauche : texte / filtre -->
        <div class="left">
            <h2>Catégories</h2>
            <h3><strong>Marques</strong></h3>
            <a href="<?= base_url("catalogue/marque#") ?>">
                <p>Serge Lutens</p>
            </a>
            <a href="<?= base_url("catalogue/marque#") ?>">
                <p>Guerlain</p>
            </a>
            <a href="<?= base_url("catalogue/marque#") ?>">
                <p>Dior</p>
            </a>
            <a href="<?= base_url("catalogue/marque#") ?>">
                <p>Armani</p>
            </a>
            <a id="plus-marques" href="<?= base_url("catalogue/marques") ?>">Voir plus de marques</a>

            <h4>Prix</h4>
            <div id="price-range">
                <input id="pi_input" type="range" min="0" max="500" step="5" value="500">
                <p><output id="price-value"></output> €</p>
            </div>

        </div>

        <!-- Colonne droite : grille de produits -->
        <div class="right">
            <div id="top">
                <h2>Parfums Hommes</h2>
                <form action="<?=base_url('catalogue#') ?>">
                    <select id="filters">
                        <option value="">Choisissez un filtre</option>
                        <option value="price-crst">Trier par prix croissant</option>
                        <option value="price-dcrst">Trier par prix décroissant</option>
                        <option value="apha-crst">Trier par ordre alphabétique (A-Z)</option>
                        <option value="alpha-dcrst">Trier par ordre alphabétique (Z-A)</option>
                    </select>
                </form>
            </div>
            <div class="grid">
                <?php foreach ($liste_produits as $p): ?>
                    <div class="product-card">
                        <!-- clickable area: image + info -->
                        <a href="<?= base_url(relativePath: 'catalogue/product/' . $p->getId()) ?>" class="card">
                            <img src="<?= esc($p->getUrl()) ?>" alt="<?= esc($p->getNom()) ?>">
                        </a>
                        <div class="card-bottom">
                            <div class="info">
                                <a href="<?= base_url(relativePath: 'catalogue/product/' . $p->getId()) ?>">
                                    <span><?= esc($p->getNom()) ?></span>
                                </a>
                                <strong><?= number_format($p->getPrix(), 2) ?> €</strong>
                            </div>
                            <!-- Use POST form to call Cart::addProduit via route panier/ajouter/{id} -->
                            <form method="post" action="<?= base_url('panier/ajouter/' . $p->getId()) ?>"
                                class="add-to-cart-form">
                                <?= csrf_field() ?>
                                <button type="submit" class="add-to-cart-btn" title="Ajouter au panier">+</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?= view('Pages/partials/footer') ?>

</body>

</html>