<?php

namespace App\Controllers;

use App\Models\Panier\LignePanierModel;
use App\Models\Panier\PanierModel;
use Config\View;

class Cart extends BaseController
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
        [$items, $total] = $panierModel->getPanierCompletByUser(auth()->id());

        return view('Pages/panier/panier', [
            'isLoggedIn' => true,
            'items' => $items,
            'totalPrix' => $total
        ]);
    }


    // Ajoute un produit au panier (créé la ligne ou incrémente la quantité)
    public function addProduct(int $idProduit)
    {
        if (!auth()->loggedIn()) {
            return redirect()->to(base_url('auth/login'));
        }

        $userId = auth()->id();

        $panierModel = new PanierModel();
        $ligneModel  = new LignePanierModel();

        // 1. panier garanti
        $idPanier = $panierModel->getOrCreatePanier($userId);

        // 2. ajout produit
        $ligneModel->addProduit($idPanier, $idProduit, 1);

        return redirect()->to(base_url('cart'));
    }

    // Augmente la quantité d'un produit
    public function addQuantite(int $id_ligne_panier)
    {
        $lignePanierModel = new LignePanierModel();
        $lignePanierModel->incrementQuantite($id_ligne_panier);

        return redirect()->to(base_url('cart')); // Recharge la page panier
    }

    // Diminue la quantité d'un produit
    public function decrementQuantite(int $id_ligne_panier)
    {
        $lignePanierModel = new LignePanierModel();
        $lignePanierModel->decrementQuantite($id_ligne_panier);

        return redirect()->to(base_url('cart'));  // Recharge la page panier
    }

    // Supprime une ligne de panier
    public function delete(int $id_ligne_panier)
    {
        $lignePanierModel = new LignePanierModel();
        $lignePanierModel->delete($id_ligne_panier);

        return redirect()->to(base_url('cart'));  // Recharge la page panier
    }
}
