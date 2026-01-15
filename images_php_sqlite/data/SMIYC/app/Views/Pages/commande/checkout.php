<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Checkout - Livraison</title>
    <link rel="stylesheet" href="<?= base_url('css/common.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/commande.css') ?>">
</head>

<?php
$isLoggedIn = auth()->loggedIn();
$cart = $cart ?? [[], 0];
$items = $cart[0];
$totalPrix = $cart[1] ?? 0;
?>

<body>
<?= view('Pages/partials/header', ['showCart' => false]) ?>

<div class="container-commande">
    <h2>Informations de livraison</h2>

    <?php if (!$isLoggedIn): ?>
        <p>Veuillez vous connecter pour continuer.</p>
    <?php elseif (empty($items)): ?>
        <p>Votre panier est vide. <a href="<?= base_url('cart') ?>">Retour au panier</a></p>
    <?php else: ?>
        <form id="checkout-form" action="<?= base_url('commande/review') ?>" method="POST">

            <label for="name">Nom complet</label>
            <input type="text" id="name" name="name" required>

            <label for="address">Adresse</label>
            <input type="text" id="address" name="address" required>

            <label for="tel">Téléphone</label>
            <input type="tel" id="tel" name="tel" required>

            <label for="city">Ville</label>
            <input type="text" id="city" name="city" required>

            <label for="postal_code">Code postal</label>
            <input type="text" id="postal_code" name="postal_code" required>

            <label for="country">Pays</label>
            <input type="text" id="country" name="country" required>

            <!-- Utiliser un bouton qui déclenche form.submit() pour contourner des handlers JS interceptant submit -->
            <button type="submit" class="btn">Valider
                l'adresse
            </button>
        </form>
        <a href="<?= base_url('cart') ?>" class="btn secondary">Retour au panier</a>

    <?php endif; ?>

</div>

<?= view('Pages/partials/footer') ?>
</body>
</html>
