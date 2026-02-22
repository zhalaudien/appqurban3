<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// AUTH
$routes->get('login', 'Auth\LoginController::index');
$routes->post('login', 'Auth\LoginController::authenticate');
$routes->get('logout', 'Auth\LoginController::logout');

// SUPERADMIN ONLY
$routes->group('admin', ['filter' => 'role:1'], function ($routes) {
    $routes->get('dashboard', 'Admin\DashboardController::index');

    $routes->get('cabang', 'Admin\CabangController::index');
    $routes->get('cabang/create', 'Admin\CabangController::create');
    $routes->post('cabang/store', 'Admin\CabangController::store');
    $routes->get('cabang/edit/(:num)', 'Admin\CabangController::edit/$1');
    $routes->post('cabang/update/(:num)', 'Admin\CabangController::update/$1');
    $routes->get('cabang/delete/(:num)', 'Admin\CabangController::delete/$1');

    $routes->get('panitia', 'Admin\Data\PanitiaController::index');
    $routes->get('panitia/create', 'Admin\Data\PanitiaController::create');
    $routes->post('panitia/store', 'Admin\Data\PanitiaController::store');
    $routes->get('panitia/edit/(:num)', 'Admin\Data\PanitiaController::edit/$1');
    $routes->post('panitia/update/(:num)', 'Admin\Data\PanitiaController::update/$1');
    $routes->get('panitia/delete/(:num)', 'Admin\Data\PanitiaController::delete/$1');
    $routes->post('panitia/import', 'Admin\Data\PanitiaController::import');

    $routes->get('muspika', 'Admin\MuspikaController::index');
    $routes->get('muspika/create', 'Admin\MuspikaController::create');
    $routes->post('muspika/store', 'Admin\MuspikaController::store');
    $routes->get('muspika/edit/(:num)', 'Admin\MuspikaController::edit/$1');
    $routes->post('muspika/update/(:num)', 'Admin\MuspikaController::update/$1');
    $routes->get('muspika/delete/(:num)', 'Admin\MuspikaController::delete/$1');
});

// ADMIN CABANG
$routes->group('cabang', ['filter' => 'role:6'], function ($routes) {
    $routes->get('dashboard', 'Cabang\DashboardController::index');
    $routes->get('pequrban', 'Cabang\PequrbanController::index');
    $routes->get('pequrban/create', 'Cabang\PequrbanController::create');
    $routes->post('pequrban/store', 'Cabang\PequrbanController::store');
    $routes->get('pequrban/edit/(:num)', 'Cabang\PequrbanController::edit/$1');
    $routes->post('pequrban/update/(:num)', 'Cabang\PequrbanController::update/$1');
    $routes->get('pequrban/delete/(:num)', 'Cabang\PequrbanController::delete/$1');
});
