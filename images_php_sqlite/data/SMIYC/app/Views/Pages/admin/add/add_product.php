   <!DOCTYPE html>
   <html lang="fr">

   <head>
       <meta charset="UTF-8">
       <title>Ajouter un produit</title>
       <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin/add_product.css">
       <script type="text/javascript" src="<?php echo base_url(); ?>js/preview_photo.js" defer></script>

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
                       <input type="text" name="categorie" required>
                   </div>

                   <div class="form-group">
                       <label>Quantité restante</label>
                       <input type="number" name="quantiteRestante" required>
                   </div>

                   <div class="form-group">
                       <label>Marque</label>
                       <input type="text" name="marque" required>
                   </div>

                   <!-- IMAGE -->
                   <div class="form-group image-group">
                       <label>Image du produit</label>
                       <input type="file" name="image_name" id="image-input" required>

                       <div class="image-preview">
                           <img id="new-image" alt="Aperçu image">
                       </div>
                   </div>

                   <div class="button-wrapper">
                       <button type="submit">Ajouter</button>
                   </div>


               </div>
           </form>
       </div>


   </body>

   </html>