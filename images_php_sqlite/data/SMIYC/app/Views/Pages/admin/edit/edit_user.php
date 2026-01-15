<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin/admin_dashboard.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/header.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin/add_user.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>js/admin/preview_photo.js" defer></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/admin/select_input_image.js" defer></script>
</head>
<body>
<?= view('Pages/partials/header', ['showCart' => false, 'showList' => false, 'showSearch' => false]) ?>

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
