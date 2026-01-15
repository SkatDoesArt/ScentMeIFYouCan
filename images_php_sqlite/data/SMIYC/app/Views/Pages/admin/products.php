<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Liste des Produits</title>

    <link rel="stylesheet" href="<?= base_url('css/common.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('css/dashboard.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('css/card_produit.css'); ?>">

    <style>
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
            
            <div class="page-header">
                <h1>Gestion des Produits</h1>
                <a href="<?= base_url('admin/add/product') ?>" class="btn"> + Ajouter un produit</a>
            </div>

            <div class="grid">
                <?php if (!empty($liste_produits)): ?>
                    <?php foreach ($liste_produits as $p): ?>
                        <div class="product-card">
                            <a href="<?= base_url('admin/edit/product/' . $p->getId()) ?>" class="card">
                                <img src="<?= esc($p->getUrl()) ?>" alt="<?= esc($p->getNom()) ?>" loading="lazy">
                                <div class="info">
                                    <span class="product-name"><?= esc($p->getNom()) ?></span>
                                    <strong class="product-price">
                                        <?= number_format($p->getPrix(), 2, ',', ' ') ?> €
                                    </strong>
                                </div>
                            </a>

                            <div class="card-bottom">
                                <form method="post" action="<?= base_url('admin/edit/add_quantite/product/' . $p->getId()) ?>">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="qty-btn plus" title="Augmenter">+</button>
                                </form>

                                <span class="stock" title="Quantité en stock">
                                    <?= esc($p->quantiteRestante) ?>
                                </span>

                                <form method="post" action="<?= base_url('admin/edit/quantite/product/' . $p->getId()) ?>">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="qty-btn minus" title="Diminuer">−</button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="no-results">
                        <p>Aucun produit trouvé dans la base de données.</p>
                        <a href="<?= base_url('admin/dashboard') ?>" class="btn">Retour au tableau de bord</a>
                    </div>
                <?php endif; ?>
            </div>

            <?php if (isset($pager)): ?>
                <div class="pagination-container" style="margin-top: 2rem;">
                    <?= $pager->links('group1', 'default_full') ?>
                </div>
            <?php endif; ?>

        </main>
    </div>

    <?= view('Pages/partials/footer') ?>

</body>
</html>