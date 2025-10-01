<?php

namespace Config;

use Config\Services;

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
$routes->setAutoRoute(false);

/*
 * Route Definitions
 */

// Home (hanya dashboard + forbidden)
$routes->get('/', 'Home::index', ['filter' => ['auth']]);
$routes->get('/dashboard', 'Home::index', ['filter' => ['auth']]); 
$routes->get('/forbidden', 'Home::forbidden');

// Auth (login & logout saja)
$routes->get('/login', 'Auth::login');
$routes->post('/login/attempt', 'Auth::attempt');
$routes->get('/logout', 'Auth::logout');

/*
 * Additional Routing
 * Environment based
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
