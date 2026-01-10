<form method="post" enctype="multipart/form-data">

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

    <input  required type="text" name="name" value="<?= old('name') ?>">
    <input  required type="number" step="0.01" name="price" value="<?= old('price') ?>">
    <input  required type="text" name="description" value="<?= old('description') ?>">
    <input  required type="number" name="niveauPrestige" value="<?= old('niveauPrestige') ?>">
    <input  required type="number" name="notation" value="<?= old('notation') ?>">
    <input  required type="number" name="taille" value="<?= old('taille') ?>">
    <input  required type="number" name="quantiteRestante" value="<?= old('quantiteRestante') ?>">
    <input  required type="text" name="marque" value="<?= old('marque') ?>">
    <input  required type="text" name="categorie" value="<?= old('categorie') ?>">
    <input  required type="file" name="image_name">

    <button type="submit">Ajouter</button>
</form>

<?php 
echo '\n';
var_dump($_POST);

echo '\n';

var_dump($_FILES);
echo '\n';

var_dump($_REQUEST);


?>