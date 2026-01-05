<?php

namespace App\Controllers;

use App\Models\AvisModel;
use App\Models\ProduitModel;

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
        // Si aucun id reçu en paramètre, on va chercher le segment 3
        if ($id === null) {
            $id = $this->request->getUri()->getSegment(3);
        }

        // Récupération du produit (si tu veux l'afficher correctement)
        $model = new ProduitModel();
        $data['produit'] = $model->getById($id);

        // Récupération des avis du produit
        $modelAvis = new AvisModel();
        $data['avis'] = $modelAvis->getAvisByProduit($id);

        return view('Pages/catalogue/product', $data);
    }

}
