<!DOCTYPE html>
<html lang="fr">

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
                <p><output id="price-value">500</output> €</p>
            </div>
        </aside>

        <main class="right">
            <div id="top">
                <?php if (isset($query) && !empty($query)): ?>
                <h2>Résultats pour "<?= esc($query) ?>"</h2>
                <?php else: ?>
                    <h2>Parfum <?= esc($liste_produits[0]->categorie) ?></h2>
                <?php endif; ?>

                <div class="shop-controls">
                    <select id="sort-filter">
                        <option value="">Choisissez un filtre</option>
                        <option value="price-crst">Trier par prix croissant</option>
                        <option value="price-dcrst">Trier par prix décroissant</option>
                        <option value="apha-crst">Trier par ordre alphabétique (A-Z)</option>
                        <option value="alpha-dcrst">Trier par ordre alphabétique (Z-A)</option>
                    </select>
                </div>
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
                        <a href="<?= base_url('catalogue') ?>" class="btn">Retour au catalogue</a>
                    </div>
                <?php endif; ?>
            </div>
        </main>
    </div>

    <?= view('Pages/partials/footer') ?>
</body>

</html>