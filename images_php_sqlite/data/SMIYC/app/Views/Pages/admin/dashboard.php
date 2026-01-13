<?php
$user = auth()->user();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/common.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/index.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/dashboard.css">

    <title>Admin - Tableau de bord</title>
</head>

<body>
<?= view('Pages/partials/header', ['showCart' => true, 'showList' => false]) ?>

<div id="body">
    <h1>Administration</h1>
    <div id="body-content">
        <div id="categories">
            <ul>
                <!-- Liens vers les pages d'administration -->
                <li><a href="<?= base_url('admin/dashboard') ?>"><strong>Tableau de bord</strong></a></li>
                <li><a href="<?= base_url('admin/products') ?>">Liste des produits</a></li>
                <li><a href="<?= base_url('admin/add/') ?>">Ajouter un produit</a></li>
                <li><a href="<?= base_url('admin/users') ?>">Liste des utilisateurs</a></li>
                <li><a href="<?= base_url('admin/addUser') ?>">Ajouter un utilisateur</a></li>
                <li><a href="<?= base_url('admin/orders') ?>">Commandes</a></li>
                <li><a href="<?= base_url('admin/stock') ?>">Stocks</a></li>
            </ul>
        </div>

        <div id="infos">
            <h2>Raccourcis administration</h2>

            <div class="admin-cards">
                <div class="card">
                    <h3>Produits</h3>
                    <p>Consultez et gérez les produits.</p>
                    <a class="btn" href="<?= base_url('admin/products') ?>">Voir la liste</a>
                    <a class="btn" href="<?= base_url('admin/addProduit') ?>">Ajouter</a>
                </div>

                <div class="card">
                    <h3>Utilisateurs</h3>
                    <p>Gérer les comptes utilisateurs et leurs rôles.</p>
                    <a class="btn" href="<?= base_url('admin/users') ?>">Voir les utilisateurs</a>
                    <a class="btn" href="<?= base_url('admin/addUser') ?>">Ajouter</a>
                </div>

                <div class="card">
                    <h3>Commandes</h3>
                    <p>Suivi et gestion des commandes.</p>
                    <a class="btn" href="<?= base_url('admin/orders') ?>">Voir les commandes</a>
                </div>

                <div class="card">
                    <h3>Stocks</h3>
                    <p>Consulter et gérer les stocks.</p>
                    <a class="btn" href="<?= base_url('admin/stock') ?>">Voir les stocks</a>
                    <a class="btn" href="<?= base_url('admin/addStocks') ?>">Ajouter</a>
                </div>
            </div>

            <!-- Déconnexion rapide -->
            <div style="margin-top:1.2rem;">
                <a href="<?= base_url('auth/logout') ?>" class="btn">Se déconnecter</a>
            </div>
        </div>
    </div>
</div>

<?= view('Pages/partials/footer') ?>
</body>

</html>