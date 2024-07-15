<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Home::index');
$routes->get('/login_admin', 'Home::login_admin');

$routes->post('/auth_admin', 'Auth::auth_admin');
$routes->post('/auth_user', 'Auth::auth_user');

$routes->get('/admin', 'Admin::index');
$routes->get('/admin/kelola_user', 'Admin::kelola_user');
$routes->get('/admin/kelola_pelanggan', 'Admin::kelola_pelanggan');
$routes->get('/admin/kelola_pembayaran', 'Admin::kelola_pembayaran');
$routes->get('/admin/kelola_penggunaan', 'Admin::kelola_penggunaan');
$routes->get('/admin/kelola_tagihan', 'Admin::kelola_tagihan');
$routes->get('/admin/kelola_tarif', 'Admin::kelola_tarif');
$routes->get('/admin/kelola_level', 'Admin::kelola_level');
$routes->get('/admin/laporan', 'Admin::laporan');
$routes->get('/admin/pengaturan', 'Admin::pengaturan');

$routes->get('/user', 'User::index');

$routes->get('/logout', 'Auth::logout');
