<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Ajouter un utilisateur</title>

    <link rel="stylesheet" href="<?= base_url() ?>css/card_produit.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/header.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/admin/add_user.css">
</head>

<body>

<?= view('Pages/partials/header', ['showCart' => false, 'showList' => false, 'showSearch' => false]) ?>

<div class="container">
    <div class="admin-card">
        <h2>Ajouter un utilisateur</h2>
        <form method="post">
            <?= csrf_field() ?>

            <?php if (!empty($success)): ?>
                <p style="color:green"><?= esc($success) ?></p>
            <?php endif; ?>

            <?php if (!empty($errors)): ?>
                <ul style="color:red">
                    <?php foreach ($errors as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <div class="form-grid">
                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" name="username" id="username" required>
                </div>


                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>


                <div class="form-group"><label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" required>
                </div>



                <div class="form-group"> <label for="group">Groupe</label>
                    <select name="group" id="group">
                        <option value="user" selected>User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>


                <div class="button-wrapper">
                    <button type="submit">Créer</button>
                </div>
            </div>

        </form>
    </div>
</div>

</body>

</html>
