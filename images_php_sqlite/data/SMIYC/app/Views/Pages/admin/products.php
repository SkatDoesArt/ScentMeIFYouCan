<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="<?php echo base_url(); ?>css/separator_shop.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/card_produit.css">


</head>

<body>
    <header id="header">

    </header>
    
    <div class="container">
    <!-- Colonne droite : grille de produits -->
    <div class="right">
     
        <div class="grid">
            <?php foreach ($liste_produits as $p): ?>
               <a href="<?= base_url(relativePath:'catalogue/product/' . $p->getId()) ?>" class="card">

                   <img src="#" alt="<?= esc($p->getNom()) ?>">

                   <div class="info">
                       <span><?= esc($p->getNom()) ?></span>
                       <strong><?= number_format($p->getPrix(), 2) ?> €</strong>
                   </div>
               </a>
            <?php endforeach; ?>
        </div>

        </div>
    </div>


</body>

</html>