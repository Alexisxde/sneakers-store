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
$routes->get('/logout', 'User::logout');

$routes->group('/', ['filter' => 'auth'], static function ($routes) {
  $routes->get('/users', 'User::all_users');
  $routes->get('/messages', 'Message::all_messages');
  $routes->get('/add_sneaker', 'Sneaker::form_add_sneaker');
  $routes->post('/add_sneaker', 'Sneaker::add_sneaker');
  $routes->get('/edit_sneaker/(:any)', 'Sneaker::form_edit_sneaker/$1');
  $routes->post('/edit_sneaker', 'Sneaker::edit_sneaker');
  $routes->get('/edit_status/(:any)', 'Sneaker::status/$1');
});
