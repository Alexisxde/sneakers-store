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

# ADMIN
$routes->get('/users', 'User::all_users', ['filter' => 'auth']);
$routes->get('/logout', 'User::logout');

$routes->get('/add_sneaker', 'Sneaker::form_add_sneaker', ['filter' => 'auth']);
$routes->post('/add_sneaker', 'Sneaker::add_sneaker', ['filter' => 'auth']);
$routes->get('/status/(:any)', 'Sneaker::status/$1', ['filter' => 'auth']);
