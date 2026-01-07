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
    // Routes fixes / spécifiques en premier
    $routes->get('product/(:num)', 'Catalogue::detail/$1'); // Afficher un produit
    $routes->get('search', 'Catalogue::search'); //
    $routes->get('marques','Catalogue::marques'); //Affiche la liste des marques

    // Routes dynamiques après
    $routes->get('(:segment)/(:segment)', 'Catalogue::shop/$1/$2'); 
    $routes->get('(:segment)', 'Catalogue::shop/$1');
});

// ====================================================================
// PANIER
// ====================================================================
$routes->group('cart', function($routes) {
    $routes->get('/', 'Cart::index'); // Affiche le panier

    // Augmenter la quantité
    $routes->match(['get', 'post'], 'increment/(:num)', 'Cart::addQuantite/$1');

    // Diminuer la quantité
    $routes->match(['get', 'post'], 'decrement/(:num)', 'Cart::decrementQuantite/$1');

    // Supprimer une ligne du panier
    $routes->match(['get', 'post'], 'delete/(:num)', 'Cart::delete/$1');
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
    $routes->group('add',function($routes){
        $routes->post('product', 'Admin::AddProduit');
        
        $routes->get( 'product', 'Admin::AddProduit');
    });
    $routes->get('dashboard', 'Admin::dashboard');
    $routes->get('products', 'Admin::products');
    $routes->get('users', 'Admin::users');
    $routes->get('orders', 'Admin::orders');
    $routes->get('stock', 'Admin::stock');
});


// ====================================================================
// EMAILS (pour test uniquement)
// ====================================================================
$routes->group('emails', function($routes) {
    $routes->get('order-confirmation', 'Emails::orderConfirmation');
});


/* service('auth')->routes($routes); */