<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Récapitulatif de la commande</title>
    <link rel="stylesheet" href="<?= base_url('css/common.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/commande.css') ?>">
</head>

<?php
$isLoggedIn = auth()->loggedIn();
$cart = $cart ?? [[], 0];
$items = $cart[0];
$totalPrix = $cart[1] ?? 0;
$livraison = $livraison ?? [];
?>

<body>
<?= view('Pages/partials/header', ['showCart' => false]) ?>

<div class="container-commande">
    <h2>Récapitulatif de la commande</h2>

    <?php if (!$isLoggedIn): ?>
        <p>Veuillez vous connecter.</p>
    <?php elseif (empty($items)): ?>
        <p>Votre panier est vide. <a href="<?= base_url('cart') ?>">Retour au panier</a></p>
    <?php else: ?>

        <section id="livraison">
            <h3>Adresse de livraison</h3>
            <div><?= esc($livraison['nom_complet'] ?? '') ?></div>
            <div><?= esc($livraison['adresse'] ?? '') ?></div>
            <div><?= esc($livraison['ville'] ?? '') ?> - <?= esc($livraison['code_postal'] ?? '') ?></div>
            <div><?= esc($livraison['pays'] ?? '') ?></div>
            <div><?= esc($livraison['tel'] ?? '') ?></div>
        </section>

        <section id="recap">
            <h3>Articles</h3>
            <ul>
                <?php foreach ($items as $item):
                    $produit = $item['produit'];
                    $quantite = $item['quantite'];
                    ?>
                    <li><?= esc($produit->name) ?> x <?= esc($quantite) ?>
                        — <?= number_format($item['total_ligne'], 2) ?> €
                    </li>
                <?php endforeach; ?>
            </ul>
            <div>Total : <strong><?= number_format($totalPrix, 2) ?> €</strong></div>

            <form action="<?= base_url('commande') ?>" method="post">
                <input type="submit" class="btn" value="Payer la commande">
            </form>

            <a href="<?= base_url('commande/checkout') ?>" class="btn secondary">Modifier l'adresse</a>
            <a href="<?= base_url('cart') ?>" class="btn secondary">Retour au panier</a>
        </section>

    <?php endif; ?>
</div>

<?= view('Pages/partials/footer') ?>
</body>
</html>
