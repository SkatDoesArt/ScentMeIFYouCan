<?php

namespace Config;

$routes = Services::routes();

// Chargement des routes par défaut de CodeIgniter
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

// --------------------------------------------------------------------
// Routes personnalisées pour les vues
// --------------------------------------------------------------------

// ---------- Authentification ----------
$routes->get('login', 'Auth::login');
$routes->get('register', 'Auth::register');
$routes->get('forgot-password', 'Auth::forgotPassword');
$routes->get('profile', 'Auth::profile');
$routes->get('profile/edit', 'Auth::editProfile');

// ---------- Catalogue et produits ----------
$routes->get('catalogue', 'Catalogue::index');
$routes->get('product/(:num)', 'Catalogue::detail/$1');
$routes->get('search', 'Catalogue::search');

// ---------- Panier ----------
$routes->get('cart', 'Cart::index');
$routes->get('checkout', 'Cart::checkout');

// ---------- Paiement ----------
$routes->get('payment', 'Payment::index');
$routes->get('payment/success', 'Payment::success');
$routes->get('payment/error', 'Payment::error');

// ---------- Commandes ----------
$routes->get('orders/status/(:num)', 'Orders::status/$1'); // statut d'une commande
$routes->get('orders/history', 'Orders::history');

// ---------- Administration ----------
$routes->get('admin/dashboard', 'Admin::dashboard');
$routes->get('admin/products', 'Admin::products');
$routes->get('admin/users', 'Admin::users');
$routes->get('admin/orders', 'Admin::orders');
$routes->get('admin/stock', 'Admin::stock');

// ---------- Emails ----------
$routes->get('emails/order-confirmation', 'Emails::orderConfirmation');

