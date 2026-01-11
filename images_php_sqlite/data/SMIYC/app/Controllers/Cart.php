<?php

namespace App\Controllers;

use App\Models\Panier\LignePanierModel;
use App\Models\Panier\PanierModel;
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


    // Ajoute un produit au panier (créé la ligne ou incrémente la quantité)
    public function addProduct(int $id_produit)
    {
        // Vérifie si l'utilisateur est connecté
        if (auth()->loggedIn()) {
            $id = user_id();

            // Récupère le panier de l'utilisateur
            $panierModel = new PanierModel();
            $panier = $panierModel->where('id_user', $id)->first();
            dd($panier);

            // Redirige vers la page panier
            return redirect()->to(base_url('cart'));
        } else {
            // ajouter les elements à une session temporaire
            $session = session();

            // Format: ['cart' => [id_produit => quantite, ...]]
            $cart = $session->get('cart') ?? [];

            if (isset($cart[$id_produit])) {
                $cart[$id_produit] += 1;
            } else {
                $cart[$id_produit] = 1;
            }

            $session->set('cart', $cart);
            $session->setFlashdata('message', 'Produit ajouté au panier (session)');

            // Retourne à la page précédente
            return redirect()->back();
        }
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
