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

    <?php if (!$isLoggedIn): ?>
        <div id="infos">
            <h2>Récapitulatif de la commande</h2>
            <p>Veuillez vous connecter.</p>
        </div>
    <?php elseif (empty($items)): ?>
        <div id="infos">
            <h2>Récapitulatif de la commande</h2>
            <p>Votre panier est vide. <a href="<?= base_url('cart') ?>">Retour au panier</a></p>
        </div>
    <?php else: ?>

        <div id="infos">
            <h2>Récapitulatif de la commande</h2>

            <section id="livraison">
                <h3>Adresse de livraison</h3>
                <label>Nom :</label>
                <div><?= esc($livraison['nom_complet'] ?? '') ?></div>
                <label>Adresse :</label>
                <div><?= esc($livraison['adresse'] ?? '') ?></div>
                <label>Ville, Code Postal :</label>
                <div><?= esc($livraison['ville'] ?? '') ?> - <?= esc($livraison['code_postal'] ?? '') ?></div>
                <label>Pays :</label>
                <div><?= esc($livraison['pays'] ?? '') ?></div>
                <label>Téléphone :</label>
                <div><?= esc($livraison['tel'] ?? '') ?></div>
            </section>
        </div>

        <aside id="recapPanier">
            <h3>Articles</h3>

            <div class="panier">
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
            </div>

            <div class="summary">
                <div>Total : <strong><?= number_format($totalPrix, 2) ?> €</strong></div>

                <form action="<?= base_url('commande') ?>" method="post" style="margin-top:12px">
                    <input type="submit" class="btn" value="Payer la commande">
                </form>

                <div style="margin-top:10px; display:flex; gap:8px; flex-wrap:wrap">
                    <a href="<?= base_url('commande/checkout') ?>" class="btn secondary">Modifier l'adresse</a>
                    <a href="<?= base_url('cart') ?>" class="btn secondary">Retour au panier</a>
                </div>
            </div>

        </aside>

    <?php endif; ?>
</div>

<?= view('Pages/partials/footer') ?>
</body>
</html>
