<?php

use CodeIgniter\Commands\Utilities\Routes;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Dashboard::index');
    $routes->get('data_karyawan', 'DataKaryawan::index');
    $routes->post('data_karyawan/store', 'DataKaryawan::store');
    $routes->get('data_karyawan/success', 'DataKaryawan::success');
    $routes->match(['get', 'delete'], 'data_karyawan/(:num)', 'DataKaryawan::delete/$1');
    $routes->post('update_karyawan/(:num)', 'DataKaryawan::update/$1');

    $routes->get('profil', 'Profile::index');
    $routes->get('profil/edit', 'Profile::edit');
    $routes->post('profil/update', 'Profile::update');

    $routes->get('kriteria_penilaian', 'KriteriaPenilaian::index');
    $routes->post('kriteria_penilaian/store', 'KriteriaPenilaian::store');
    $routes->post('kriteria_penilaian/update', 'KriteriaPenilaian::update');
    $routes->match(['get', 'delete'], 'kriteria_penilaian/(:num)', 'KriteriaPenilaian::delete/$1');

    $routes->get('sub_kriteria', 'SubKriteria::index');
    $routes->post('sub_kriteria/store', 'SubKriteria::store');
    $routes->post('sub_kriteria/update', 'SubKriteria::update');
    $routes->match(['get', 'delete'], 'sub_kriteria/(:num)', 'SubKriteria::delete/$1');

    $routes->get('penilaian_karyawan', 'PenilaianKaryawan::index');
    $routes->post('penilaian_karyawan/store', 'PenilaianKaryawan::store');
    $routes->post('penilaian_karyawan/update', 'PenilaianKaryawan::update');
    $routes->match(['get', 'delete'], 'penilaian_karyawan/(:num)', 'PenilaianKaryawan::delete/$1');

    $routes->get('hasil', 'Hasil::index');
});

$routes->get('login', 'LoginController::index');
$routes->post('login', 'LoginController::auth');
$routes->get('logout', 'LoginController::logout');

$routes->get('register', 'RegisterController::index');
$routes->post('register', 'RegisterController::save');
