<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Utilisateurs</title>

    <link rel="stylesheet" href="<?= base_url('css/common.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('css/admin_users.css') ?>">

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
            
            <div class="page-header">
                <h1>Gestion des Utilisateurs</h1>
                <a href="<?= base_url('admin/add/user') ?>" class="btn-add">+ Nouveau</a>
            </div>

            <div class="users-card">
                <?php if (!empty($users)): ?>
                    <table class="users-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Groupes</th>
                                <th>Créé le</th>
                                <th style="text-align:right;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><strong>#<?= esc($user->id) ?></strong></td>
                                    <td><?= esc($user->username) ?></td>
                                    <td><?= esc($user->email) ?></td>
                                    <td>
                                        <span class="badge <?= $user->inGroup('admin') ? 'badge-admin' : 'badge-user' ?>">
                                            <?= esc(implode(', ', $user->getGroups())) ?>
                                        </span>
                                    </td>
                                    <td><?= $user->created_at ? esc($user->created_at->toLocalizedString('dd/MM/yyyy')) : '—' ?></td>
                                    <td>
                                        <div class="user-actions">
                                            <a href="<?= base_url('admin/edit/user/' . $user->id) ?>" class="action-icon edit" title="Modifier">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                                            </a>

                                            <?php $target = $user->inGroup('admin') ? 'user' : 'admin'; ?>
                                            <form action="<?= base_url('admin/edit/role/' . $user->id . '/' . $target) ?>" method="post">
                                                <?= csrf_field() ?>
                                                <button type="submit" class="action-icon role" title="Changer le rôle">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 3h5v5"/><path d="M4 20L21 3"/><path d="M21 16v5h-5"/><path d="M15 15l6 6"/><path d="M4 4l5 5"/></svg>
                                                </button>
                                            </form>

                                            <form action="<?= base_url('admin/delete/user/' . $user->id) ?>" method="post" onsubmit="return confirm('Supprimer cet utilisateur ?');">
                                                <?= csrf_field() ?>
                                                <button type="submit" class="action-icon delete" title="Supprimer">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div style="text-align:center; padding: 40px; color: #64748b;">
                        Aucun utilisateur trouvé.
                    </div>
                <?php endif; ?>
            </div>
        </main>
    </div>
</body>
</html>