<?php

namespace App\Controllers;


use App\Models\Produit\ProduitModel;

class Home extends BaseController
{
    /**
     * Affiche la page d'accueil avec une sélection de produits.
     *
     * @return string Vue rendue
     */
    public function index(): string
    {
        // echo "Bienvenue sur la page d'accueil!";
        $model = new ProduitModel();

        $data = [
            'images' => $model->getByCategorie('NoCap'),
        ];

        // dd($data);

        return view('Pages/accueil/index', $data);
        // return "Hello World!";
    }
}