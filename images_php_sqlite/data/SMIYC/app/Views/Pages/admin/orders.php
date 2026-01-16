<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Commandes</title>

    <link rel="stylesheet" href="<?= base_url('css/common.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/admin_order.css') ?>">
    
    <style>
        /* Structure Layout Impérative */
        body {
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background: #f7f8fb;
        }

        .admin-wrapper {
            display: flex;
            flex: 1;
        }

        .admin-main-content {
            flex-grow: 1;
            padding: 40px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-header h1 {
            margin: 0;
            font-size: 1.8rem;
            font-weight: 800;
            color: #111827;
        }

        .btn-add {
            background: #111827;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.2s;
        }
        .btn-add:hover { background: #374151; }

               /* Structure Layout Admin */
        .admin-wrapper {
            display: flex;
            min-height: calc(100vh - 70px); /* Ajuste selon la taille de ton header */
            background: #f7f8fb;
        }

        .admin-main-content {
            flex-grow: 1;
            padding: 2rem;
            overflow-y: auto;
        }

        /* Harmonisation de la grille pour l'espace admin */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 1.5rem;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        /* Sidebar styles (si pas déjà dans dashboard.css) */
        #admin-sidebar {
            width: 260px;
            background: #fff;
            border-right: 1px solid #e0e0e0;
            padding: 2rem 1rem;
            flex-shrink: 0;
        }
        #admin-sidebar ul { list-style: none; padding: 0; }
        #admin-sidebar a {
            display: block;
            padding: 0.8rem 1rem;
            color: #4a5568;
            text-decoration: none;
            border-radius: 8px;
            margin-bottom: 4px;
        }
        #admin-sidebar a.active {
            background: #ebf4ff;
            color: #2b6cb0;
            font-weight: 600;
        }
    </style>
</head>

<body>

<?= view('Pages/partials/header', ['showCart' => false, 'showList' => false, 'showSearch' => false]) ?>

<div class="admin-wrapper">
    <?= view('Pages/partials/admin_sidebar') ?>

    <main class="admin-main-content">
        <div class="orders-card">
            <h2>Liste des commandes</h2>

            <?php if (!empty($liste_commande)): ?>
                <table class="orders-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Client</th>
                            <th>Date</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($liste_commande as $p): ?>
                            <tr>
                                <td><strong>#<?= esc($p->getIdCommande()) ?></strong></td>
                                <td><?= esc(auth()->getProvider()->findById($p->getUserID())->username ?? 'Inconnu') ?></td>
                                <td><?= date('d/m/Y H:i', strtotime($p->getDate())) ?></td>
                                <td>
                                    <span class="order-status <?= strtolower(esc($p->getStatut())) ?>">
                                       <?= esc($p->getStatut()) ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/edit/commandes/' . $p->getIdCommande()) ?>" class="action-btn">
                                        ✏️
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div style="text-align: center; padding: 40px; color: #a0aec0;">
                    <p>Aucune commande enregistrée pour le moment.</p>
                </div>
            <?php endif; ?>
        </div>
    </main>
</div>

</body>
</html>