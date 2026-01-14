   <!DOCTYPE html>
   <html lang="fr">

   <head>
       <meta charset="UTF-8">
       <title>Ajouter un produit</title>
       <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin/add_product.css">
       <script type="text/javascript" src="<?php echo base_url(); ?>js/admin/preview_photo_add.js" defer></script>
       <script type="text/javascript" src="<?php echo base_url(); ?>js/admin/select_input_image.js" defer></script>

   </head>

   <body>

       <div class="admin-card">
           <h2>Ajouter un produit</h2>

           <form method="post" enctype="multipart/form-data">
               <?= csrf_field() ?>

               <div class="form-grid">

                   <div class="form-group">
                       <label>Nom</label>
                       <input type="text" name="name" required>
                   </div>

                   <div class="form-group">
                       <label>Prix (€)</label>
                       <input type="number" step="0.01" name="price" required>
                   </div>

                   <div class="form-group">
                       <label>Taille</label>
                       <input type="number" name="taille" required>
                   </div>

                   <div class="form-group">
                       <label>Description</label>
                       <input type="text" name="description" required>
                   </div>

                   <div class="form-group">
                       <label>Niveau prestige</label>
                       <input type="number" name="niveauPrestige" required>
                   </div>

                   <div class="form-group">
                       <label>Notation (0 à 5)</label>
                       <input type="number" min="0" max="5" name="notation" required>
                   </div>

                   <div class="form-group">
                       <label>Catégorie</label>
                       <input type="text" name="categorie" >
                   </div>

                   <div class="form-group">
                       <label>Quantité restante</label>
                       <input type="number" name="quantiteRestante" required>
                   </div>

                   <div class="form-group">
                       <label>Marque</label>
                       <input type="text" name="marque" required>
                   </div>

                   <div class="form-group">
                       <label>Type</label>
                       <input type="text" name="type" required>
                   </div>


                   <div class="form-group">
                       <label>Type Peau</label>
                       <input type="text" name="typePeau" required>
                   </div>


                   <div class="form-group">
                       <label>Origine</label>
                       <input type="text" name="origine" required>
                   </div>


                   <div class="form-group">
                       <label>Duree Combustion</label>
                       <input type="text" name="dureeCombustion" required>
                   </div>


                   <div class="form-group">
                       <label>Saison</label>
                       <input type="text" name="saison" >
                   </div>
                   <!-- Selection du type d'image -->
                   <select name="image_type" id="image-type" required>
                       <option value="">-- Choisir le type d’image --</option>
                       <option value="file">Fichier</option>
                       <option value="url">Lien</option>
                   </select>

                   <!-- Affichage de l'image -->
                   <div class="form-group image-group" id="file-group" style="display:none;">
                       <label>Image du produit (fichier)</label>
                       <input type="file" name="image_name" id="image-input" accept="image/*">

                       <div class="image-preview">
                           <img id="file-preview" alt="Aperçu image fichier">
                       </div>
                   </div>

                   <div class="form-group image-group" id="url-group" style="display:none;">
                       <label>Lien de l’image</label>
                       <input type="url" name="image_url" id="image-url" placeholder="https://example.com/image.jpg">

                       <div class="image-preview">
                           <img id="url-preview" alt="Aperçu image lien">
                       </div>
                   </div>




                   <div class="button-wrapper">
                       <button type="submit">Ajouter</button>
                   </div>


               </div>
           </form>

<!-- Afichage du message renvoyé par le controlleur -->
           <?php if (session()->getFlashdata('success')) : ?>
    <div class="message success">
        <p><?= esc(session()->getFlashdata('success')) ?></p>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')) : ?>
    <div class="message error">
        <p><?= esc(session()->getFlashdata('error')) ?></p>
    </div>
<?php endif; ?>

       </div>


   </body>

   </html>