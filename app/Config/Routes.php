<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');
$routes->get('quienes', 'Pages::quienes');
$routes->get('about', 'Pages::about');
$routes->get('register', 'Pages::register');
$routes->get('login', 'Pages::login');