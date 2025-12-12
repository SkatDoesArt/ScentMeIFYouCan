<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?= esc($produit->name) ?></h1>

<p>Prix : <?= esc($produit->price) ?> €</p>
<p>Description : <?= esc($produit->description) ?></p>
<p>Notation : <?= esc($produit->notation) ?>/5</p>
<p>Taille : <?= esc($produit->taille) ?></p>
<p>Stock : <?= esc($produit->quantiteRestante) ?></p>
<p>Marque : <?= esc($produit->marque) ?></p>
<p>Catégorie : <?= esc($produit->catégorie) ?></p>

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
</body>
</html>