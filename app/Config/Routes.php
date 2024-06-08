<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'Dashboard::index', ['filter' => 'auth']); //halaman dashboard

$routes->get('data_karyawan', 'DataKaryawan::index', ['filter' => 'auth']); //halaman data karyawan
$routes->post('data_karyawan/store', 'DataKaryawan::store'); //tambah data karyawan
$routes->get('data_karyawan/success', 'DataKaryawan::success'); //panggil data karyawan
$routes->match(['get', 'delete'], '/data_karyawan/(:num)', 'DataKaryawan::delete/$1');
$routes->post('update_karyawan/(:num)', 'DataKaryawan::update/$1');

$routes->get('/login', 'LoginController::index');
$routes->post('/login', 'LoginController::auth');
$routes->get('/logout', 'LoginController::logout');

$routes->get('/register', 'RegisterController::index');
$routes->post('/register', 'RegisterController::save');

$routes->get('profil', 'Profile::index', ['filter' => 'auth']); // Menampilkan profil
$routes->get('profil/edit', 'Profile::edit'); // Menampilkan form edit profil
$routes->post('profil/update', 'Profile::update'); // Menangani update profil

$routes->get('kriteria_penilaian', 'KriteriaPenilaian::index', ['filter' => 'auth']);
$routes->post('kriteria_penilaian/store', 'KriteriaPenilaian::store');
$routes->post('kriteria_penilaian/update', 'KriteriaPenilaian::update');
$routes->match(['get', 'delete'], '/kriteria_penilaian/(:num)', 'KriteriaPenilaian::delete/$1');

$routes->get('sub_kriteria', 'SubKriteria::index', ['filter' => 'auth']);
$routes->post('sub_kriteria/store', 'SubKriteria::store');
$routes->post('sub_kriteria/update', 'SubKriteria::update');
$routes->match(['get', 'delete'], '/sub_kriteria/(:num)', 'SubKriteria::delete/$1');
