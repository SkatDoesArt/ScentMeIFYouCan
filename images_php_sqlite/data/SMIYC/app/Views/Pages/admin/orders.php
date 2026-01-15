

<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Admin - Commandes</title>

   <link rel="stylesheet" href="<?= base_url() ?>css/header.css">
   <link rel="stylesheet" href="<?= base_url() ?>css/admin_order.css">
</head>

<body>

   <?= view('Pages/partials/header', ['showCart' => false, 'showList' => false, 'showSearch' => false]) ?>


<div class="container admin-orders">
   <div class="orders-card">

      <h2>Liste des commandes</h2>

      <?php if (! empty($liste_commande)): ?>
         <table class="orders-table" aria-describedby="orders-list">
            <thead>
               <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Client</th>
                  <th scope="col">Date</th>
                  <th scope="col">Statut</th>
                  <th scope="col">Actions</th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($liste_commande as $p): ?>
                  <tr>
                     <td><?= esc($p->getIdCommande()) ?></td>
                     <td><?= esc(auth()->getProvider()->findById($p->getUserID())->username) ?></td>
                     <td><?= esc($p->getDate()) ?></td>
                     <td>
                        <span class="order-status <?= esc($p->getStatut()) ?>">
                           <?= esc($p->getStatut()) ?>
                        </span>
                     </td>
                     <td>
                        <a href="<?= base_url('admin/edit/order/' . $p->getIdCommande()) ?>" class="action-btn" title="Éditer commande">
                           ✏️
                        </a>
                     </td>
                  </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
      <?php else: ?>
         <p>Aucune commande</p>
      <?php endif; ?>

   </div>
</div>


</body>

</html>