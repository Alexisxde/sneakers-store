<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::home');
$routes->get('/about-us', 'Home::aboutUs');
$routes->get('/contacts', 'Home::contacts');
$routes->get('/products', 'Home::products');
$routes->get('/terms-conditions', 'Home::termsConditions');
$routes->get('/privacy-policy', 'Home::privacyPolicy');
$routes->get('/commercialization', 'Home::commercialization');
