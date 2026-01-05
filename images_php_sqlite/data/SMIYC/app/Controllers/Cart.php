<?php

namespace App\Controllers;

use App\Models\LignePanierModel;
use App\Models\PanierModel;
use Config\View;

class Cart extends BaseController
{
      public function index(): string
      {
            $panierModel = new PanierModel();
            $panier = $panierModel->getPanierComplet(1);

            // La clé 'panier' sera le nom de la variable dans la vue
            return view('Pages/panier/panier', ['panier' => $panier]);
      }




    // Augmente la quantité d'un produit
    public function addQuantite(int $id_ligne_panier)
    {
        $lignePanierModel = new LignePanierModel();
        $lignePanierModel->incrementQuantite($id_ligne_panier);

        return redirect()->to(base_url(relativePath:'SMIYC/public/cart/')); // Recharge la page panier
    }

    // Diminue la quantité d'un produit
    public function decrementQuantite(int $id_ligne_panier)
    {
        $lignePanierModel = new LignePanierModel();
        $lignePanierModel->decrementQuantite($id_ligne_panier);

        return redirect()->to(base_url(relativePath:'SMIYC/public/cart/'));  // Recharge la page panier
    }

    // Supprime une ligne de panier
    public function delete(int $id_ligne_panier)
    {
        $lignePanierModel = new LignePanierModel();
        $lignePanierModel->delete($id_ligne_panier);

        return redirect()->to(base_url(relativePath:'SMIYC/public/cart/'));  // Recharge la page panier
    }
}





