    <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin/add_user.css">

<link rel="stylesheet" href="style.css">
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
                <input type="text" name="username" id="username" required
                value="<?= esc($user->username) ?>"
                >
            </div>


            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required
                value="<?= esc($user->email) ?>"
                >
                
            </div>


            <div class="form-group"><label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" required
                value="<?= esc($user->getPassword()) ?>"
                
                >
            </div>



            <div class="form-group"> <label for="group">Groupe</label>
                <select name="group" id="group">
                    <option value="user" selected>User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>


            <button type="submit">Créer</button>
        </div>

    </form>
</div>
