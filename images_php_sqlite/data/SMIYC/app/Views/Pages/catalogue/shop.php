<!DOCTYPE html>
<html lang="fr">

<?php
$produitModel = new \App\Models\Produit\ProduitModel();

// RÉCUPÉRATION DES VARIABLES
$categorie = $categorie ?? request()->getGet('categorie') ?? null;
$brandActive = request()->getGet('brand'); // Récupère la marque sélectionnée
$is_search = $is_search ?? false;
$query     = $query ?? null;
$price     = $price ?? request()->getGet('price');
$filter    = $filter ?? request()->getGet('f');

// Filtrage par catégorie 
if (isset(request()->getGet()['categorie'])){
    $categorie = request()->getGet()['categorie'];
    $liste_produits = $produitModel->where('categorie', $categorie)->findAll();
}

// Calcul du prix max pour le curseur
$maxPriceFound = 350;
if (!empty($liste_produits)) {
    $prices = array_map(fn($p) => is_object($p) ? intval($p->getPrix()) : intval($p['prix']), $liste_produits);
    $maxPriceFound = max($prices);
}

$catSlug = $categorie ?? 'all';  
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique - SMIYC</title>

    <link rel="stylesheet" href="<?= base_url('css/common.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('css/index.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('css/shop.css'); ?>">

    <style>
        /* Styles pour l'état actif des marques */
        .brand-filter-btn {
            background: none;
            border: none;
            padding: 5px 0;
            cursor: pointer;
            display: block;
            text-align: left;
            width: 100%;
            font-size: 1rem;
            color: #777; /* Gris par défaut */
            transition: all 0.2s;
        }
        .brand-filter-btn:hover { color: #000; }
        
        /* État Actif : Noir et Gras */
        .brand-filter-btn.active {
            color: #000 !important;
            font-weight: bold;
            text-decoration: underline;
        }
    </style>

    <script type="text/javascript" src="<?= base_url('js/shop_filter.js'); ?>" defer></script>
    <script type="text/javascript" src="<?= base_url('js/reloadPage.js'); ?>" defer></script>
</head>

<body>
    <?= view('Pages/partials/header', ['showCart' => true, 'showList' => true]) ?>

    <div class="container">
        <aside class="left">
            <h2>Filtres</h2>
            <h3><strong>Marques</strong></h3>
            <form id="brand-filters" role="search" action="<?= base_url('catalogue/filters/' . $catSlug) ?>" method="get">
                <?php
                // Extraction des marques uniques
                $brands = array_unique(array_map(function ($p) {
                    return is_object($p) ? $p->marque : $p['marque'];
                }, $liste_produits));
                sort($brands);
                
                foreach ($brands as $brand): 
                    // On vérifie si cette marque est celle dans l'URL
                    $isActive = ($brandActive === $brand) ? 'active' : '';
                ?>
                    <button type="submit" name="brand" value="<?= esc($brand) ?>" class="brand-filter-btn <?= $isActive ?>">
                        <?= esc($brand) ?>
                    </button>
                <?php endforeach; ?>
                
                <?php if($brandActive): ?>
                    <a href="<?= base_url('catalogue/filters/' . $catSlug) ?>" style="font-size: 0.8rem; color: red; text-decoration: none; display: block; margin-top: 10px;">✕ Effacer le filtre</a>
                <?php endif; ?>
            </form>

            <a id="plus-marques" href="<?= base_url("catalogue/marques") ?>" style="display: block; margin-top: 15px;">Voir plus de marques</a>

            <h4>Prix</h4>
            <form id="price-range" role="search" action="<?= base_url('catalogue/filters/' . $catSlug) ?>" method="get" onchange="this.submit()">
                <input id="pi_input" type="range" min="5" max="<?= $maxPriceFound ?>" step="5"
                    value="<?= $price ?? $maxPriceFound ?>" name="price">
                <p><output id="price-value"><?= $price ?? $maxPriceFound ?></output> €</p>
            </form>
        </aside>

        <main class="right">
            <div id="top">
                <?php if (isset($query) && !empty($query) && $is_search): ?>
                    <h2>Résultats pour "<?= esc($query) ?>"</h2>
                <?php else: ?>
                    <h2><?= ($categorie === null) ? 'Tous nos Parfums' : 'Parfums ' . esc($categorie) ?></h2>
                <?php endif; ?>

                <form class="shop-controls" role="search" action="<?= base_url('catalogue/filters/' . $catSlug) ?>"
                    method="get" onchange="this.submit()">
                    <select id="sort-filter" name="f">
                        <option value="none">Choisissez un filtre</option>
                        <option value="price-crst" <?= ($filter === 'price-crst') ? 'selected' : '' ?>>Trier par prix croissant</option>
                        <option value="price-dcrst" <?= ($filter === 'price-dcrst') ? 'selected' : '' ?>>Trier par prix décroissant</option>
                        <option value="alpha-crst" <?= ($filter === 'alpha-crst') ? 'selected' : '' ?>>Trier par ordre alphabétique (A-Z)</option>
                        <option value="alpha-dcrst" <?= ($filter === 'alpha-dcrst') ? 'selected' : '' ?>>Trier par ordre alphabétique (Z-A)</option>
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

                                <form method="post" action="<?= base_url('cart/add/' . $p->getId()) ?>" class="add-to-cart-form">
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

            <?php if (isset($pager)): ?>
                <div class="pagination-container" style="margin-top: 2rem; display: flex; justify-content: center;">
                    <?= $pager->links('group1', 'default_full') ?>
                </div>
            <?php endif; ?>
        </main>
    </div>

    <?= view('Pages/partials/footer') ?>

</body>
</html>