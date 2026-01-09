<?php

namespace App\Controllers;

use App\Models\Produit\ProduitModel;

class Home extends BaseController
{
    public function index(): string
    {
        $model = new ProduitModel();

        $data = [
            'images' => $model->getByCategorie('NoCap')
        ];

        return view('Pages/accueil/index', $data);
    }
}