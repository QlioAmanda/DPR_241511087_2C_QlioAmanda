<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Rute untuk Otentikasi (Login/Logout)
$routes->get('/', 'AuthController::login');
$routes->get('login', 'AuthController::login'); // Alias untuk login
$routes->post('login', 'AuthController::attemptLogin');
$routes->get('logout', 'AuthController::logout'); // <-- PASTIKAN BARIS INI ADA

// Rute setelah login
$routes->get('dashboard', 'DashboardController::index', ['filter' => 'auth']);
$routes->get('anggota', 'PublicController::anggota', ['filter' => 'auth']);

// Grup Rute KHUSUS ADMIN
$routes->group('admin', ['filter' => ['auth', 'role']], function($routes) {
    // Rute untuk Anggota
    $routes->get('anggota', 'AnggotaController::index');
    $routes->get('anggota/create', 'AnggotaController::create');
    $routes->post('anggota/store', 'AnggotaController::store');
    $routes->get('anggota/edit/(:num)', 'AnggotaController::edit/$1');
    $routes->post('anggota/update/(:num)', 'AnggotaController::update/$1');
    $routes->get('anggota/delete/(:num)', 'AnggotaController::delete/$1');

    // ==========================================================
    // ===== TAMBAHKAN BLOK RUTE DI BAWAH INI =====
    // ==========================================================
    $routes->get('komponengaji', 'KomponenGajiController::index');
    $routes->get('komponengaji/create', 'KomponenGajiController::create');
    $routes->post('komponengaji/store', 'KomponenGajiController::store');
    $routes->get('komponengaji/edit/(:num)', 'KomponenGajiController::edit/$1');
    $routes->post('komponengaji/update/(:num)', 'KomponenGajiController::update/$1');
    $routes->get('komponengaji/delete/(:num)', 'KomponenGajiController::delete/$1');
});