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
// Rutas de administración
$routes->group('admin', ['filter' => 'auth:admin'], function($routes) {
    $routes->get('dashboard', 'AdminController::dashboard');
    $routes->get('usuarios', 'AdminController::usuarios');
    $routes->match(['get', 'post'], 'usuarios/editar/(:num)', 'AdminController::editarUsuario/$1');
    $routes->post('usuarios/actualizar/(:num)', 'AdminController::actualizarUsuario/$1');
    $routes->get('usuarios/eliminar/(:num)', 'AdminController::eliminarUsuario/$1');
});