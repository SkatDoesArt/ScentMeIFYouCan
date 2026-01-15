<?php

namespace App\Controllers;

use App\Models\Panier\PanierModel;
use App\Models\Panier\CommandeModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Commande extends BaseController
{
    public function index()
    {
        // Redirige vers le panier par défaut
        return redirect()->to(base_url('cart'));
    }

    /**
     * GET: affiche le formulaire de livraison
     */
    public function checkout()
    {
        if (!auth()->loggedIn()) {
            return redirect()->to(base_url('auth/login'));
        }

        $panierModel = new PanierModel();
        $cart = $panierModel->getPanierCompletByUser(auth()->id());

        if (empty($cart) || empty($cart[0])) {
            return redirect()->to(base_url('cart'))->with('error', 'Votre panier est vide.');
        }

        // Afficher la vue checkout (formulaire de livraison)
        return view('Pages/commande/checkout', [
            'cart' => $cart,
        ]);
    }

    /**
     * POST/GET: traite le formulaire de livraison (POST) ou affiche le récap depuis la session (GET)
     */
    public function review()
    {
        // Sécurité
        if (!auth()->loggedIn()) {
            return redirect()->to(base_url('auth/login'));
        }

        $panierModel = new PanierModel();
        $cart = $panierModel->getPanierCompletByUser(auth()->id());

        if (empty($cart)) {
            return redirect()->to(base_url('cart'))
                ->with('error', 'Votre panier est vide.');
        }

        // ======================
        // POST → PRG
        // ======================
        if ($this->request->getMethod() === 'POST') {

            $post = $this->request->getPost();

            $livraison = [
                'nom_complet' => esc($post['name'] ?? ''),
                'adresse' => trim($post['address'] ?? ''),
                'tel' => trim($post['tel'] ?? ''),
                'ville' => trim($post['city'] ?? ''),
                'code_postal' => trim($post['postal_code'] ?? ''),
                'pays' => trim($post['country'] ?? ''),
            ];

            foreach ($livraison as $value) {
                if ($value === '') {
                    return redirect()->to(base_url('commande/checkout'))
                        ->with('error', 'Veuillez renseigner toutes les informations de livraison.');
                }
            }

            session()->set('livraison', $livraison);

            // 🚨 ROUTE, PAS VUE
            return redirect()->to(base_url('commande/review'));
        }

        // ======================
        // GET → affichage
        // ======================
        $livraison = session()->get('livraison');

        if (!$livraison) {
            return redirect()->to(base_url('commande/checkout'));
        }

        return view('Pages/commande/review', [
            'cart' => $cart,
            'livraison' => $livraison,
        ]);
    }


    /**
     * POST: création finale de la commande (déjà routée sur POST '/commande')
     */
    public function create()
    {

        // Vérifie que c’est bien un POST
        if ($this->request->getMethod() !== 'POST') {
            throw new PageNotFoundException('Page introuvable');
        }

        // Debug : vérifier que le POST arrive

        if (!auth()->loggedIn()) {
            return redirect()->to(base_url('auth/login'));
        }

        $panierModel = new PanierModel();
        $cart = $panierModel->getPanierCompletByUser(auth()->id());

        // Empêcher la création si le panier est vide
        if (empty($cart) || empty($cart[0])) {
            return redirect()->to(base_url('cart'))->with('error', 'Impossible de créer une commande : votre panier est vide.');
        }

        $livraison = session()->get('livraison') ?? [];

        $commandeModel = new CommandeModel();
        $commande = $commandeModel->createCommande(auth()->id(), $cart, $livraison);
        $commandeId = $commandeModel->getInsertID();

        // nettoyer la session
        session()->remove('livraison');

        return redirect()->to(base_url('commande/status/' . $commandeId));
    }

    public function status(int $noCommand = 0)
    {
        return view('Pages/commande/status');
    }
}

