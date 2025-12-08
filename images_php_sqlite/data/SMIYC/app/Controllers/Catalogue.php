<?php 
namespace App\Controllers;

use Config\View;

class Catalogue extends BaseController {
     public function shop(): string { 
           return view('Pages/catalogue/shop');
     }
     public function detail():string{
            return view('Pages/catalogue/product');
     }
} 