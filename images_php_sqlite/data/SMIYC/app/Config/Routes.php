<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ---------- Page d’accueil ----------
$routes->get('/', 'Home::index');

service('auth')->routes($routes);

// ====================================================================
// AUTHENTIFICATION
// ====================================================================
$routes->group('auth', function($routes) {
    $routes->get('login', '\CodeIgniter\Shield\Controllers\LoginController::loginView');
    $routes->get('register', '\CodeIgniter\Shield\Controllers\RegisterController::registerView');
    $routes->get('forgot-password', 'Auth::forgotPassword');    
    $routes->get('profile', 'Auth::profile', ['as' => 'user-profile']);
    $routes->get('profile/edit', 'Auth::editProfile');
});


// ====================================================================
// CATALOGUE
// ====================================================================
$routes->group('catalogue', function($routes) {
    //Pages Principale
    $routes->get('marques', 'Catalogue::brand');
   $routes->get('/', 'Catalogue::shop');
    //Afficher un produit en particulier
    $routes->get('product/(:num)', 'Catalogue::detail/$1');
    $routes->get('search', 'Catalogue::search');
    //Renvoie à la liste des marques
    $routes->get('/(:segment)','Catalogue::detail/$1/$2');
    //Renvoie à la liste des produits de la catégorie  et de la marques
    $routes->get('/(:segment)/(:segment)','Catalogue::detail/$1/$2');
   
});

// Route to support legacy French URL /panier/ajouter/{id}
$routes->match(['GET','POST'], 'panier/ajouter/(:num)', 'Cart::addProduct/$1');


// ====================================================================
// PANIER
// ====================================================================
$routes->group('cart', function($routes) {
    $routes->get('/', 'Cart::index'); // Affiche le panier

    // Ajouter un produit au panier (POST ou AJAX)
    $routes->match(['POST'], 'add/(:num)', 'Cart::addProduct/$1');

    // Augmenter la quantité
    $routes->match(['GET','POST'], 'increment/(:num)', 'Cart::addQuantite/$1');

    // Diminuer la quantité
    $routes->match(['GET','POST'], 'decrement/(:num)', 'Cart::decrementQuantite/$1');

    // Supprimer une ligne du panier
    $routes->match(['GET','POST'], 'delete/(:num)', 'Cart::delete/$1');
});


// ====================================================================
// PAIEMENT
// ====================================================================
$routes->group('payment', function($routes) {
    $routes->get('/', 'Payment::index');
    $routes->get('success', 'Payment::success');
    $routes->get('error', 'Payment::error');
});


// ====================================================================
// COMMANDES
// ====================================================================
$routes->group('commande', function($routes) {
    $routes->get('status/(:num)', 'Commande::status/$1');
    $routes->get('history', 'Commande::history');
});

// ====================================================================
// DASHBOARD
// ====================================================================
$routes->group('dashboard', function($routes) {
    $routes->get('infos_perso', 'Dashboard::infos_perso');
    $routes->get('langue_region', 'Dashboard::langue_region');
    $routes->get('adresses', 'Dashboard::adresses');
    $routes->get('moyen_paiement', 'Dashboard::moyen_paiement');
    $routes->get('suivi_commande', 'Dashboard::suivi_commande');
    $routes->get('historique_commandes', 'Dashboard::historique_commandes');
});

// ====================================================================
// ADMINISTRATION
// ====================================================================
$routes->group('admin', function($routes) {

    // ==========================
    // Groupe "add" → pour créer des entités
    // ==========================
    $routes->group('add', function($routes){
        // Route pour créer un produit
        // Accepte à la fois GET (affichage du formulaire) et POST (soumission)
        $routes->match(['GET','POST'], 'product', 'Admin::addProduit');

        // Route pour créer un utilisateur
        $routes->match(['GET','POST'], 'user', 'Admin::addProduct');

        // Route pour créer des stocks
        $routes->match(['GET','POST'], 'stocks', 'Admin::addStocks');

        // Route pour créer des catégories
        $routes->match(['GET','POST'], 'categories', 'Admin::addCategories');
    });

    // ==========================
    // Groupe "edit" → pour modifier des entités existantes
    // ==========================
    $routes->group('edit', function($routes){
        // Modifier un produit par ID
        $routes->match(['GET','POST'], 'product/(:num)', 'Admin::editProduit');

        // Modifier un utilisateur par ID
        $routes->match(['GET','POST'], 'user/(:num)', 'Admin::editUser');

        // Modifier des stocks par ID
        $routes->match(['GET','POST'], 'stocks/(:num)', 'Admin::editStocks');

        // Modifier des commandes par ID
        $routes->match(['GET','POST'], 'commandes/(:num)', 'Admin::editCommandes');
    });

    // ==========================
    // Groupe "delete" → pour supprimer des entités
    // ==========================
    $routes->group('delete', function($routes){
        // Supprimer un produit par ID
        $routes->match(['GET','POST'], 'product/(:num)', 'Admin::deleteProduit');

        // Supprimer un utilisateur par ID
        $routes->match(['GET','POST'], 'user/(:num)', 'Admin::deleteUser');

        // Supprimer des stocks par ID
        $routes->match(['GET','POST'], 'stocks/(:num)', 'Admin::deleteStocks');

        // Supprimer une commande par ID
        $routes->match(['GET','POST'], 'commande/(:num)', 'Admin::deleteCommande');
    });

    // ==========================
    // Routes principales / tableau de bord
    // ==========================
    $routes->get('/', 'Admin::dashboard'); // Tableau de bord admin
    $routes->get('products', 'Admin::products');   // Liste des produits
    $routes->get('users', 'Admin::users');         // Liste des utilisateurs
    $routes->get('orders', 'Admin::orders');       // Liste des commandes
    $routes->get('stock', 'Admin::stock');         // Liste des stocks
});


// ====================================================================
// EMAILS (pour test uniquement)
// ====================================================================
$routes->group('emails', function($routes) {
    $routes->get('order-confirmation', 'Emails::orderConfirmation');
});


/* service('auth')->routes($routes); */

