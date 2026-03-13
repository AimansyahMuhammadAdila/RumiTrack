<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ============ PUBLIC ROUTES ============

// Landing Page (halaman utama publik)
$routes->get('/', 'Home::landing');

// Auth Routes
$routes->get('login', 'AuthController::loginForm');
$routes->post('login', 'AuthController::login');
$routes->get('register', 'AuthController::registerForm');
$routes->post('register', 'AuthController::register');
$routes->get('logout', 'AuthController::logout');

// Landing page alias
$routes->get('landing', 'Home::landing');

// ============ PROTECTED ROUTES (require login) ============

$routes->group('', ['filter' => 'auth'], function ($routes) {

    // Dashboard
    $routes->get('dashboard', 'Home::index');

    // Kandang Module
    $routes->group('kandang', function ($routes) {
        $routes->get('/', '\App\Modules\Kandang\Controllers\KandangController::index');
        $routes->get('create', '\App\Modules\Kandang\Controllers\KandangController::create');
        $routes->post('store', '\App\Modules\Kandang\Controllers\KandangController::store');
        $routes->get('edit/(:num)', '\App\Modules\Kandang\Controllers\KandangController::edit/$1');
        $routes->post('update/(:num)', '\App\Modules\Kandang\Controllers\KandangController::update/$1');
        $routes->get('delete/(:num)', '\App\Modules\Kandang\Controllers\KandangController::delete/$1');
    });

    // Peranakan Module
    $routes->group('peranakan', function ($routes) {
        $routes->get('/', '\App\Modules\Peranakan\Controllers\PeranakanController::index');
        $routes->get('create', '\App\Modules\Peranakan\Controllers\PeranakanController::create');
        $routes->post('store', '\App\Modules\Peranakan\Controllers\PeranakanController::store');
        $routes->get('edit/(:num)', '\App\Modules\Peranakan\Controllers\PeranakanController::edit/$1');
        $routes->post('update/(:num)', '\App\Modules\Peranakan\Controllers\PeranakanController::update/$1');
        $routes->get('delete/(:num)', '\App\Modules\Peranakan\Controllers\PeranakanController::delete/$1');
    });

    // Ternak Module
    $routes->group('ternak', function ($routes) {
        $routes->get('/', '\App\Modules\Ternak\Controllers\TernakController::index');
        $routes->get('create', '\App\Modules\Ternak\Controllers\TernakController::create');
        $routes->post('store', '\App\Modules\Ternak\Controllers\TernakController::store');
        $routes->get('edit/(:num)', '\App\Modules\Ternak\Controllers\TernakController::edit/$1');
        $routes->post('update/(:num)', '\App\Modules\Ternak\Controllers\TernakController::update/$1');
        $routes->get('delete/(:num)', '\App\Modules\Ternak\Controllers\TernakController::delete/$1');
    });

    // Pakan Module
    $routes->group('pakan', function ($routes) {
        $routes->get('/', '\App\Modules\Pakan\Controllers\PakanController::index');
        $routes->get('create', '\App\Modules\Pakan\Controllers\PakanController::create');
        $routes->post('store', '\App\Modules\Pakan\Controllers\PakanController::store');
        $routes->get('edit/(:num)', '\App\Modules\Pakan\Controllers\PakanController::edit/$1');
        $routes->post('update/(:num)', '\App\Modules\Pakan\Controllers\PakanController::update/$1');
        $routes->get('delete/(:num)', '\App\Modules\Pakan\Controllers\PakanController::delete/$1');
        // Pengeluaran Pakan
        $routes->get('pengeluaran', '\App\Modules\Pakan\Controllers\PakanController::pengeluaran');
        $routes->post('pengeluaran/store', '\App\Modules\Pakan\Controllers\PakanController::storePengeluaran');
        $routes->get('pengeluaran/delete/(:num)', '\App\Modules\Pakan\Controllers\PakanController::deletePengeluaran/$1');
    });

    // Dosis Pakan Module
    $routes->group('dosis', function ($routes) {
        $routes->get('/', '\App\Modules\Dosis\Controllers\DosisPakanController::index');
        $routes->get('create', '\App\Modules\Dosis\Controllers\DosisPakanController::create');
        $routes->post('store', '\App\Modules\Dosis\Controllers\DosisPakanController::store');
        $routes->get('edit/(:num)', '\App\Modules\Dosis\Controllers\DosisPakanController::edit/$1');
        $routes->post('update/(:num)', '\App\Modules\Dosis\Controllers\DosisPakanController::update/$1');
        $routes->get('delete/(:num)', '\App\Modules\Dosis\Controllers\DosisPakanController::delete/$1');
    });

    // Pertumbuhan Module
    $routes->group('pertumbuhan', function ($routes) {
        $routes->get('/', '\App\Modules\Pertumbuhan\Controllers\PertumbuhanController::index');
        $routes->get('create', '\App\Modules\Pertumbuhan\Controllers\PertumbuhanController::create');
        $routes->post('store', '\App\Modules\Pertumbuhan\Controllers\PertumbuhanController::store');
        $routes->get('edit/(:num)', '\App\Modules\Pertumbuhan\Controllers\PertumbuhanController::edit/$1');
        $routes->post('update/(:num)', '\App\Modules\Pertumbuhan\Controllers\PertumbuhanController::update/$1');
        $routes->get('delete/(:num)', '\App\Modules\Pertumbuhan\Controllers\PertumbuhanController::delete/$1');
    });

    // Kesehatan Module
    $routes->group('kesehatan', function ($routes) {
        $routes->get('/', '\App\Modules\Kesehatan\Controllers\KesehatanController::index');
        $routes->get('create', '\App\Modules\Kesehatan\Controllers\KesehatanController::create');
        $routes->post('store', '\App\Modules\Kesehatan\Controllers\KesehatanController::store');
        $routes->get('edit/(:num)', '\App\Modules\Kesehatan\Controllers\KesehatanController::edit/$1');
        $routes->post('update/(:num)', '\App\Modules\Kesehatan\Controllers\KesehatanController::update/$1');
        $routes->get('delete/(:num)', '\App\Modules\Kesehatan\Controllers\KesehatanController::delete/$1');
        // Vaksin
        $routes->get('vaksin', '\App\Modules\Kesehatan\Controllers\KesehatanController::vaksin');
        $routes->post('vaksin/store', '\App\Modules\Kesehatan\Controllers\KesehatanController::storeVaksin');
        $routes->get('vaksin/delete/(:num)', '\App\Modules\Kesehatan\Controllers\KesehatanController::deleteVaksin/$1');
        // Pengobatan
        $routes->get('pengobatan', '\App\Modules\Kesehatan\Controllers\KesehatanController::pengobatan');
        $routes->post('pengobatan/store', '\App\Modules\Kesehatan\Controllers\KesehatanController::storePengobatan');
        $routes->get('pengobatan/delete/(:num)', '\App\Modules\Kesehatan\Controllers\KesehatanController::deletePengobatan/$1');
    });

    // Keuangan Module
    $routes->group('keuangan', function ($routes) {
        $routes->get('/', '\App\Modules\Keuangan\Controllers\KeuanganController::index');
        $routes->get('create', '\App\Modules\Keuangan\Controllers\KeuanganController::create');
        $routes->post('store', '\App\Modules\Keuangan\Controllers\KeuanganController::store');
        $routes->get('edit/(:num)', '\App\Modules\Keuangan\Controllers\KeuanganController::edit/$1');
        $routes->post('update/(:num)', '\App\Modules\Keuangan\Controllers\KeuanganController::update/$1');
        $routes->get('delete/(:num)', '\App\Modules\Keuangan\Controllers\KeuanganController::delete/$1');
    });

    // Catatan Rekomendasi Module
    $routes->group('catatan-rekomendasi', function ($routes) {
        $routes->get('/', '\App\Modules\CatatanRekomendasi\Controllers\CatatanRekomendasiController::index');
        $routes->get('create', '\App\Modules\CatatanRekomendasi\Controllers\CatatanRekomendasiController::create');
        $routes->post('store', '\App\Modules\CatatanRekomendasi\Controllers\CatatanRekomendasiController::store');
        $routes->get('edit/(:num)', '\App\Modules\CatatanRekomendasi\Controllers\CatatanRekomendasiController::edit/$1');
        $routes->post('update/(:num)', '\App\Modules\CatatanRekomendasi\Controllers\CatatanRekomendasiController::update/$1');
        $routes->get('delete/(:num)', '\App\Modules\CatatanRekomendasi\Controllers\CatatanRekomendasiController::delete/$1');
    });
});
