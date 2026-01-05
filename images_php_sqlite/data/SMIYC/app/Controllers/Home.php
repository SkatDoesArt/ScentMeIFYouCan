<?php

namespace App\Controllers;
use App\Models\NoCapModel;

class Home extends BaseController
{
    public function index(): string
    {
        $noCapModel = new NoCapModel();

        $data = [
            // Récupère toutes les images converties en NoCapEntity
            'images' => $noCapModel->orderBy('order', 'ASC')->findAll(),
        ];

        return view('Pages/accueil/index', $data);
    }
}
