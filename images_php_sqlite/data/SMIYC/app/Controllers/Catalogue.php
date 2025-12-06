<?php 
namespace App\Controllers;
class Catalogue extends BaseController {
     public function shop(): string { 


           return view('Pages/catalogue/shop');
     }
} 