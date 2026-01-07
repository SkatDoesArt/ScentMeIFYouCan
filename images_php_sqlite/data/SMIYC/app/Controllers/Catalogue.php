<?php

namespace App\Controllers;

use App\Models\AvisModel;
use App\Models\ProduitModel;

class Catalogue extends BaseController
{
    public function shop(string $categorie, ?string $marque = null): string
    {
        $produits = new ProduitModel();

        

        if ($marque !== null) {
            $query = $query->getByMarque($marque);
        }

        $data['liste_produits'] =  $produits->getByCategorie($categorie);
        $data['categorie'] = $categorie;
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

    public function marques()
    {
        return view('Pages/catalogue/marques');
    }
    public function filter(){
        return  redirect()->back();
    } 
}