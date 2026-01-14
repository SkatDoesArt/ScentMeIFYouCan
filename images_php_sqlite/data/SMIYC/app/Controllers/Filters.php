<?php

namespace App\Controllers;

use App\Models\Produit\ProduitModel;
use App\Models\Produit\Categorie\EncensModel;

class Filters extends BaseController
{
    public function sortByPrice($query, $categorie, $brand = null)
    {
        $produitModel = new ProduitModel();

        if (isset($brand)) {
            // On récupère les deux listes
            $parfums = $produitModel->orderBy("price", ($query === 'price-crst') ? 'ASC' : 'DESC')
                ->like('categorie', $categorie)
                ->where('marque', $brand)
                ->findAll();
        } else {
            // On récupère les deux listes
            $parfums = $produitModel->orderBy("price", ($query === 'price-crst') ? 'ASC' : 'DESC')
                ->like('categorie', $categorie)
                ->findAll();
        }

        return $parfums;
    }

    public function sortByAlpha($query, $categorie, $brand = null)
    {
        $produitModel = new ProduitModel();

        // On récupère les deux listes
        if (isset($brand)) {
            $parfums = $produitModel->orderBy("name", ($query === 'alpha-crst') ? 'ASC' : 'DESC')
                ->like('categorie', $categorie)
                ->where('marque', $brand)
                ->findAll();
        } else {
            $parfums = $produitModel->orderBy("name", ($query === 'alpha-crst') ? 'ASC' : 'DESC')
                ->like('categorie', $categorie)
                ->findAll();
        }
        return $parfums;
    }

    public function filterByBrand($brand, $categorie)
    {
        $produitModel = new ProduitModel();

        $produits = $produitModel->where('marque', $brand)
        ->like('categorie', $categorie)
        ->findAll();

        return $produits;
    }

    public function filterByPriceRange($price, $categorie)
    {
        $produitModel = new ProduitModel();

        $produits = $produitModel->where('price <=', $price)
        ->like('categorie', $categorie)
        ->findAll();

        return $produits;
    }
}

