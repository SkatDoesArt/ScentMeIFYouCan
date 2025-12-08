<?php 
namespace App\Controllers;

use Config\View;

class Cart extends BaseController {
     public function index(): string { 
           return view('Pages/panier/panier');
     }

} 