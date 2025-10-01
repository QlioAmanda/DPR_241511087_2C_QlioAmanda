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

// Home
$routes->get('/', 'Home::index', ['filter' => ['auth']]);
$routes->get('/dashboard', 'Home::dashboard', ['filter' => ['auth']]); 
$routes->get('/forbidden', 'Home::forbidden');

// Auth
$routes->get('/login', 'Auth::login');
$routes->post('/login/attempt', 'Auth::attempt');
$routes->get('/logout', 'Auth::logout');

// Courses
$routes->get('/courses', 'Courses::index', ['filter' => ['auth']]);
$routes->get('/courses/create', 'Courses::create', ['filter' => ['auth','role:admin']]);
$routes->post('/courses/store', 'Courses::store', ['filter' => ['auth','role:admin']]);
$routes->get('/courses/edit/(:num)', 'Courses::edit/$1', ['filter' => ['auth','role:admin']]);
$routes->post('/courses/update/(:num)', 'Courses::update/$1', ['filter' => ['auth','role:admin']]);
$routes->get('/courses/delete/(:num)', 'Courses::delete/$1', ['filter' => ['auth','role:admin']]);

// Students (khusus admin)
$routes->get('/students', 'Students::index', ['filter' => ['auth','role:admin']]);
$routes->get('/students/create', 'Students::create', ['filter' => ['auth','role:admin']]);
$routes->post('/students/store', 'Students::store', ['filter' => ['auth','role:admin']]);
$routes->get('/students/delete/(:num)', 'Students::delete/$1', ['filter' => ['auth','role:admin']]);

// Takes (KRS)
$routes->get('/takes', 'Takes::index', ['filter' => ['auth']]); 
$routes->get('/takes/enroll', 'Takes::enroll', ['filter' => ['auth','role:student']]);
$routes->post('/takes/store', 'Takes::store', ['filter' => ['auth','role:student']]);
$routes->get('/takes/unenroll/(:num)', 'Takes::unenroll/$1', ['filter' => ['auth','role:student']]);

/*
 * Additional Routing
 * Environment based
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
