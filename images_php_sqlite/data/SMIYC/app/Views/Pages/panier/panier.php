<?php
$totalArticles = 0;
$isLoggedIn = auth()->loggedIn();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Panier</title>
    <link rel="stylesheet" href="<?= base_url('css/card_produit.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/panier.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/common.css') ?>">
</head>

<body>

<?= view('Pages/partials/header', ['showCart' => false]) ?>

<div class="container">
    <h1>Récapitulatif de votre panier</h1>

    <?php if (!$isLoggedIn): ?>

        <div class="panier-vide">
            <h2>Veuillez vous connecter pour voir votre panier</h2>
            <a href="<?= base_url('auth/login') ?>">
                <button class="btn">Se connecter</button>
            </a>
        </div>

    <?php elseif (empty($items)): ?>

        <div class="panier-vide">
            <h2>Ton panier est vide 😢</h2>
            <a href="<?= base_url('catalogue') ?>">
                <button class="btn">Ajouter des produits</button>
            </a>
        </div>

    <?php else: ?>

        <div class="grid-layout-panier">

            <div class="panier-section">

                <div class="promo-alert">
                    Livraison offerte pour toute commande supérieure à 90 € !
                </div>

                <div class="cart-header-row">
                    <div class="col-article">ARTICLE</div>
                    <div class="col-qty">QTÉ</div>
                    <div class="col-price">PRIX</div>
                </div>

                <div class="cart-items-list">
                    <?php foreach ($items as $item):
                        $produit = $item['produit'];
                        $quantite = $item['quantite'];
                        $totalArticles += $quantite;
                        ?>

                        <div class="cart-row">
                            <div class="col-article product-flex">
                                <a href="<?= base_url('catalogue/product/' . ($produit->id_produit ?? $produit->id ?? '')) ?>">
                                    <img src="<?= esc($produit->image_name ?? '') ?>" alt="<?= esc($produit->name) ?>"
                                         class="product-thumb">
                                </a>
                                <div class="product-details">
                                    <span class="product-title"><?= esc($produit->name) ?></span>
                                    <span class="product-variant">infos</span>
                                </div>
                            </div>

                            <div class="col-qty qty-wrapper">
                                <a href="<?= base_url('cart/decrement/' . $item['id_ligne_panier']) ?>"
                                   class="qty-control">−</a>
                                <span class="qty-value"><?= esc($quantite) ?></span>
                                <a href="<?= base_url('cart/increment/' . $item['id_ligne_panier']) ?>"
                                   class="qty-control">+</a>
                            </div>

                            <div class="col-price price-wrapper">
                                <span class="price-val"><?= number_format($produit->price, 2, ',', ' ') ?> €</span>

                                <a href="<?= base_url('cart/delete/' . $item['id_ligne_panier']) ?>"
                                   class="remove-btn-cross" title="Supprimer">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18 6L6 18M6 6L18 18" stroke="#ccc" stroke-width="2"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>

            <aside class="summary-sidebar">
                <div class="users-card" style="padding:18px;">
                    <h3>Résumé de la commande</h3>
                    <div style="margin-top:12px; font-size:1rem;">Total articles :
                        <strong><?= $totalArticles ?></strong></div>
                    <div style="margin-top:6px; font-size:1.15rem; color:var(--accent);">Total :
                        <strong><?= number_format($totalPrix, 2, ',', ' ') ?> €</strong></div>

                    <form action="<?= base_url('commande/') ?>" method="post" style="margin-top:16px;">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn" style="width:100%;">Poursuivre la commande</button>
                    </form>
                    <a href="<?= base_url('catalogue') ?>" class="btn secondary"
                       style="display:block; text-align:center; margin-top:12px;">Continuer mes achats</a>
                </div>
            </aside>
        </div>

    <?php endif; ?>

</div>

<?= view('Pages/partials/footer') ?>

</body>
</html>
