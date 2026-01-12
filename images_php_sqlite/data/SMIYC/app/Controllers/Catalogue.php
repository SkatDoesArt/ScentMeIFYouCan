<?php

namespace App\Controllers;

use App\Models\Avis\AvisModel;
use App\Models\Produit\ProduitModel;
use App\Models\Produit\Categorie\MarquesModel;

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
        if ($id === null) {
            $id = $this->request->getUri()->getSegment(3);
        }

        $model = new ProduitModel();
        $data['produit'] = $model->getById($id);

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
            'pager'         => $modelMarques->pager, // Indispensable pour les liens en bas de page
        ];
        
        return view('Pages/catalogue/marques', $data);
    }

    public function season()
    {
        return view('Pages/catalogue/saison');
    }
}