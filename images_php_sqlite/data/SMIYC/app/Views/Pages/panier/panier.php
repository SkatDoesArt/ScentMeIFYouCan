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
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>SMIYC/public/css/panier.css">
    
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>SMIYC/public/css/common.css">
    <title>Panier</title>


</head>
<body>
  <header id="header">
    <div id="header-container">
<!--       <div id="menu-toggle">
        <i class="fas fa-bars"></i>
      </div> -->
      <div id="retour-fleche">

      </div>
      <div id="retour">
        <a href=""></a>
      </div>
      <nav id="nav-upper">
        <h1 id="bigname">SMIYC</h1>
      </nav>
    </div>

  </header>

<h2>Récaputilatif de votre panier</h2>
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
