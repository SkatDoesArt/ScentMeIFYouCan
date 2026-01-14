<!DOCTYPE html>
<html lang="fr">

<?php
$produits = new \App\Models\Produit\ProduitModel();

if (isset(request()->getGet()['categorie'])) {
    $categorie = request()->getGet()['categorie'];
    $liste_produits = $produits->where('categorie', $categorie)->findAll();
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique - SMIYC</title>

    <link rel="stylesheet" href="<?= base_url('css/common.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('css/index.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('css/shop.css'); ?>">

    <script type="text/javascript" src="<?= base_url('js/shop_filter.js'); ?>" defer></script>
    <script type="text/javascript" src="<?= base_url('js/reloadPage.js'); ?>" defer></script>
</head>

<body>
    <?= view('Pages/partials/header', ['showCart' => true, 'showList' => true]) ?>

    <div class="container">
        <aside class="left">
            <h2>Filtres</h2>
            <h3><strong>Marques</strong></h3>
            <form id="brand-filters" role="search" action="<?= base_url('catalogue/filters/' . $categorie) ?>" method="get">
                <input type="submit" value="Serge Lutens" name="brand" inputmode="search" interkeyhint="search">
                <input type="submit" value="Guerlain" name="brand" inputmode="search" interkeyhint="search">
                <input type="submit" value="Dior" name="brand" inputmode="search" interkeyhint="search">
                <input type="submit" value="Armani" name="brand" inputmode="search" interkeyhint="search">
            </form>

            <a id="plus-marques" href="<?= base_url("catalogue/marques") ?>">Voir plus de marques</a>

            <h4>Prix</h4>
            <form id="price-range" role="search" action="<?= base_url('catalogue/filters/' . $categorie) ?>" method="get" onchange="this.submit()">
                <input id="pi_input" type="range" min="0" max="500" step="5" value="<?= $price ?? 500 ?>" name="price" inputmode="search" interkeyhint="search">
                <p><output id="price-value"><?= $price ?? 500 ?></output> €</p>
            </form>
        </aside>

        <main class="right">
            <div id="top">
                <?php if (isset($query) && !empty($query) && $is_search): ?>
                    <h2>Résultats pour "<?= esc($query[0]) ?>"</h2>
                <?php else: ?>
                    <h2>Parfum <?= esc($categorie) ?></h2>
                <?php endif; ?>

                <form class="shop-controls" role="search" action="<?= base_url('catalogue/filters/' . $categorie) ?>"
                    method="get" onchange="this.submit()">
                    <select id="sort-filter" name="f" inputmode="search" interkeyhint="search">
                        <option value="none" selected>Choisissez un filtre</option>
                        <option value="price-crst">Trier par prix croissant</option>
                        <option value="price-dcrst">Trier par prix décroissant</option>
                        <option value="alpha-crst">Trier par ordre alphabétique (A-Z)</option>
                        <option value="alpha-dcrst">Trier par ordre alphabétique (Z-A)</option>
                    </select>
                </form>
            </div>


            <div class="grid">
                <?php if (!empty($liste_produits)): ?>
                    <?php foreach ($liste_produits as $p): ?>
                        <div class="product-card">
                            <a href="<?= base_url('catalogue/product/' . $p->getId()) ?>" class="card">
                                <img src="<?= esc($p->getUrl()) ?>" alt="<?= esc($p->getNom()) ?>" loading="lazy">
                            </a>

                            <div class="card-bottom">
                                <div class="info">
                                    <a href="<?= base_url('catalogue/product/' . $p->getId()) ?>">
                                        <span><?= esc($p->getNom()) ?></span>
                                    </a>
                                    <strong><?= number_format($p->getPrix(), 2, ',', ' ') ?> €</strong>
                                </div>

                                <form method="post" action="<?= base_url('cart/add/' . $p->getId()) ?>"
                                    class="add-to-cart-form">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="add-to-cart-btn" title="Ajouter au panier">+</button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="no-results">
                        <p>Désolé, aucun produit ne correspond à votre recherche.</p>
                        <a href="<?= base_url('catalogue?categorie=' . $categorie) ?>" class="btn">Retour au catalogue</a>
                    </div>
                <?php endif; ?>
            </div>
        </main>
    </div>

    <?= view('Pages/partials/footer') ?>

</body>

</html>