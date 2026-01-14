<?php

namespace App\Controllers;

use App\Models\Avis\AvisModel;
use App\Models\Produit\Categorie\CremeModel;
use App\Models\Produit\ProduitModel;
use App\Models\Produit\Categorie\MarquesModel;
use App\Models\Produit\Categorie\EncensModel;
use CodeIgniter\HTTP\RedirectResponse;
use function PHPUnit\Framework\containsEqual;

class Catalogue extends BaseController
{
    public function shop(): string
    {
        $produits = new ProduitModel();
        $data['liste_produits'] = $produits->getDisponibles();

        return view('Pages/catalogue/shop', $data);
    }

    public function detail($id = null)
    {
        if ($id === null)
            $id = $this->request->getUri()->getSegment(3);

        // 1. Chercher dans les produits classiques
        $produitModel = new ProduitModel();
        $data['produit'] = $produitModel->find($id);

        // 2. Si pas trouvé, chercher dans les encens
        if (!$data['produit']) {
            $encensModel = new EncensModel();
            $data['produit'] = $encensModel->find($id);
        }

        if (!$data['produit']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $modelAvis = new AvisModel();
        $data['avis'] = $modelAvis->getAvisByProduit($id);

        return view('Pages/catalogue/product', $data);
    }

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

    public function saison()
    {
        return view('Pages/catalogue/saison');
    }

    public function season($saison)
    {
        $produitModel = new ProduitModel();
        $data['liste_produits'] = $produitModel->where('saison', $saison)->findAll();

        $data['query'] = null;
        $data['categorie'] = null;
        $data['is_search'] = true;

        return view('Pages/catalogue/shop', $data);
    }

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
            ->findAll();

        $data['query'] = $query;
        $data['categorie'] = null;
        $data['is_search'] = true;

        return view('Pages/catalogue/shop', $data);
    }

    public function filters($categorie = null)
    {
        $filter = $this->request->getGet('f');
        $brand = $this->request->getGet('brand');
        $price = $this->request->getGet('price');
        $season = $this->request->getGet('season');

        if (empty($filter) && empty($brand) && empty($price)) {
            return redirect()->to(base_url('catalogue?categorie=' . $categorie));
        }

        $produitModel = new ProduitModel();
        $encensModel = new EncensModel();
        $filterController = new Filters();
        $data['liste_produits'] = [];


        if ($filter == "price-crst" || $filter == "price-dcrst") {
            $data['liste_produits'] = array_merge($data['liste_produits'], $filterController->sortByPrice($filter, $categorie));
        } elseif ($filter == "alpha-crst" || $filter == "alpha-dcrst") {
            $data['liste_produits'] = array_merge($data['liste_produits'], $filterController->sortByAlpha($filter, $categorie));
        } elseif (!empty($brand)) {
            $data['liste_produits'] = array_merge($data['liste_produits'], $filterController->filterByBrand($brand, $categorie));
        } elseif (!empty($price)) {
            $data['liste_produits'] = array_merge($data['liste_produits'], $filterController->filterByPriceRange($price, $categorie));
        } else {
            return redirect()->to(base_url('catalogue?categorie=' . $categorie));
        }

        $data['price'] = $price;
        $data['filter'] = $filter;
        $data['query'] = null;
        $data['is_search'] = false;
        $data['categorie'] = $categorie;

        return view('Pages/catalogue/shop', $data);
    }
}

