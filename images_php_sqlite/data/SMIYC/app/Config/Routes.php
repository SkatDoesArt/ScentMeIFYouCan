<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ---------- Page d’accueil ----------
$routes->get('/', 'Home::index');


// ====================================================================
// AUTHENTIFICATION
// ====================================================================
$routes->group('auth', function($routes) {
    $routes->get('auth/login', 'Auth::login');
    $routes->get('register', 'Auth::register');
    $routes->get('forgot-password', 'Auth::forgotPassword');    

    $routes->get('profile', 'Auth::profile');
    $routes->get('profile/edit', 'Auth::editProfile');
});


// ====================================================================
// CATALOGUE
// ====================================================================
$routes->group('catalogue', function($routes) {
    $routes->get('/', 'Catalogue::index');
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
$routes->group('orders', function($routes) {
    $routes->get('status/(:num)', 'Orders::status/$1');
    // $routes->get('history', 'Orders::history');
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
