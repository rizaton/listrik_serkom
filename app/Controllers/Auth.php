<?php

/**
 * Deklarasi namespace untuk controller.
 * 
 * Menyatakan bahwa kelas ini berada dalam namespace App\Controllers, 
 * yang merupakan bagian dari struktur aplikasi CodeIgniter.
 */

namespace App\Controllers;

/**
 * Deklarasi penggunaan model-model yang diperlukan.
 * 
 * Pernyataan `use` berikut mengimpor berbagai model dari namespace App\Models 
 * untuk digunakan dalam controller ini. Model-model ini digunakan untuk 
 * berinteraksi dengan tabel-tabel yang sesuai di database.
 */

use App\Models\User;        // Mengimpor model User untuk berinteraksi dengan tabel 'user'
use App\Models\Pelanggan;   // Mengimpor model Pelanggan untuk berinteraksi dengan tabel 'pelanggan'

/**
 * Class Auth
 * Controller untuk menangani autentikasi pengguna dan admin.
 */
class Auth extends BaseController
{
    // Deklarasi properti model dan helper yang digunakan
    private $model_pengguna;  // Properti untuk model Pelanggan
    private $model_admin;     // Properti untuk model User
    protected $helpers = ['form', 'url'];  // Helper yang digunakan dalam controller

    /**
     * Konstruktor kelas
     * 
     * Konstruktor ini menginisialisasi properti model dengan instance dari model yang sesuai.
     */
    public function __construct()
    {
        // Inisialisasi properti model dengan instance dari model yang sesuai
        $this->model_pengguna = new Pelanggan();  // Inisialisasi model Pelanggan
        $this->model_admin = new User();          // Inisialisasi model User
    }

    /**
     * Halaman utama autentikasi
     * 
     * Mengecek peran pengguna yang sedang login dan mengarahkan ke halaman yang sesuai.
     * @return mixed Mengarahkan ke halaman yang sesuai berdasarkan peran pengguna
     */
    public function index()
    {
        if (session()->get('role') == 'admin') {
            return redirect()->to('/admin');  // Mengarahkan ke halaman admin jika peran adalah admin
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');   // Mengarahkan ke halaman user jika peran adalah user
        } else {
            return view('/auth');  // Menampilkan halaman login jika belum login
        }
    }

    /**
     * Autentikasi untuk admin
     * 
     * Menerima data login dari form, mengecek kecocokan username dan password, 
     * dan mengatur sesi jika berhasil login.
     * @return mixed Mengarahkan ke halaman admin jika berhasil login, menampilkan kembali halaman login jika gagal
     */
    public function auth_admin()
    {
        try {
            // Mendapatkan data login dari form
            $data_login = [
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password') ?? ''
            ];
            // Mengecek apakah username ada dalam database
            $username_exist = $this->model_admin
                ->select()
                ->where('username', $data_login['username'])->first();
            if ($username_exist) {
                // Mengecek kecocokan password
                if (password_verify($data_login['password'], $username_exist['password'])) {
                    // Mengatur sesi jika berhasil login
                    session()->set('id_user', $username_exist['id_user']);
                    session()->set('username', $username_exist['username']);
                    session()->set('name', $username_exist['nama_admin']);
                    session()->set('role', 'admin');
                    return redirect()->to('/admin');  // Mengarahkan ke halaman admin
                } else {
                    session()->setFlashdata('found', false);
                    return view('admin/login');  // Menampilkan kembali halaman login jika password salah
                }
            } else {
                session()->setFlashdata('found', false);
                return view('admin/login');  // Menampilkan kembali halaman login jika username tidak ditemukan
            }
        } catch (\Throwable $th) {
            throw $th;  // Melempar error jika terjadi kesalahan
        }
    }
    public function auth_user()
    {
        try {
            // Mendapatkan data login dari form
            $data_login = [
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password') ?? ''
            ];
            // Mengecek apakah username ada dalam database
            $username_exist = $this->model_pengguna
                ->select()
                ->where('username', $data_login['username'])->first();
            if ($username_exist) {
                // Mengecek kecocokan password
                if (password_verify($data_login['password'], $username_exist['password'])) {
                    // Mengatur sesi jika berhasil login
                    session()->set('id_pelanggan', $username_exist['id_pelanggan']);
                    session()->set('username', $username_exist['username']);
                    session()->set('name', $username_exist['nama_pelanggan']);
                    session()->set('role', 'user');
                    return redirect()->to('/user');  // Mengarahkan ke halaman user
                } else {
                    session()->setFlashdata('found', false);
                    return view('user/login');  // Menampilkan kembali halaman login jika password salah
                }
            } else {
                session()->setFlashdata('found', false);
                return view('user/login');  // Menampilkan kembali halaman login jika username tidak ditemukan
            }
        } catch (\Throwable $th) {
            throw $th;  // Melempar error jika terjadi kesalahan
        }
    }

    /**
     * Fungsi logout
     * 
     * Menghancurkan sesi yang ada dan mengarahkan kembali ke halaman utama.
     * @return mixed Mengarahkan ke halaman utama setelah logout
     */
    public function logout()
    {
        session()->destroy();  // Menghancurkan sesi
        return redirect()->to('/');  // Mengarahkan ke halaman utama
    }
}
