<?php

use App\Models\Produit;
use App\Models\Panier;
use App\Models\User;
use App\Models\Role;


$client = null; // ou $client = null / false si pas connecté

$liste_produits = [];
$panier = new Panier(1, $liste_produits);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>SMIYC/public/css/panier.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>SMIYC/public/css/common.css">
    <title>Panier</title>
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

        <!-- CAS 1 : USER PAS CONNECTÉ  -->
        <?php if (empty($client)): ?>
            <div class="panier-vide">
                <h2>Ton panier est vide 😢</h2>
                <button class="btn-panier" type="button">Ajouter des produits</button>
                <h2>Connecte-toi pour accéder à ton panier 🔒</h2>
                <button class="btn-panier" type="button" >Se connecter</button>
            </div>

        <!-- CAS 2 : USER CONNECTÉ + PANIER VIDE -->
        <?php elseif (!empty($client) && empty($panier->getListePanier())): ?>
            <div class="panier-vide">
                <h2>Ton panier est vide 😢</h2>
                <button class="btn-panier" type="button">Ajouter des produits</button>
            </div>

        <!-- CAS 3 : USER CONNECTÉ + PANIER AVEC PRODUITS -->
        <?php else: ?>
    <div class="panier-container">
        <div class="panier"> <?php foreach ($panier->getListePanier() as $produit): ?> <div class="card">
                    <div class="card-img"></div>
                    <div class="card-info">
                        <div><strong><?= htmlspecialchars($produit->getNom()) ?></strong></div>
                        <div>Prix unitaire : <?= number_format($produit->getPrix(), 2) ?> €</div>
                        <div class="quantity-control"> Quantité : <button>-</button> <span>1</span> <button>+</button> <span class="delete-btn">🗑</span> </div>
                        <div>Prix total : <?= number_format($produit->getPrix(), 2) ?> €</div>
                    </div>
                </div> <?php endforeach; ?> </div>
        <div class="summary">
            <h3>Résumé du panier</h3>
            <div>Total d’articles : <?= count($panier->getListePanier()) ?></div>
            <div>Total : <?= $panier->calculerTotalPanier() ?> €</div> 
            
            <input type="text" placeholder="Code promo"> 
            <button>Poursuivre la commande</button>
        </div>
    </div>
     <?php endif; ?>
</body>

</html>