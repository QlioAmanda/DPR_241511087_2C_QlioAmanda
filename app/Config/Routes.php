<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;
use Config\Services;

/** @var RouteCollection $routes */
$routes = Services::routes();

if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * Router Setup
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false); // Pastikan ini 'false' agar rute aman

/*
 * Route Definitions
 */

// Home (hanya dashboard)
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Home::index'); 

// Auth (login & logout)
$routes->get('/login', 'Auth::login');
$routes->post('/login/attempt', 'Auth::attempt');
$routes->get('/logout', 'Auth::logout');

// Rute yang memerlukan autentikasi (filter 'auth' harus didefinisikan)
$routes->group('/', ['filter' => 'auth'], function ($routes) {
    // KELOLA DATA ANGGOTA DPR (Hanya untuk Admin)
    $routes->group('anggota_dpr', function ($routes) {
        $routes->get('/', 'AnggotaDPR::index');
        $routes->get('tambah', 'AnggotaDPR::create'); // Form tambah
        $routes->post('simpan', 'AnggotaDPR::store'); // Proses simpan
        $routes->get('ubah/(:num)', 'AnggotaDPR::edit/$1'); // Form ubah
        $routes->post('update/(:num)', 'AnggotaDPR::update/$1'); // Proses update
        $routes->get('hapus/(:num)', 'AnggotaDPR::delete/$1'); // Proses hapus
    });
    
    // KELOLA DATA KOMPONEN GAJI (Akan datang)
    // KELOLA DATA PENGGAJIAN (Akan datang)
});

/*
 * Additional Routing
 * Environment based
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}