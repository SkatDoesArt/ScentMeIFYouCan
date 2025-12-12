<?php

namespace App\Controllers;

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
}
