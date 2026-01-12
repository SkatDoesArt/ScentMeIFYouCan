<?php
    $totalArticles = 0;
    $isLoggedIn = auth()->loggedIn();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Panier</title>
    <link rel="stylesheet" href="<?= base_url('css/panier.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/common.css') ?>">
</head>

<body>

    <?= view('Pages/partials/header', ['showCart' => false]) ?>

    <h2>Récapitulatif de votre panier</h2>

    <?php if (!$isLoggedIn): ?>

        <div class="panier-vide">
            <h2>Veuillez vous connecter pour voir votre panier</h2>
            <a href="<?= base_url('auth/login') ?>">
                <button class="btn-panier">Se connecter</button>
            </a>
        </div>

    <?php elseif (empty($items)): ?>

        <div class="panier-vide">
            <h2>Ton panier est vide 😢</h2>
            <a href="<?= base_url('catalogue') ?>">
                <button class="btn-panier">Ajouter des produits</button>
            </a>
        </div>

    <?php else: ?>

        <div class="panier-container">
            <div class="panier">

                <?php foreach ($items as $item):
                    $produit = $item['produit'];
                    $quantite = $item['quantite'];
                    $totalArticles += $quantite;
                    ?>

                    <div class="card">
                        <div class="card-info">
                            <strong><?= esc($produit->name) ?></strong>
                            <div>Prix unitaire : <?= number_format($produit->price, 2) ?> €</div>

                            <div class="quantity-control">
                                Quantité :
                                <a href="<?= base_url('cart/decrement/'.$item['id_ligne_panier']) ?>">-</a>
                                <span><?= $quantite ?></span>
                                <a href="<?= base_url('cart/increment/'.$item['id_ligne_panier']) ?>">+</a>
                                <a href="<?= base_url('cart/delete/'.$item['id_ligne_panier']) ?>">🗑</a>
                            </div>

                            <div>
                                Prix total :
                                <?= number_format($item['total_ligne'], 2) ?> €
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>

            <div class="summary">
                <h3>Résumé</h3>
                <div>Total articles : <?= $totalArticles ?></div>
                <div>Total : <?= number_format($totalPrix, 2) ?> €</div>
                <button>Poursuivre la commande</button>
            </div>
        </div>

    <?php endif; ?>

    <?= view('Pages/partials/footer') ?>

</body>
</html>
