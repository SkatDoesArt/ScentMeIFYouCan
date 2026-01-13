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

    public function season()
    {
        return view('Pages/catalogue/saison');
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

    public function search()
    {
        $query = $this->request->getGet('q');

        if (empty($query)) {
            return redirect()->to(base_url('catalogue'));
        }

        $produitModel = new ProduitModel();

        // Une seule requête sur la table globale 'produit'
        $resultats = $produitModel
            ->groupStart() // Début de la parenthèse pour le filtre de recherche
            ->like('name', $query)
            ->orLike('marque', $query)
            ->groupEnd()
            ->findAll();

        $data['liste_produits'] = $resultats;
        $data['query'] = $query;
        $data['is_search'] = true;

        return view('Pages/catalogue/shop', $data);
    }

    public function filters()
    {
        $query = $this->request->getGet('f');

        if (empty($query)) {
            return redirect()->to(base_url('catalogue'));
        }

        $produitModel = new ProduitModel();
        $encensModel = new EncensModel();
        $filter = new Filters();

        if ($query == "price-crst" || $query == "price-dcrst") {
            $data['liste_produits'] = $filter->sortByPrice($query);
        } elseif ($query == "alpha-crst" || $query == "alpha-dcrst") {
            $data['liste_produits'] = $filter->sortByAlpha($query);
        }  else {
            return redirect()->to(base_url('catalogue?categorie=homme'));
        }

        // // On récupère les deux listes
        // $parfums = $produitModel->orderBy("price", ($query === 'price-crst') ? 'ASC' : 'DESC')
        //     ->findAll();

        // $encens = $encensModel->orderBy("price", ($query === 'price-crst') ? 'ASC' : 'DESC')
        //     ->findAll();
        // // On fusionne les deux tableaux dans la variable attendue par la vue shop
        // $data['liste_produits'] = array_merge($parfums, $encens);

        $data['query'] = $query;
        $data['is_search'] = false; // Pour afficher un titre spécifique

        return view('Pages/catalogue/shop', $data);
    }
}

