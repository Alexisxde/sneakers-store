<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::home');
$routes->get('/about-us', 'Home::aboutUs');
$routes->get('/contacts', 'Home::contacts');
$routes->get('/payment-methods', 'Home::payments');
$routes->get('/products', 'Home::products');
