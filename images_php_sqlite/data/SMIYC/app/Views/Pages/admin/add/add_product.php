<?php if (session()->getFlashdata('success')): ?>
    <div style="color: green; font-weight: bold;">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>


    <form action="<?= base_url('admin/add/product') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <label>Nom</label>
    <input type="text" name="name">

    <label>Prix</label>
    <input type="number" step="0.01" name="price" >

    <label>Description</label>
    <input type="text" name="description" >

    <label>Niveau prestige</label>
    <input type="number" name="niveauPrestige">

    <label>Notation</label>
    <input type="number" min="0" max="5" name="notation" >

    <label>Taille</label>
    <input type="number" name="taille" >

    <label>Quantité</label>
    <input type="number" name="quantiteRestante" >

    <label>Marque</label>
    <input type="text" name="marque" >

    <label>Catégorie</label>
    <input type="text" name="categorie" >

    <label>Image</label>
    <input type="file" name="image_name" required accept="image/png, image/jpeg">

    <button type="submit">Ajouter le produit</button>
</form>

<?php 
var_dump($_POST);
var_dump($_FILES);
?>