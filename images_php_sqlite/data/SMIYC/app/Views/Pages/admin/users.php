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
                <?php if ($user->inGroup('admin')): ?>
                    <a href="<?= base_url('admin/edit/role/' . $user->id . '/user') ?>">
                        Rétrograder
                    </a>
                <?php else: ?>
                    <a href="<?= base_url('admin/edit/role/' . $user->id . '/admin') ?>">
                        Promouvoir
                    </a>
                <?php endif; ?>
            </td>

          
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>

<?php else: ?>
    <p>Aucun utilisateur</p>
<?php endif; ?>
