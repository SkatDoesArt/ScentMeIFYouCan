<?php

namespace App\Controllers;

use App\Models\ProduitModel; // On utilise le modèle principal

class Home extends BaseController
{
    public function index(): string
    {
        $model = new ProduitModel();

        $data = [
            // On utilise la méthode que tu as créée dans ProduitModel
            // Note : bien écrire 'NoCap' sans espace comme dans ton Seeder
            'images' => $model->getByCategorie('NoCap')
        ];

        return view('Pages/accueil/index', $data);
    }
}