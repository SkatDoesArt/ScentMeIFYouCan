<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Produits</title>


    <link rel="stylesheet" href="<?php echo base_url(); ?>css/card_produit.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/header.css">

</head>

<body>

<?= view('Pages/partials/header', ['showCart' => false, 'showList' => false, 'showSearch' => false]) ?>

<div class="container">
    <div class="grid">
        <?php if (!empty($liste_produits)): ?>
            <?php foreach ($liste_produits as $p): ?>
                <div class="product-card">

                    <a href="<?= base_url('admin/edit/product/' . $p->getId()) ?>" class="card">
                        <img src="<?= esc($p->getUrl()) ?>" alt="<?= esc($p->getNom()) ?>" loading="lazy">

                        <div class="info">
                            <span class="product-name"><?= esc($p->getNom()) ?></span>
                            <strong class="product-price">
                                <?= number_format($p->getPrix(), 2, ',', ' ') ?> €
                            </strong>
                        </div>
                    </a>

                    <div class="card-bottom">
                        <form method="post"
                              action="<?= base_url('admin/edit/add_quantite/product/' . $p->getId()) ?>">
                            <?= csrf_field() ?>
                            <button type="submit" class="qty-btn plus" title="Augmenter">+</button>
                        </form>

                        <span class="stock">
                            <?= esc($p->quantiteRestante) ?>
                        </span>

                        <form method="post"
                              action="<?= base_url('admin/edit/quantite/product/' . $p->getId()) ?>">
                            <?= csrf_field() ?>
                            <button type="submit" class="qty-btn minus" title="Diminuer">−</button>
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
        <div class="pagination-container">
            <?= $pager->links('group1', 'default_full') ?>
        </div>
    <?php endif; ?>

</div>



</body>

</html>