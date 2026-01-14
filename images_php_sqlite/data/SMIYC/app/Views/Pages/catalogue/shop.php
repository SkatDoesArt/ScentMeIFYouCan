<!DOCTYPE html>
<html lang="fr">

<?php
$produits = new \App\Models\Produit\ProduitModel();

if (isset(request()->getGet()['categorie'])) {
    $categorie = request()->getGet()['categorie'];
    $liste_produits = $produits->where('categorie', $categorie)->findAll();
}

$minPrice = min($liste_produits ? array_map(function ($p) {
    return intval($p->getPrix());
}, $liste_produits) : [5]);

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
            <form id="brand-filters" role="search" action="<?= base_url('catalogue/filters/' . $categorie) ?>"
                method="get">
                <?php
                $brands = array_unique(array_map(function ($p) {
                    return $p->marque;
                }, $liste_produits));
                
                foreach ($brands as $brand): ?>
                    <input type="submit" value="<?= esc($brand) ?>" name="brand" inputmode="search" interkeyhint="search">
                <?php endforeach; ?>
            </form>

            <a id="plus-marques" href="<?= base_url("catalogue/marques") ?>">Voir plus de marques</a>

            <h4>Prix</h4>
            <form id="price-range" role="search" action="<?= base_url('catalogue/filters/' . $categorie) ?>"
                method="get" onchange="this.submit()">
                <input id="pi_input" type="range" min="5" max="<?= $maxPrice ?? 350 ?>" step="5"
                    value="<?= $price ?? 350 ?>" name="price" inputmode="search" interkeyhint="search">
                <p><output id="price-value"><?= $price ?? 350 ?></output> €</p>
            </form>
        </aside>

        <main class="right">
            <div id="top">
                <?php if (isset($query) && !empty($query) && $is_search) {
                    echo '<h2>Résultats pour "' . esc($query) . '"</h2>';
                } else {
                    if ($categorie == null) {
                        echo '<h2>' . esc($liste_produits[0]->marque) . '</h2>';
                    } else if ($categorie != null) {
                        echo '<h2>Parfums ' . esc($categorie) . '</h2>';
                    }
                } ?>


                <form class="shop-controls" role="search" action="<?php if($categorie != null) : echo base_url('catalogue/filters/' . $categorie); else : echo base_url('catalogue/filters/' . $liste_produits[0]->marque); endif; ?>"
                    method="get" onchange="this.submit()">
                    <?php
                    if (isset($filter) && !empty($filter)) {
                        echo '<script type="text/javascript">
                            document.addEventListener("DOMContentLoaded", function() {
                                const sortFilter = document.getElementById("sort-filter");
                                sortFilter.value = "' . esc($filter) . '";
                            });
                        </script>';
                    }
                    ?>

                    <select id="sort-filter" name="f" inputmode="search" interkeyhint="search">
                        <option value="none">Choisissez un filtre</option>
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
                        <a href="javascript:history.back()" class="btn">Retour au catalogue</a>
                    </div>
                <?php endif; ?>
            </div>
        </main>
    </div>

    <?= view('Pages/partials/footer') ?>

</body>

</html>