<?php

namespace App\Controllers;

use App\Models\Panier\PanierModel;
use App\Models\CommandeModel;

class Commande extends BaseController
{
    public function index()
    {
        if (!auth()->loggedIn()) {
            return view('Pages/panier/panier', [
                'isLoggedIn' => false,
                'items' => [],
                'totalPrix' => 0
            ]);
        }

        $panierModel = new PanierModel();
        $cart = $panierModel->getPanierCompletByUser(auth()->id());
        $commandeModel = new CommandeModel();
        $commande = $commandeModel->createCommande(auth()->id(), $cart);

        return view('Pages/commande/commande', [
            'isLoggedIn' => true,
            'cart' => $cart
        ]);
    }

    public function status(int $noCommand = 0)
    {
        return view('Pages/commande/status');
    }

}