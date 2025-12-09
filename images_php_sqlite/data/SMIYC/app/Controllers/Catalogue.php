<?php 
namespace App\Controllers;
use App\Models\ProduitModel;
use Config\View;

class Catalogue extends BaseController {
     public function shop(): string { 
              $produits = new ProduitModel();

        $data['liste_produits'] = $produits->getDisponibles();
           return view('Pages/catalogue/shop',$data);
     }
     public function detail():string{
            return view('Pages/catalogue/product');
     }
} 