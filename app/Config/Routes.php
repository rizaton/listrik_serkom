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

$routes->post('/admin/edit_level', 'Admin::edit_level');
$routes->post('/admin/edit_pelanggan', 'Admin::edit_pelanggan');
$routes->post('/admin/edit_pembayaran', 'Admin::edit_pembayaran');
$routes->post('/admin/edit_penggunaan', 'Admin::edit_penggunaan');
$routes->post('/admin/edit_tagihan', 'Admin::edit_tagihan');
$routes->post('/admin/edit_tarif', 'Admin::edit_tarif');
$routes->post('/admin/edit_user', 'Admin::edit_user');

$routes->post('/admin/delete_level', 'AuthAdmin::delete_level');
$routes->post('/admin/delete_pelanggan', 'AuthAdmin::delete_pelanggan');
$routes->post('/admin/delete_pembayaran', 'AuthAdmin::delete_pembayaran');
$routes->post('/admin/delete_penggunaan', 'AuthAdmin::delete_penggunaan');
$routes->post('/admin/delete_tagihan', 'AuthAdmin::delete_tagihan');
$routes->post('/admin/delete_tarif', 'AuthAdmin::delete_tarif');
$routes->post('/admin/delete_user', 'AuthAdmin::delete_user');

$routes->post('/admin/auth_update_level', 'AuthAdmin::update_level');
$routes->post('/admin/auth_update_pelanggan', 'AuthAdmin::update_pelanggan');
$routes->post('/admin/auth_update_pembayaran', 'AuthAdmin::update_pembayaran');
$routes->post('/admin/auth_update_penggunaan', 'AuthAdmin::update_penggunaan');
$routes->post('/admin/auth_update_tagihan', 'AuthAdmin::update_tagihan');
$routes->post('/admin/auth_update_tarif', 'AuthAdmin::update_tarif');
$routes->post('/admin/auth_update_user', 'AuthAdmin::update_user');

$routes->get('/admin/create_level', 'Admin::create_level');
$routes->get('/admin/create_tarif', 'Admin::create_tarif');
$routes->get('/admin/create_user', 'Admin::create_user');
$routes->get('/admin/create_pelanggan', 'Admin::create_pelanggan');
$routes->post('/admin/create_penggunaan', 'Admin::create_penggunaan');
$routes->post('/admin/create_tagihan', 'Admin::create_tagihan');

$routes->post('/admin/auth_create_level', 'AuthAdmin::create_level');
$routes->post('/admin/auth_create_tarif', 'AuthAdmin::create_tarif');
$routes->post('/admin/auth_create_user', 'AuthAdmin::create_user');
$routes->post('/admin/auth_create_pelanggan', 'AuthAdmin::create_pelanggan');
$routes->post('/admin/auth_create_penggunaan', 'AuthAdmin::create_penggunaan');
$routes->post('/admin/auth_create_tagihan', 'AuthAdmin::create_tagihan');

$routes->get('/user', 'Pengguna::penggunaan');
$routes->get('/user/tagihan', 'Pengguna::tagihan');
$routes->get('/user/riwayat', 'Pengguna::riwayat');
$routes->post('/user/bayar', 'Pengguna::bayar_tagihan');

$routes->post('/user/auth_bayar', 'AuthPengguna::bayar_tagihan');

$routes->get('/logout', 'Auth::logout');

// $routes->setAutoRoute(true);
