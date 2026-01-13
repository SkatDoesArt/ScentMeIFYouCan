<?php if (! empty($users)): ?>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Groupes</th>
                <th>Date de création</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user->id ?></td>
                    <td><?= esc($user->username) ?></td>
                    <td><?= esc($user->email) ?></td>
                    <td><?= implode(', ', $user->getGroups()) ?></td>
                    <td>
                        <?= $user->created_at
                            ? esc($user->created_at->toLocalizedString('dd MMMM yyyy'))
                            : '—' ?>
                    </td>
                    <td>
                        <div class="flex gap-3 items-center">


                            <!-- EDIT USER -->
                            <a href="<?= base_url('admin/edit/user/' . $user->id) ?>" title="Éditer utilisateur" class="text-blue-600 hover:text-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 20h9" />
                                    <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4Z" />
                                </svg>
                            </a>

                            <!-- PROMOTE / DEMOTE -->
                            <?php if ($user->inGroup('admin')): ?>
                                <!-- DEMOTE -->
                                <form action="<?= base_url('admin/edit/role/' . $user->id . '/user') ?>" method="post" style="display:inline;">
                                    <?= csrf_field() ?>
                                    <button type="submit" title="Rétrograder" class="text-orange-600 hover:text-orange-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M12 5v14" />
                                            <path d="M19 12l-7 7-7-7" />
                                        </svg>
                                    </button>
                                </form>
                            <?php else: ?>
                                <!-- PROMOTE -->
                                <form action="<?= base_url('admin/edit/role/' . $user->id . '/admin') ?>" method="post" style="display:inline;">
                                    <?= csrf_field() ?>
                                    <button type="submit" title="Promouvoir admin" class="text-green-600 hover:text-green-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M12 19V5" />
                                            <path d="M5 12l7-7 7 7" />
                                        </svg>
                                    </button>
                                </form>
                            <?php endif; ?>


                            <!-- DELETE USER -->
                            <form action="<?= base_url('admin/delete/user/' . $user->id) ?>" method="post" style="display:inline;"
                                onsubmit="return confirm('Supprimer cet utilisateur ?');">
                                <?= csrf_field() ?>
                                <button type="submit" title="Supprimer utilisateur" class="text-red-600 hover:text-red-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M3 6h18" />
                                        <path d="M8 6v14" />
                                        <path d="M16 6v14" />
                                        <path d="M10 6V4h4v2" />
                                    </svg>
                                </button>
                            </form>

                        </div>
                    </td>



                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

<?php else: ?>
    <p>Aucun utilisateur</p>
<?php endif; ?>