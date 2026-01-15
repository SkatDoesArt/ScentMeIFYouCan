<?php

namespace App\Controllers;

use App\Entities\Panier\CommandeEntity;
use App\Entities\Panier\LigneCommandeEntity;
use App\Entities\ProduitEntity;
use App\Models\Panier\CommandeModel;
use App\Models\Panier\PanierModel;
use App\Services\Commande\CommandeValidator;
use App\Services\Commande\Validation\AddressValidationHandler;
use App\Services\Commande\Validation\PaymentValidationHandler;
use App\Services\Commande\Validation\StockValidationHandler;
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
        if (session()->has('livraison')) {
            $livraison = session()->get('livraison');
        }

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
            'cart' => $cart, 'livraison' => $livraison ?? null
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

        // --- Build CommandeEntity from cart + livraison ---
        $commandeEntity = new CommandeEntity();
        $commandeEntity->setUserId(auth()->id());
        $commandeEntity->setDateCommande(date('Y-m-d H:i:s'));
        $commandeEntity->setStatut('Brouillon');

        // Convert cart items into LigneCommandeEntity objects so validators can use them
        $lignes = [];
        foreach ($cart[0] as $item) {
            $produit = $item['produit'];
            // Try to adapt the produit entity if needed
            if ($produit instanceof ProduitEntity) {
                $produitEntity = $produit;
            } else {
                // fallback minimal wrapper
                $produitEntity = new ProduitEntity((array)$produit);
            }
            $ligneEntity = new LigneCommandeEntity($produitEntity, (int)$item['quantite']);
            $lignes[] = $ligneEntity;
        }
        $commandeEntity->setLignesCommande($lignes);

        // Fournir les informations de livraison à l'entité (utilisé par AddressValidationHandler)
        if (!empty($livraison)) {
            $commandeEntity->setLivraison($livraison);
        }

        // construit la COR
        $validator = new CommandeValidator();
        $addressHandler = new AddressValidationHandler();
        $paymentHandler = new PaymentValidationHandler();
        $stockHandler = new StockValidationHandler();

        $addressHandler->setNext($paymentHandler)->setNext($stockHandler);
        $validator->setFirstHandler($addressHandler);

        // Execute validation chain
        $valid = $validator->validate($commandeEntity);

        if (!$valid) {
            // Le validator renvoie false si une condition échoue
            return redirect()->to(base_url('commande/checkout'))
                ->with('error', 'Impossible de valider la commande : vérifiez vos informations et le stock.');
        }

        $commandeModel = new CommandeModel();
        // Create the order (commande) now that validation passed
        $commande = $commandeModel->createCommande(auth()->id(), $cart, $livraison);

        // Vider le panier pour l'utilisateur courant (supprime les lignes)
        $panierModel->ClearPanier(auth()->id());

        // nettoyer la session
        session()->remove('livraison');

        return redirect()->to(base_url('dashboard/historique_commandes/'));
    }

    public function status(int $noCommand = 0)
    {
        return view('Pages/commande/status');
    }
}

