<?php

namespace App\Controllers;

class Catalogue extends BaseController
{
    public function index(): string
    {
        return view('Pages/produit/shop');
    }

    public function detail($id)
    {
        return "Détail du produit : " . $id;
    }

    public function search()
    {
        return "Recherche catalogue";
    }
}
