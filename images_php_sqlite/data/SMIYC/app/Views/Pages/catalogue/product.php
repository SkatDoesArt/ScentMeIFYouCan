<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/common.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/index.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/product.css">


    <script type="text/javascript" src="<?php echo base_url(); ?>js/reloadPage.js" defer></script>

    <title>Document</title>
</head>

<body>
    <?= view('Pages/partials/header') ?>

    

    <div id="body">
        <div id="top">
            <img id="product-img" src="<?= esc($produit->getUrl()) ?>" alt="<?= esc($produit->getNom()) ?>">
        
            <div id="product-info">
                <h1><?= esc($produit->name) ?></h1>
                <p>Marque : <?= esc($produit->marque) ?></p>
                <p>Catégorie : <?= esc($produit->categorie) ?></p>
                <p>Description : <?= esc($produit->description) ?></p>
                <p>Quantité : <?= esc($produit->taille) ?> ml</p>
            </div>

            <div id="add-to-cart">
                <p id="price"><?= esc($produit->price) ?> €</p>
                <p>Stock : <?= esc($produit->quantiteRestante) ?></p>
                <p>Notation : <?= esc($produit->notation) ?>/5</p>
                <form method="post" action="<?= base_url('cart/add/' . $produit->getId()) ?>" class="add-to-cart-form">
                    <?= csrf_field() ?>
                    <button type="submit" id="add-to-cart-btn" title="Ajouter au panier">Ajouter au panier</button>
                </form>
            </div>
        </div>

        <div id="product-avis">
            <h1>Avis</h1>
            <?php if (empty($avis)): ?>
                <h3>Aucun avis sur se produit</h3>
            <?php else: ?>
                <?php foreach ($avis as $a): ?>
                    <div class="avis">
                        <strong><?= esc($a->titre) ?></strong>
                        <p><?= esc($a->contenu) ?></p>
                        <small><?= esc($a->date) ?></small>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        
        
    </div>

    
</body>

</html>