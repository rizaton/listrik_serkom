<?php

/**
 * Deklarasi namespace untuk controller.
 * 
 * Menyatakan bahwa kelas ini berada dalam namespace App\Controllers, 
 * yang merupakan bagian dari struktur aplikasi CodeIgniter.
 */

namespace App\Controllers;

/**
 * Class Home
 * 
 * Controller utama untuk aplikasi, berisi fungsi yang menangani halaman utama dan halaman login.
 * 
 * @abstract BaseController Kelas dasar untuk semua controller di aplikasi.
 */
class Home extends BaseController
{
    protected $helpers = ['form', 'url'];
    /**
     * Function untuk menampilkan halaman login.
     * Jika pengguna sudah memiliki sesi aktif, sesi tersebut akan dihancurkan.
     * 
     * @return \CodeIgniter\HTTP\Response Interface Mengembalikan view halaman login.
     * 
     * @example RouteCollection $routes->get('/', 'Home::index');
     * @example RouteCollection $routes->get('/login', 'Home::index');
     */
    public function index()
    {
        // Memeriksa apakah pengguna sudah memiliki sesi dengan 'role' yang aktif
        if (session()->get('role') != null) {
            // Menghancurkan sesi aktif jika ada
            session()->destroy();
        }
        // Mengembalikan view halaman login
        return view('user/login');
    }

    /**
     * Function untuk menampilkan halaman login admin.
     * Jika pengguna sudah memiliki sesi aktif, sesi tersebut akan dihancurkan.
     * 
     * @return \CodeIgniter\HTTP\ResponseInterface Mengembalikan view halaman login admin.
     * 
     * @example RouteCollection $routes->get('/login_admin', 'Home::login_admin');
     */
    public function login_admin()
    {
        // Memeriksa apakah pengguna sudah memiliki sesi dengan 'role' yang aktif
        if (session()->get('role') != null) {
            // Menghancurkan sesi aktif jika ada
            session()->destroy();
        }
        // Mengembalikan view halaman login admin
        return view('admin/login');
    }
}
