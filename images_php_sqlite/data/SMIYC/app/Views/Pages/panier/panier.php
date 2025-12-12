<?php

use App\Models\User;
use App\Models\Role;
use App\Models\ProduitModel;

// Exemple d'utilisateur connecté
$client = new User(
    2,
    "Martin",
    "Alice",
    "client1",
    "password",
    Role::Client
);

// Récupération des produits dans le panier
$produitModel = new ProduitModel();
$produitsDansPanier = [];

foreach ($panier as $ligne) {
    $idProduit = $ligne->getIdProduit();
    $produit = $produitModel->find($idProduit);

    if ($produit) {
        $produitsDansPanier[] = [
            'produit' => $produit,
            'quantite' => $ligne->getQuantite()
        ];
    }
}


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>SMIYC/public/css/panier.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>SMIYC/public/css/common.css">
</head>

<body>
    <header id="header">
        <div id="header-container">
            <nav id="nav-upper">                
                <h1 id="bigname">SMIYC</h1>
            </nav>
        </div>
    </header>

    <h2>Récapitulatif de votre panier</h2>



 <?php if (!$client): ?>
    <div class="panier-vide">
        <h2>Veuillez vous connecter pour voir votre panier 😢</h2>
        <button class="btn-panier">Se connecter</button>
    </div>
<?php elseif (empty($produitsDansPanier)): ?>
    <div class="panier-vide">
        <h2>Ton panier est vide 😢</h2>
        <button class="btn-panier">Ajouter des produits</button>
    </div>
<?php else: ?>
    <div class="panier-container">
        <div class="panier">
            <?php foreach ($produitsDansPanier as $item): 
                $produit = $item['produit'];
                $quantite = $item['quantite'];
            ?>
                <div class="card">
                    <div class="card-img"></div>
                    <div class="card-info">
                        <div><strong><?= htmlspecialchars($produit->name) ?></strong></div>
                        <div>Prix unitaire : <?= number_format($produit->price, 2) ?> €</div>
                        <div class="quantity-control">
                            Quantité : 
                            <button>-</button>
                            <span><?= $quantite ?></span>
                            <button>+</button>
                            <span class="delete-btn">🗑</span>
                        </div>
                        <div>Prix total : <?= number_format($produit->price * $quantite, 2) ?> €</div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="summary">
            <h3>Résumé du panier</h3>
            <div>Total d’articles : <?= array_sum(array_column($produitsDansPanier, 'quantite')) ?></div>
            <div>Total : <?= number_format(array_sum(array_map(fn($item) => $item['produit']->price * $item['quantite'], $produitsDansPanier)), 2) ?> €</div>
            <input type="text" placeholder="Code promo">
            <button>Poursuivre la commande</button>
        </div>
    </div>
<?php endif; ?>
</body>

</html>
