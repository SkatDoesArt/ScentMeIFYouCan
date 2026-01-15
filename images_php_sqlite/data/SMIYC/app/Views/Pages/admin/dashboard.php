<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/common.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/dashboard.css') ?>">
    <title>Admin - Tableau de bord</title>
    
    <style>
        /* Structure de base pour l'administration */
        .admin-wrapper {
            display: flex;
            min-height: calc(100vh - 80px); /* Ajuster selon la hauteur de votre header */
            background: #f4f7f6;
        }

        /* Sidebar */
        #admin-sidebar {
            width: 260px;
            background: #fff;
            border-right: 1px solid #e0e0e0;
            padding: 2rem 1rem;
            flex-shrink: 0;
        }

        #admin-sidebar ul { list-style: none; padding: 0; }
        #admin-sidebar li { margin-bottom: 0.5rem; }
        #admin-sidebar a {
            display: block;
            padding: 0.8rem 1rem;
            color: #4a5568;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.2s;
        }
        #admin-sidebar a:hover, #admin-sidebar a.active {
            background: #ebf4ff;
            color: #2b6cb0;
            font-weight: 600;
        }

        /* Contenu principal */
        .admin-main-content {
            flex-grow: 1;
            padding: 2rem;
            overflow-y: auto;
        }

        /* Grille des raccourcis (votre CSS existant optimisé) */
        .admin-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 1.5rem;
        }
        .grid-item {
            background: #fff;
            padding: 1.5rem;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body>
    <?= view('Pages/partials/header', ['showCart' => false]) ?>

    <div class="admin-wrapper">
        <?= view('Pages/partials/admin_sidebar') ?>

        <main class="admin-main-content">
            <h1>Raccourcis administration</h1>
            
            <div class="admin-grid">
                <div class="grid-item">
                    <h3>Produits</h3>
                    <p>Gérez votre inventaire, modifiez les prix et les descriptions.</p>
                    <div class="grid-actions">
                        <a class="btn" href="<?= base_url('admin/products') ?>">Voir la liste</a>
                        <a class="btn secondary" href="<?= base_url('admin/add/product') ?>">Ajouter</a>
                    </div>
                </div>

                <div class="grid-item">
                    <h3>Utilisateurs</h3>
                    <p>Contrôlez les accès et gérez les comptes clients.</p>
                    <div class="grid-actions">
                        <a class="btn" href="<?= base_url('admin/users') ?>">Liste</a>
                        <a class="btn secondary" href="<?= base_url('admin/add/user') ?>">Ajouter</a>
                    </div>
                </div>

                <div class="grid-item">
                    <h3>Commandes</h3>
                    <p>Suivez l'état des ventes et les livraisons en cours.</p>
                    <div class="grid-actions">
                        <a class="btn" href="<?= base_url('admin/orders') ?>">Voir les commandes</a>
                    </div>
                </div>

                <!-- <div class="grid-item">
                    <h3>Stocks</h3>
                    <p>Alertes de stock bas et mise à jour des quantités.</p>
                    <div class="grid-actions">
                        <a class="btn" href="<?= base_url('admin/stock') ?>">Gérer</a>
                    </div>
                </div> -->
            </div>
        </main>
    </div>

    <?= view('Pages/partials/footer') ?>
</body>
</html>