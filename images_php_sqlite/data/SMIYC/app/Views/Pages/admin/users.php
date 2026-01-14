<?php /**
 * Styled admin users list using site header and admin_users.css
 */ ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Utilisateurs</title>

    <link rel="stylesheet" href="<?= base_url() ?>css/card_produit.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/header.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/admin_users.css">
</head>

<body>

<?= view('Pages/partials/header', ['showCart' => false, 'showList' => false, 'showSearch' => false]) ?>

<div class="container">
    <div class="users-card">

        <h2 style="margin-top:0;">Liste des utilisateurs</h2>

        <?php if (!empty($users)): ?>
            <table class="users-table" aria-describedby="user-list">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Groupes</th>
                    <th scope="col">Date de création</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= esc($user->id) ?></td>
                        <td><?= esc($user->username) ?></td>
                        <td><?= esc($user->email) ?></td>
                        <td><?= esc(implode(', ', $user->getGroups())) ?></td>
                        <td>
                            <?= $user->created_at
                                    ? esc($user->created_at->toLocalizedString('dd MMMM yyyy'))
                                    : '—' ?>
                        </td>
                        <td>
                            <div class="user-actions">

                                <a href="<?= base_url('admin/edit/user/' . $user->id) ?>" title="Éditer utilisateur"
                                   aria-label="Éditer utilisateur">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"
                                         fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M12 20h9"/>
                                        <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4Z"/>
                                    </svg>
                                </a>

                                <?php if ($user->inGroup('admin')): ?>
                                    <form action="<?= base_url('admin/edit/role/' . $user->id . '/user') ?>"
                                          method="post">
                                        <?= csrf_field() ?>
                                        <button type="submit" title="Rétrograder" aria-label="Rétrograder">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                                 height="20" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M12 5v14"/>
                                                <path d="M19 12l-7 7-7-7"/>
                                            </svg>
                                        </button>
                                    </form>
                                <?php else: ?>
                                    <form action="<?= base_url('admin/edit/role/' . $user->id . '/admin') ?>"
                                          method="post">
                                        <?= csrf_field() ?>
                                        <button type="submit" title="Promouvoir admin" aria-label="Promouvoir admin">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                                 height="20" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M12 19V5"/>
                                                <path d="M5 12l7-7 7 7"/>
                                            </svg>
                                        </button>
                                    </form>
                                <?php endif; ?>

                                <form action="<?= base_url('admin/delete/user/' . $user->id) ?>" method="post"
                                      onsubmit="return confirm('Supprimer cet utilisateur ?');">
                                    <?= csrf_field() ?>
                                    <button type="submit" title="Supprimer utilisateur"
                                            aria-label="Supprimer utilisateur">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                             height="20" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M3 6h18"/>
                                            <path d="M8 6v14"/>
                                            <path d="M16 6v14"/>
                                            <path d="M10 6V4h4v2"/>
                                        </svg>
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <?php if (isset($pager)): ?>
                <div class="pagination-container" style="margin-top:18px; display:flex; justify-content:center;">
                    <?= $pager->links('group_users', 'default_full') ?>
                </div>
            <?php endif; ?>

        <?php else: ?>
            <p>Aucun utilisateur</p>
        <?php endif; ?>

    </div>
</div>

</body>

</html>
