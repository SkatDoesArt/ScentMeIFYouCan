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
   $routes->get('/', 'Catalogue::shop'); 
    $routes->get('product/(:num)', 'Catalogue::detail/$1');
    $routes->get('search', 'Catalogue::search');
});


// ====================================================================
// PANIER
// ====================================================================
$routes->group('cart', function($routes) {
    $routes->get('/', 'Cart::index');
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
// ADMINISTRATION
// ====================================================================
$routes->group('admin', function($routes) {
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