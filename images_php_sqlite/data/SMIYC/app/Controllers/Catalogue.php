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

    public function brand()
    {
        $modelMarques = new MarquesModel();
        
        // On récupère toutes les marques (elles seront retournées comme objets MarquesEntity)
        $data['liste_marques'] = $modelMarques->findAll(); 
        
        return view('Pages/catalogue/marques', $data);
    }
}
