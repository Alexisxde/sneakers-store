<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::home');
$routes->get('/about-us', 'Home::aboutUs');
$routes->get('/contacts', 'Home::contacts');
$routes->get('/terms-conditions', 'Home::termsConditions');
$routes->get('/privacy-policy', 'Home::privacyPolicy');
$routes->get('/commercialization', 'Home::commercialization');
$routes->get('/sneakers', 'Sneaker::all_sneakers');
$routes->get('/sneakers/(:any)', 'Sneaker::one_sneaker/$1');
$routes->get('/login', 'User::login');
$routes->post('/login', 'User::login_user');
$routes->get('/register', 'User::register');
$routes->post('/register', 'User::create_user');
$routes->post('/add_cart', 'Cart::add_cart');
$routes->post('/delete_sneaker_cart', 'Cart::delete_sneaker_cart');
$routes->post('/destroy_sneakers_cart', 'Cart::destroy_sneakers_cart');

$routes->group('/', ['filter' => 'auth'], static function ($routes) {
  $routes->get('/logout', 'User::logout');
  $routes->get('/settings', 'User::settings');
  $routes->post('/settings', 'User::user_settings');
  $routes->get('/user_delete', 'User::user_delete');
  $routes->get('/checkout', 'Cart::checkout');
  $routes->post('/shop_user', 'Sale::shop_user');
  $routes->get('/sales', 'Sale::sales');
  $routes->get('/invoice/(:any)', 'Sale::invoice/$1');
});

$routes->group('/', ['filter' => 'authAdmin'], static function ($routes) {
  $routes->get('/sales_admin', 'Sale::sales_admin');
  $routes->get('/users', 'User::all_users');
  $routes->get('/status_user/(:any)', 'User::status_user/$1');
  $routes->get('/rol_user/(:any)', 'User::rol_user/$1');
  $routes->get('/messages', 'Message::all_messages');
  $routes->get('/add_sneaker', 'Sneaker::form_add_sneaker');
  $routes->post('/add_sneaker', 'Sneaker::add_sneaker');
  $routes->get('/edit_sneaker/(:any)', 'Sneaker::form_edit_sneaker/$1');
  $routes->post('/edit_sneaker', 'Sneaker::edit_sneaker');
  $routes->get('/edit_status/(:any)', 'Sneaker::status/$1');
});
