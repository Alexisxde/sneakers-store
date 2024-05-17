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
$routes->get('/sneakers/(:alpha)', 'Sneaker::one_sneaker/$1');

$routes->get('/users', 'User::all_users');

$routes->get('/login', 'User::login');
$routes->post('/login', 'User::login_user');
$routes->get('/register', 'User::register');
$routes->post('/register', 'User::create_user');
$routes->get('/logout', 'User::logout');
