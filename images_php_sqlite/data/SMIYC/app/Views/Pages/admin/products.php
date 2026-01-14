<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="<?php echo base_url(); ?>css/card_produit.css">

</head>

<body>
<style>

/* Container */
.container {
    max-width: 1200px;
    margin: auto;
    padding: 20px;
}

/* Grid */
.grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(230px, 1fr));
    gap: 20px;
}

/* Carte produit */
.product-card {
    background: #ffffff;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 6px 18px rgba(0,0,0,0.12);
    transition: transform .25s ease, box-shadow .25s ease;
}

.product-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 30px rgba(0,0,0,0.2);
}

/* Lien carte */
.card {
    text-decoration: none;
    color: #333;
    display: block;
    padding: 15px;
}

.card img {
    width: 100%;
    height: 140px;
    object-fit: cover;
    border-radius: 10px;
    margin-bottom: 10px;
}

/* Infos */
.info {
    text-align: center;
}

.product-name {
    display: block;
    font-size: 0.95rem;
    font-weight: 600;
    margin-bottom: 6px;
}

.product-price {
    color: #c0392b;
    font-size: 1.05rem;
}

/* Bas de carte */
.card-bottom {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 15px 15px;
    border-top: 1px solid #eee;
}

/* Boutons quantité */
.qty-btn {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    border: none;
    font-size: 1.4rem;
    font-weight: bold;
    cursor: pointer;
    color: #fff;
    transition: background .2s ease, transform .1s ease;
}

.qty-btn.plus {
    background: #27ae60;
}

.qty-btn.minus {
    background: #c0392b;
}

.qty-btn:hover {
    transform: scale(1.1);
    filter: brightness(1.1);
}

/* Stock */
.stock {
    font-size: 1rem;
    font-weight: 700;
    min-width: 40px;
    text-align: center;
    color: #333;
}

/* Aucun résultat */
.no-results {
    grid-column: 1 / -1;
    text-align: center;
    padding: 40px;
}

.no-results p {
    margin-bottom: 15px;
    font-size: 1.1rem;
}

.no-results .btn {
    padding: 10px 20px;
    background: #333;
    color: #fff;
    border-radius: 8px;
    text-decoration: none;
}




</style>
    
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
</div>



</body>

</html>