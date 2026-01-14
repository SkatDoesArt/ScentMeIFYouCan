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
                <li><a href="<?= base_url('admin/add/product') ?>">Ajouter un produit</a></li>
                <li><a href="<?= base_url('admin/users') ?>">Liste des utilisateurs</a></li>
                <li><a href="<?= base_url('admin/add/user') ?>">Ajouter un utilisateur</a></li>
                <li><a href="<?= base_url('admin/orders') ?>">Commandes</a></li>
                <li><a href="<?= base_url('admin/stock') ?>">Stocks</a></li>
            </ul>
        </div>

        <div id="infos">
            <h2>Raccourcis administration</h2>

            <!-- Nouvelle grille 2x2 -->
            <div class="admin-grid">
                <div class="grid-item">
                    <div>
                        <h3>Produits</h3>
                        <p>Consultez, modifiez ou supprimez des produits. Accédez rapidement à la liste ou créez un
                            nouveau produit.</p>
                    </div>
                    <div class="grid-actions">
                        <a class="btn" href="<?= base_url('admin/products') ?>">Voir la liste</a>
                        <a class="btn secondary" href="<?= base_url('admin/add/product') ?>">Ajouter</a>
                    </div>
                </div>

                <div class="grid-item">
                    <div>
                        <h3>Utilisateurs</h3>
                        <p>Gérez les comptes utilisateurs, leurs rôles et permissions. Consultez la liste des
                            utilisateurs inscrits.</p>
                    </div>
                    <div class="grid-actions">
                        <a class="btn" href="<?= base_url('admin/users') ?>">Voir les utilisateurs</a>
                        <a class="btn secondary" href="<?= base_url('admin/add/user') ?>">Ajouter</a>
                    </div>
                </div>

                <div class="grid-item">
                    <div>
                        <h3>Commandes</h3>
                        <p>Suivi des commandes passées, détails et statuts. Traitez ou annulez des commandes selon le
                            besoin.</p>
                    </div>
                    <div class="grid-actions">
                        <a class="btn" href="<?= base_url('admin/orders') ?>">Voir les commandes</a>
                    </div>
                </div>

                <div class="grid-item">
                    <div>
                        <h3>Stocks</h3>
                        <p>Consultez et mettez à jour les niveaux de stock pour chaque produit. Ajoutez des entrées de
                            stock rapidement.</p>
                    </div>
                    <div class="grid-actions">
                        <a class="btn" href="<?= base_url('admin/stock') ?>">Voir les stocks</a>
                        <a class="btn secondary" href="<?= base_url('admin/add/stocks') ?>">Ajouter</a>
                    </div>
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