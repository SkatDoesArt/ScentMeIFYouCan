<?php
use App\Entities\Users\User;
use App\Models\Produit\ProduitModel;
use App\Entities\Enums\Roles;

// Exemple d'utilisateur connecté (construit avec un tableau, comme l'Entity l'attend)
$client = new User([
    'idUser' => 2,
    'email' => 'martin.alice@example.com',
    'login' => 'client1',
    'passwordHash' => password_hash('password', PASSWORD_DEFAULT),
    'actif' => true,
    'role' => Roles::CLIENT->value,
]);

// Défensive: si la vue est appelée sans variable $panier, on la normalise en tableau vide
$panierModel = new \App\Models\Panier\PanierModel();
$panier = $panierModel->getPanierComplet(1) ?? [];

$produitModel = new ProduitModel();
$produitsDansPanier = [];

foreach ($panier as $ligne) {
    $idProduit = $ligne['id_produit'];
    $produit = $produitModel->find($idProduit);

    if ($produit) {
        $produitsDansPanier[] = [
                'produit' => $produit,
                'quantite' => $ligne['quantite'],
                'id_ligne_panier' => $ligne['id_ligne_panier']
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>css/panier.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>css/common.css">

    <script type="text/javascript" src="<?php echo base_url(); ?>js/reloadPage.js" defer></script>
</head>

<body>
<header id="header">
    <div id="header-container">
        <nav id="nav-upper">
            <h1 id="bigname"><a href="<?= base_url(); ?>">SMIYC</a></h1>
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
        <a href="<?= base_url()?>catalogue"><button class="btn-panier">Ajouter des produits</button></a>
    </div>
<?php else: ?>
    <div class="panier-container">
        <div class="panier">
            <?php foreach ($produitsDansPanier as $item):
                $produit = $item['produit'];
                $quantite = $item['quantite'];
                $id_ligne_panier=$item['id_ligne_panier'];
                ?>
                <div class="card">
                    <div class="card-img"></div>
                    <div class="card-info">
                        <div><strong><?= htmlspecialchars($produit->name) ?></strong></div>
                        <div>Prix unitaire : <?= number_format($produit->price, 2) ?> €</div>
                        <div class="quantity-control">
                            Quantité :
                            <a href="<?= base_url('cart/decrement/'.$id_ligne_panier); ?>"><span class="delete-btn">-</span></a>

                            <span><?= $quantite ?></span>
                            <a href="<?= base_url('cart/increment/'. $id_ligne_panier); ?>"><button>+</button></a>
                            <a href="<?= base_url('cart/delete/'. $id_ligne_panier );?>"><span class="delete-btn">🗑</span></a>


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
