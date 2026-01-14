<?php

namespace App\Controllers;

use App\Models\Produit\ProduitModel;
use App\Models\Produit\Categorie\EncensModel;

class Filters extends BaseController
{
    public function sortByPrice($query, $categorie)
    {
        $produitModel = new ProduitModel();
        $encensModel = new EncensModel();

        // On récupère les deux listes
        $parfums = $produitModel->orderBy("price", ($query === 'price-crst') ? 'ASC' : 'DESC')
            ->like('categorie', $categorie)
            ->findAll();

        return $parfums;
    }

    public function sortByAlpha($query, $categorie)
    {
        $produitModel = new ProduitModel();
        $encensModel = new EncensModel();

        // On récupère les deux listes
        $parfums = $produitModel->orderBy("name", ($query === 'alpha-crst') ? 'ASC' : 'DESC')
            ->like('categorie', $categorie)    
            ->findAll();
            
        return $parfums;
    }
}

