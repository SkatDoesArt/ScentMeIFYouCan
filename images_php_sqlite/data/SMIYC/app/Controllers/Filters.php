<?php

namespace App\Controllers;

use App\Models\Produit\ProduitModel;
use App\Models\Produit\Categorie\EncensModel;

class Filters extends BaseController
{
    public function sortByPrice($query)
    {
        $produitModel = new ProduitModel();
        $encensModel = new EncensModel();

        // On récupère les deux listes
        $parfums = $produitModel->orderBy("price", ($query === 'price-crst') ? 'ASC' : 'DESC')
            ->findAll();

        $encens = $encensModel->orderBy("price", ($query === 'price-crst') ? 'ASC' : 'DESC')
            ->findAll();

        // On fusionne les deux tableaux dans la variable attendue par la vue shop
        return array_merge($parfums, $encens);
    }

    public function sortByAlpha($query)
    {
        $produitModel = new ProduitModel();
        $encensModel = new EncensModel();

        // On récupère les deux listes
        $parfums = $produitModel->orderBy("name", ($query === 'alpha-crst') ? 'ASC' : 'DESC')
            ->findAll();

        $encens = $encensModel->orderBy("name", ($query === 'alpha-crst') ? 'ASC' : 'DESC')
            ->findAll();

        // On fusionne les deux tableaux dans la variable attendue par la vue shop
        return array_merge($parfums, $encens);
    }
}

