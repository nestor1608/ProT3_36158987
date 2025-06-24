<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Pages::index');
$routes->get('quienes', 'Pages::quienes');
$routes->get('about', 'Pages::about');
$routes->match(['get', 'post'], 'register', 'UsuarioController::create');
$routes->post('register/store', 'UsuarioController::store');
$routes->match(['get', 'post'], 'login', 'LoginController::index');
$routes->post('login/auth', 'LoginController::auth');
$routes->get('logout', 'LoginController::logout');