<?php
use App\Models\Produit;
use App\Models\Panier;

$liste_produits = [
    new Produit(1, "Produit A", 19.99, "Une description courte"),
    new Produit(2, "Produit B", 29.99, "Description du produit B"),
    new Produit(3, "Produit C", 9.99, "Produit C très populaire"),
    new Produit(4, "Produit D", 15.50, "Description D"),
    new Produit(5, "Produit E", 12.00, "Description E"),
    new Produit(6, "Produit F", 25.75, "Description F"),
    new Produit(7, "Produit G", 30.00, "Description G"),
    new Produit(8, "Produit H", 18.90, "Description H"),    new Produit(1, "Produit A", 19.99, "Une description courte"),
    new Produit(2, "Produit B", 29.99, "Description du produit B"),
    new Produit(3, "Produit C", 9.99, "Produit C très populaire"),
    new Produit(4, "Produit D", 15.50, "Description D"),
    new Produit(5, "Produit E", 12.00, "Description E"),
    new Produit(6, "Produit F", 25.75, "Description F"),
    new Produit(7, "Produit G", 30.00, "Description G"),
    new Produit(8, "Produit H", 18.90, "Description H"),    new Produit(1, "Produit A", 19.99, "Une description courte"),
    new Produit(2, "Produit B", 29.99, "Description du produit B"),
    new Produit(3, "Produit C", 9.99, "Produit C très populaire"),
    new Produit(4, "Produit D", 15.50, "Description D"),
    new Produit(5, "Produit E", 12.00, "Description E"),
    new Produit(6, "Produit F", 25.75, "Description F"),
    new Produit(7, "Produit G", 30.00, "Description G"),
    new Produit(8, "Produit H", 18.90, "Description H"),
    
];
$panier = new Panier(1, $liste_produits);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 20px;
}

.panier-container {
    display: flex;
    gap: 20px;
    align-items: flex-start; /* pour que summary reste en haut */
}

/* La div panier devient scrollable */
.panier {
    flex: 2;
    max-height: 500px; /* ou la hauteur que tu veux */
    overflow-y: auto;
    border: 1px solid #ccc;
    padding: 10px;
    border-radius: 5px;
}

/* Card produit */
.card {
    display: flex;
    border-bottom: 1px solid #ccc;
    padding: 15px 0;
    align-items: center;
}

.card-img {
    width: 80px;
    height: 80px;
    background: #eee;
    margin-right: 15px;
}

.card-info {
    flex: 1;
}

.card-info div {
    margin-bottom: 5px;
}

.quantity-control {
    display: flex;
    align-items: center;
    gap: 5px;
}

.quantity-control button {
    width: 25px;
    height: 25px;
    cursor: pointer;
}

.delete-btn {
    margin-left: 10px;
    cursor: pointer;
    color: red;
}

/* Résumé du panier reste fixe */
.summary {
    flex: 1;
    border: 1px solid #ccc;
    padding: 15px;
    border-radius: 5px;
    position: sticky;
    top: 0; /* reste collé en haut de la page */
    height: fit-content;
}

.summary h3 {
    margin-top: 0;
}

.summary input[type="text"] {
    width: 100%;
    padding: 5px;
    margin-bottom: 10px;
}

.summary button {
    width: 100%;
    padding: 10px;
    background: black;
    color: white;
    border: none;
    cursor: pointer;
}
</style>

</head>
<body>

<div class="panier-container">
    <div class="panier">
        <?php foreach ($panier->getListePanier() as $produit): ?>
        <div class="card">
            <div class="card-img"></div>
            <div class="card-info">
                <div><strong><?= htmlspecialchars($produit->getNom()) ?></strong></div>
                <div>Prix unitaire : <?= number_format($produit->getPrix(),2) ?> €</div>
                <div class="quantity-control">
                    Quantité : 
                    <button >-</button>
                    <span>1</span>
                    <button >+</button>
                    <span class="delete-btn" >🗑</span>
                </div>
                <div>Prix total : <?= number_format($produit->getPrix(),2) ?> €</div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="summary">
        <h3>Résumé du panier</h3>
        <div>Total d’articles : <?= count($panier->getListePanier()) ?></div>
        <div>Total : <?= $panier->calculerTotalPanier() ?> €</div>
        <input type="text" placeholder="Code promo">
        <button>Poursuivre la commande</button>
    </div>
</div>

</body>
</html>
