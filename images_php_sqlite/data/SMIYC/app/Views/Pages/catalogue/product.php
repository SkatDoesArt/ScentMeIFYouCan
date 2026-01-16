<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= base_url('css/common.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('css/index.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('css/product.css'); ?>">

    <script type="text/javascript" src="<?= base_url('js/reloadPage.js'); ?>" defer></script>

    <title><?= esc($produit->getNom()) ?></title>
</head>

<body>
    <?= view('Pages/partials/header') ?>

    <div id="body">
        <div id="top">
            <img id="product-img" src="<?= esc($produit->getUrl()) ?>" alt="<?= esc($produit->getNom()) ?>">

            <div id="product-info">
                <h1><?= esc($produit->getNom()) ?></h1>

                <p><strong>Marque :</strong> <?= esc($produit->getMarque()) ?></p>
                <p><strong>Description :</strong> <?= esc($produit->getDescription()) ?></p>
                <p>
                    <strong>Quantité :</strong>
                    <?= esc($produit->getTaille()) ?>
                    <?= (in_array(trim($produit->getType()), ['parfums', 'encens'])) ? 'ml' : 'g' ?>
                </p>

                <p><strong>Prestige :</strong> <?= $produit->getPrestigeStars() ?></p>

                <p><strong>Saison :</strong> <?= esc($produit->saison) ?></p>

                <?php if ($produit->getType() == 'parfums'): ?>
                    <p><strong>Catégorie :</strong> <?= esc($produit->getCategorie()) ?></p>

                <?php elseif ($produit->getType() == 'encens'): ?>
                    <p><strong>Durée de combustion :</strong> <?= esc($produit->getDureeCombustion()) ?> min</p>

                <?php elseif ($produit->getType() == 'creme'): ?>
                    <p><strong>Type de peau :</strong> <?= esc($produit->getTypePeau()) ?></p>
                <?php endif; ?>
            </div>

            <div id="add-to-cart">
                <p id="price"><?= number_format($produit->getPrix(), 2, ',', ' ') ?> €</p>
                <p>Stock : <?= esc($produit->getQuantiteRestante()) ?></p>
                <p>Notation : <?= esc($produit->getNotationProduit()) ?>/5</p>

                <form method="post" action="<?= base_url('cart/add/' . $produit->getId()) ?>" class="add-to-cart-form">
                    <?= csrf_field() ?>
                    <button type="submit" id="add-to-cart-btn">Ajouter au panier</button>
                </form>
            </div>
        </div>

        <div id="product-avis">
            <h1>Avis</h1>
            <?php if (empty($avis)): ?>
                <h3>Aucun avis sur ce produit</h3>
            <?php else: ?>
                <?php foreach ($avis as $a): ?>
                    <div class="avis">
                        <strong><?= esc($a->titre) ?></strong>
                        <p><?= esc($a->contenu) ?></p>
                        <small>Le <?= date('d/m/Y', strtotime($a->date)) ?></small>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <?= view('Pages/partials/footer') ?>
</body>

</html>