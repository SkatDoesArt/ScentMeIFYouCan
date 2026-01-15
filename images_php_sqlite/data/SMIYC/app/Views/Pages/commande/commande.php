<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="<?= base_url('css/common.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/panier.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/commande.css') ?>">
</head>

<?php

use App\Models\Users\Client;

$totalArticles = 0;
$isLoggedIn = auth()->loggedIn();
$user = auth()->user();

?>

<body>
    <?= view('Pages/partials/header', ['showCart' => false]) ?>

    <h2>Récapitulatif de votre commande</h2>

    <?php if (!$isLoggedIn): ?>

        <div class="panier-vide">
            <h2>Veuillez vous connecter pour voir votre panier</h2>
            <a href="<?= base_url('auth/login') ?>">
                <button class="btn-panier">Se connecter</button>
            </a>
        </div>

    <?php else: ?>
        <div class="container-commande">
            <div id="infos">
                <form action="">
                    <h3>Informations de livraison</h3>
                    <label for="name">Nom complet :</label>
                    <input type="text" id="name" name="name" placeholder="Nom complet" required>

                    <label for="address">Adresse :</label>
                    <input type="text" id="address" name="address" placeholder="Adresse" required>

                    <label for="tel">Numéro de téléphone :</label>
                    <input type="tel" id="tel" name="tel" placeholder="Numéro de téléphone" required>

                    <label for="city">Ville :</label>
                    <input type="text" id="city" name="city" placeholder="Ville" required>

                    <label for="postal_code">Code postal :</label>
                    <input type="text" id="postal_code" name="postal_code" placeholder="Code postal" required>

                    <label for="country">Pays :</label>
                    <input type="text" id="country" name="country" placeholder="Pays" required>

                    <input type="submit" value="Confirmer les informations">
                </form>
            </div>

            <div id="recapPanier">
                <h3>Récapitulatif du panier</h3>
                <div class="panier">
                    <?php
                    $items = $cart[0];
                    $totalPrix = $cart[1];
                    foreach ($items as $item):
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
                                    <a href="<?= base_url('cart/decrement/' . $item['id_ligne_panier']) ?>">-</a>
                                    <span><?= $quantite ?></span>
                                    <a href="<?= base_url('cart/increment/' . $item['id_ligne_panier']) ?>">+</a>
                                    <a href="<?= base_url('cart/delete/' . $item['id_ligne_panier']) ?>">🗑</a>
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
                    <!-- <h3>Résumé</h3> -->
                    <div>Total articles : <?= $totalArticles ?></div>
                    <div>Total : <?= number_format($totalPrix, 2) ?> €</div>
                    <form action="<?= base_url('commande/') ?>" method="post">
                        <input type="submit" value="Payer la commande">
                    </form>
                </div>
            </div>
        </div>


    <?php endif; ?>

    <?= view('Pages/partials/footer') ?>
</body>

</html>