<form  method="post">
    <?= csrf_field() ?>

    <label for="username">Nom d'utilisateur</label>
    <input type="text" name="username" id="username" required>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password" required>

    <label for="group">Groupe</label>
    <select name="group" id="group">
        <option value="user" selected>User</option>
        <option value="admin">Admin</option>
    </select>

    <button type="submit">Créer</button>
</form>
<?php
var_dump($_POST);
?>