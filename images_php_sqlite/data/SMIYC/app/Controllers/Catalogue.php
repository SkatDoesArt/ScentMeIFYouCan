<?php

namespace App\Controllers;

use App\Models\Avis\AvisModel;
use App\Models\Produit\Categorie\CremeModel;
use App\Models\Produit\Categorie\EncensModel;
use App\Models\Produit\Categorie\MarquesModel;
use App\Models\Produit\ProduitModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Catalogue extends BaseController
{
    /**
     * Affiche la page de boutique avec les produits disponibles.
     *
     * Maintenant utilise la pagination à 15 éléments (groupe 'group1') et transmet
     * l'objet pager à la vue pour l'affichage des liens de pagination.
     *
     * @return string Vue rendue
     */
    public function shop(): string
    {
        $produits = new ProduitModel();

        // Récupère uniquement les produits disponibles avec pagination
        $data['liste_produits'] = $produits->where('quantiteRestante >', 0)->paginate(12, 'group1');
        $data['pager'] = $produits->pager;

        return view('Pages/catalogue/shop', $data);
    }


    /**
     * Affiche le détail d'un produit.
     *
     * @param int|null $id Identifiant du produit (optionnel)
     * @return string Vue du produit
     */
    public function detail($id = null)
    {
        if ($id === null) {
            $id = $this->request->getUri()->getSegment(3);
        }

        $produitModel = new ProduitModel();
        $produitBrut = $produitModel->find($id);

        if (!$produitBrut) {
            throw PageNotFoundException::forPageNotFound();
        }

        // --- LOGIQUE DE CONVERSION ---
        // On récupère le type pour savoir quelle entité instancier
        $type = strtolower(trim($produitBrut->type ?? ''));

        if ($type === 'encens') {
            // On transforme l'objet générique en EncensEntity
            $produit = new \App\Entities\EncensEntity($produitBrut->toArray());
        } elseif ($type === 'cremes' || $type === 'creme') {
            // On transforme l'objet générique en CremeEntity
            $produit = new \App\Entities\CremeEntity($produitBrut->toArray());
        } else {
            // Par défaut (parfums), on garde l'entité classique
            $produit = $produitBrut;
        }

        $data['produit'] = $produit;

        // Récupération des avis
        $modelAvis = new AvisModel();
        $data['avis'] = $modelAvis->getAvisByProduit($id);

        return view('Pages/catalogue/product', $data);
    }

    /**
     * Affiche la liste complète des produits avec pagination.
     *
     * @return string Vue rendue
     */
    public function all(): string
    {
        $produitModel = new ProduitModel();

        $data = [
            // On récupère tout sans le ->where('type', ...)
            'liste_produits' => $produitModel->paginate(20, 'group1'),
            'pager' => $produitModel->pager,
            'query' => null,
            'categorie' => null,
            'is_search' => false,
        ];

        return view('Pages/catalogue/shop', $data);
    }

    /**
     * Affiche les parfums avec pagination.
     *
     * @return string Vue rendue
     */
    public function parfums()
    {
        $produitModel = new ProduitModel();

        $data = [

            'liste_produits' => $produitModel->where('type', 'parfums')->paginate(20, 'group1'),
            // On récupère l'objet pager pour l'affichage des liens
            'pager' => $produitModel->pager,
            'query' => null,
            'categorie' => null,
            'is_search' => false,
        ];

        return view('Pages/catalogue/shop', $data);
    }

    /**
     * Affiche la page des marques.
     *
     * @return string Vue rendue
     */
    public function brand()
    {
        $modelMarques = new MarquesModel();

        // Utilisation de paginate(8) pour afficher 8 marques par page
        $data = [
            'liste_marques' => $modelMarques->paginate(12),
            'pager' => $modelMarques->pager, // Indispensable pour les liens en bas de page
        ];

        return view('Pages/catalogue/marques', $data);
    }

    /**
     * Affiche les produits d'une marque donnée.
     *
     * @param string $marque Nom de la marque
     * @return string Vue rendue
     */
    public function marque($marque)
    {
        if (!$marque) {
            return redirect()->to(base_url('catalogue/marques'));
        }

        $produitModel = new ProduitModel();
        $data['liste_produits'] = $produitModel->where('marque', $marque)->findAll();

        $data['query'] = null;
        $data['categorie'] = null;
        $data['is_search'] = false;

        return view('Pages/catalogue/shop', $data);
    }

    /**
     * Affiche la sélection par saison.
     *
     * @return string Vue rendue
     */
    public function saison()
    {
        return view('Pages/catalogue/saison');
    }

    /**
     * Affiche les produits d'une saison donnée.
     *
     * @param string $saison Nom de la saison
     * @return string Vue rendue
     */
    public function season($saison)
    {
        $produitModel = new ProduitModel();
        $data['liste_produits'] = $produitModel->where('saison', $saison)->findAll();

        $data['query'] = null;
        $data['categorie'] = null;
        $data['is_search'] = true;

        return view('Pages/catalogue/shop', $data);
    }

    /**
     * Affiche la liste des encens avec pagination.
     *
     * @return string Vue rendue
     */
    public function encens()
    {
        $model = new EncensModel();
        // On utilise paginate au lieu de findAll
        // Le premier paramètre est le nombre d'éléments par page
        // Le deuxième paramètre est le groupe de pagination (optionnel)
        $data = [
            'lesEncens' => $model->where('type', 'encens')->paginate(10, 'group1'), // 10 produits par page
            'pager' => $model->pager
        ];
        return view('Pages/catalogue/encens', $data);
    }

    /**
     * Affiche la liste des crèmes avec pagination.
     *
     * @return string Vue rendue
     */
    public function creme()
    {
        $model = new CremeModel();
        // On utilise paginate au lieu de findAll
        // Le premier paramètre est le nombre d'éléments par page
        // Le deuxième paramètre est le groupe de pagination (optionnel)
        $data = [
            'lesCremes' => $model->where('type', 'creme')->paginate(10, 'group1'), // 10 produits par page
            'pager' => $model->pager
        ];
        return view('Pages/catalogue/creme', $data);
    }

    /**
     * Affiche la liste des produits exotiques avec pagination.
     *
     * @return string Vue rendue
     */
    public function exotique()
    {
        $model = new ProduitModel();
        // On utilise paginate au lieu de findAll
        // Le premier paramètre est le nombre d'éléments par page
        // Le deuxième paramètre est le groupe de pagination (optionnel)
        $data = [
            'lesExotiques' => $model->where('origine', 'Exotique')->paginate(10, 'group1'), // 10 produits par page
            'pager' => $model->pager
        ];
        return view('Pages/catalogue/exotique', $data);
    }

    /**
     * Recherche des produits par requête GET 'q'.
     *
     * @return string Vue rendue
     */
    public function search()
    {
        $query = $this->request->getGet('q');

        if (empty($query)) {
            return redirect()->to(base_url('catalogue'));
        }

        $produitModel = new ProduitModel();

        // Une seule requête sur la table globale 'produit'
        $data['liste_produits'] = $produitModel
            ->groupStart() // Début de la parenthèse pour le filtre de recherche
            ->like('name', $query)
            ->orLike('marque', $query)
            ->groupEnd()
            ->paginate(15, 'group1');

        // Pager pour la vue (liens de pagination)
        $data['pager'] = $produitModel->pager;

        $data['query'] = $query;
        $data['categorie'] = null;
        $data['is_search'] = true;

        return view('Pages/catalogue/shop', $data);
    }

    /**
     * Applique des filtres (marque, prix, type) et retourne la liste filtrée.
     *
     * @param string|null $categorie Catégorie à filtrer
     * @return string Vue rendue
     */
    public function filters($categorie = null)
    {
        // 1. On récupère les paramètres de l'URL
        $filter = $this->request->getGet('f');
        $brand = $this->request->getGet('brand');
        $price = $this->request->getGet('price');
        $type = $this->request->getGet('type') ?? 'parfums'; // Par défaut parfums

        $produitModel = new ProduitModel();

        // 2. Construction de la requête (Query Builder)
        // On filtre par type (parfums/creme/etc.)
        $produitModel->where('type', $type);

        // On filtre par catégorie (homme, femme, etc.) si ce n'est pas "all"
        if ($categorie && $categorie !== 'all') {
            $produitModel->where('categorie', $categorie);
        }

        // Ajout des filtres optionnels
        if (!empty($brand)) {
            $produitModel->where('marque', $brand);
        }

        if (!empty($price)) {
            $produitModel->where('price <=', $price);
        }

        // Gestion du tri
        if ($filter == "price-crst") {
            $produitModel->orderBy('price', 'ASC');
        } elseif ($filter == "price-dcrst") {
            $produitModel->orderBy('price', 'DESC');
        } elseif ($filter == "alpha-crst") {
            $produitModel->orderBy('name', 'ASC');
        }

        // 3. PAGINATION : C'est ici que le changement opère
        // On utilise paginate() au lieu de findAll() pour supporter les pages
        $data = [
            'liste_produits' => $produitModel->paginate(10, 'group1'),
            'pager' => $produitModel->pager,
            'categorie' => $categorie,
            'type' => $type,
            'filter' => $filter,
            'price' => $price,
            'is_search' => false,
            'query' => null
        ];

        return view('Pages/catalogue/shop', $data);
    }
}

