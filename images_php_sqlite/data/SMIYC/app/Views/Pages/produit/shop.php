<?php
use App\Models\Produit;

// Liste de produits (exemple)
$liste_produits = [
    new Produit(1, "Produit A", 19.99, "Une description courte"),
    new Produit(2, "Produit B", 29.99, "Description du produit B"),
    new Produit(3, "Produit C", 9.99, "Produit C très populaire"),
    new Produit(4, "Produit D", 15.50, "Description D"),
    new Produit(5, "Produit E", 12.00, "Description E"),
    new Produit(6, "Produit F", 25.75, "Description F"),
    new Produit(7, "Produit G", 30.00, "Description G"),
    new Produit(8, "Produit H", 18.90, "Description H"),
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Liste des produits</title>
<style>
.container {
    display: flex;
    gap: 40px;
    align-items: flex-start;
}

.left {
    border-right: 2px solid #ccc; /* separator vertical */
    padding-right:57px;
    max-width: 200px;
}

.right {
    flex: 1;
}

.grid {
    display: grid;
    grid-template-columns: repeat(6, 150px); /* 7 cartes par ligne */
    gap: 20px;
    justify-content: start;
}

.card {
    width: 150px;
    height: 180px;
    background: #eee;
    border-radius: 8px;
    padding: 15px;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    gap: 10px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    box-sizing: border-box;
}

.card img {
    width: 100%;
    height: 100px;
    background: #ccc;
    border-radius: 6px;
}

.info {
    display: flex;
    justify-content: space-between;
    font-size: 14px;
    font-weight: 500;
}
</style>
</head>
<body>

<div class="container">
  <!-- Colonne gauche : texte / filtre -->
  <div class="left">
    <h2>Catégories</h2>
    <h3><strong>Marques</strong></h3>
    <p>Serge Luttens</p>
    <p>Gurlain</p>
    <p>Dior</p>
    <p>Armani</p>
    <a href="">Voir plus de marques</a>

    <h4>Prix</h4>
    <input type="range" name="" id="">
  </div>

  <!-- Colonne droite : grille de produits -->
<div class="right">
    <h2>Parfums Hommes</h2> <!-- titre au-dessus de la grille -->
<div class="grid">
    <?php foreach ($liste_produits as $p): ?>
        <a href="product?id=<?= $p->getId() ?>" class="card">
            <img src="#" >
            <div class="info">
                <span><?= htmlspecialchars($p->getNom()) ?></span>
                <strong><?= number_format($p->getPrix(), 2) ?> €</strong>
            </div>
        </a>
    <?php endforeach; ?>
</div>
</div>
</div>

</body>
</html>
