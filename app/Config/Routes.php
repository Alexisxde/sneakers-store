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

$routes->get('/products', 'Producto::all_products');
$routes->get('/products/(:num)', 'Producto::one_products/$1');

$routes->get('/users', 'Usuario::all_users');
$routes->get('/login', 'Home::login');
$routes->get('/register', 'Home::register');
