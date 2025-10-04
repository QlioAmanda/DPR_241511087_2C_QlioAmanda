<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'AuthController::login');
$routes->post('/login', 'AuthController::attemptLogin');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'auth']);

$routes->group('admin', ['filter' => ['auth', 'role']], function($routes) {
    $routes->get('anggota', 'AnggotaController::index');
    $routes->get('anggota/create', 'AnggotaController::create');
    $routes->post('anggota/store', 'AnggotaController::store');
    $routes->get('anggota/edit/(:num)', 'AnggotaController::edit/$1');
    $routes->post('anggota/update/(:num)', 'AnggotaController::update/$1');
    $routes->get('anggota/delete/(:num)', 'AnggotaController::delete/$1');
});
