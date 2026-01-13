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

    <!-- Styles locaux rapides pour la grille admin -->
    <style>
        .admin-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.25rem;
            align-items: stretch;
        }

        @media (max-width: 700px) {
            .admin-grid {
                grid-template-columns: 1fr;
            }
        }

        .grid-item {
            background: #fff;
            border: 1px solid #e6e6e6;
            border-radius: 8px;
            padding: 1rem;
            box-shadow: 0 6px 18px rgba(18, 18, 18, 0.04);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 140px;
        }

        .grid-item h3 {
            margin: 0 0 0.5rem 0;
            font-size: 1.1rem;
            color: #222;
        }

        .grid-item p {
            margin: 0 0 1rem 0;
            color: #555;
            flex: 1 0 auto;
        }

        .grid-actions {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 0.45rem 0.8rem;
            background: #2b6cb0;
            color: #fff;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.95rem;
        }

        .btn.secondary {
            background: #edf2f7;
            color: #2d3748;
            border: 1px solid #e2e8f0;
        }
    </style>

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
                        <p>Consultez, modifiez ou supprimez des produits. Accédez rapidement à la liste ou créez un nouveau produit.</p>
                    </div>
                    <div class="grid-actions">
                        <a class="btn" href="<?= base_url('admin/products') ?>">Voir la liste</a>
                        <a class="btn secondary" href="<?= base_url('admin/add/product') ?>">Ajouter</a>
                    </div>
                </div>

                <div class="grid-item">
                    <div>
                        <h3>Utilisateurs</h3>
                        <p>Gérez les comptes utilisateurs, leurs rôles et permissions. Consultez la liste des utilisateurs inscrits.</p>
                    </div>
                    <div class="grid-actions">
                        <a class="btn" href="<?= base_url('admin/users') ?>">Voir les utilisateurs</a>
                        <a class="btn secondary" href="<?= base_url('admin/add/user') ?>">Ajouter</a>
                    </div>
                </div>

                <div class="grid-item">
                    <div>
                        <h3>Commandes</h3>
                        <p>Suivi des commandes passées, détails et statuts. Traitez ou annulez des commandes selon le besoin.</p>
                    </div>
                    <div class="grid-actions">
                        <a class="btn" href="<?= base_url('admin/orders') ?>">Voir les commandes</a>
                    </div>
                </div>

                <div class="grid-item">
                    <div>
                        <h3>Stocks</h3>
                        <p>Consultez et mettez à jour les niveaux de stock pour chaque produit. Ajoutez des entrées de stock rapidement.</p>
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