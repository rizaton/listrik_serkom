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
use App\Models\Pembayaran;  // Mengimpor model Pembayaran untuk berinteraksi dengan tabel 'pembayaran'
use App\Models\Penggunaan;  // Mengimpor model Penggunaan untuk berinteraksi dengan tabel 'penggunaan'
use App\Models\Tagihan;     // Mengimpor model Tagihan untuk berinteraksi dengan tabel 'tagihan'
use App\Models\Tarif;       // Mengimpor model Tarif untuk berinteraksi dengan tabel 'tarif'
use App\Models\Level;       // Mengimpor model Level untuk berinteraksi dengan tabel 'level'
use App\Models\Status;      // Mengimpor model Status untuk berinteraksi dengan tabel 'status'


/**
 * Class Admin
 * 
 * Controller utama untuk aplikasi, berisi fungsi yang menangani halaman utama dan halaman login.
 * 
 * @abstract BaseController Kelas dasar untuk semua controller di aplikasi.
 */
class Admin extends BaseController
{
    /**
     * Deklarasi properti model dan helper yang digunakan.
     * 
     * Properti-properti ini akan digunakan untuk mengakses dan memanipulasi data dari berbagai tabel di database.
     */
    private $model_pengguna;      // Properti untuk model Pelanggan
    private $model_admin;         // Properti untuk model User
    private $model_pembayaran;    // Properti untuk model Pembayaran
    private $model_penggunaan;    // Properti untuk model Penggunaan
    private $model_tagihan;       // Properti untuk model Tagihan
    private $model_tarif;         // Properti untuk model Tarif
    private $model_level;         // Properti untuk model Level
    private $model_status;        // Properti untuk model Status
    protected $helpers = ['form', 'url'];  // Helper yang digunakan dalam controller

    /**
     * Konstruktor kelas
     * 
     * Konstruktor ini menginisialisasi properti model dengan instance dari model yang sesuai.
     * Ini memungkinkan penggunaan model-model tersebut di seluruh fungsi dalam controller ini.
     * @return void
     */
    public function __construct()
    {
        // Inisialisasi properti model dengan instance dari model yang sesuai
        $this->model_pengguna = new Pelanggan();     // Inisialisasi model Pelanggan
        $this->model_admin = new User();             // Inisialisasi model User
        $this->model_pembayaran = new Pembayaran();  // Inisialisasi model Pembayaran
        $this->model_penggunaan = new Penggunaan();  // Inisialisasi model Penggunaan
        $this->model_tagihan = new Tagihan();        // Inisialisasi model Tagihan
        $this->model_tarif = new Tarif();            // Inisialisasi model Tarif
        $this->model_level = new Level();            // Inisialisasi model Level
        $this->model_status = new Status();          // Inisialisasi model Status
    }


    /**
     * Function untuk menampilkan halaman dashboard admin.
     * Memeriksa apakah sesi pengguna sudah aktif dan mengarahkan pengguna ke halaman yang sesuai.
     * Jika pengguna memiliki role 'user', mereka akan diarahkan ke halaman user.
     * Mengambil data tagihan, pembayaran, dan status dari database untuk ditampilkan di dashboard admin.
     * 
     * @return \CodeIgniter\HTTP\ResponseInterface Mengembalikan view halaman dashboard admin dengan data.
     * 
     * @example RouteCollection $routes->get('/admin', 'Admin::index');
     */
    public function index()
    {
        // Memeriksa apakah pengguna tidak memiliki sesi aktif
        if (session()->get('role') == null) {
            // Mengarahkan pengguna ke halaman login admin
            return redirect()->to('/login_admin');
            // Memeriksa apakah pengguna memiliki sesi dengan role 'user'
        } else if (session()->get('role') == 'user') {
            // Mengarahkan pengguna ke halaman user
            return redirect()->to('/user');
        }

        try {
            // Mengambil data dari database untuk ditampilkan di dashboard
            $data = [
                'name' => session()->get('name'),
                'tagihan' => $this
                    ->model_tagihan
                    ->join('pelanggan', 'tagihan.id_pelanggan = pelanggan.id_pelanggan')
                    ->select('tagihan.*, pelanggan.nama_pelanggan')
                    ->where('id_status', 3)
                    ->findAll(),
                'pembayaran' => $this
                    ->model_pembayaran
                    ->join('tagihan', 'pembayaran.id_tagihan = tagihan.id_tagihan')
                    ->join('pelanggan', 'pembayaran.id_pelanggan = pelanggan.id_pelanggan')
                    ->select('pembayaran.*, tagihan.id_status, tagihan.bulan, tagihan.tahun, pelanggan.nama_pelanggan')
                    ->where('id_status', 4)
                    ->findAll(),
                'status' => $this
                    ->model_status
                    ->select()
                    ->findAll()
            ];
        } catch (\Throwable $th) {
            // Menangani pengecualian dan tetap menampilkan halaman dengan data kosong
            throw $th;
            $data = [
                'name' => session()->get('name'),
                'tagihan' => [],
                'pembayaran' => []
            ];
        }

        // Mengembalikan view halaman dashboard admin dengan data yang diambil
        return view('admin/read/dashboard', $data);
    }

    /**
     * Mengelola Tarif
     * 
     * Fungsi ini digunakan untuk mengelola tarif listrik. Fungsi ini hanya dapat diakses oleh admin.
     * 
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function kelola_tarif()
    {
        // Mengecek apakah sesi role tidak ada (belum login)
        if (session()->get('role') == null) {
            // Jika belum login, redirect ke halaman login admin
            return redirect()->to('/login_admin');
        }
        // Mengecek apakah sesi role adalah 'user'
        else if (session()->get('role') == 'user') {
            // Jika role adalah 'user', redirect ke halaman user
            return redirect()->to('/user');
        }

        try {
            // Mengambil data tarif dari database
            $data = [
                'tarif' => $this->model_tarif->findAll(), // Mengambil semua data tarif
                'name' => session()->get('name') // Mengambil nama dari sesi
            ];
        } catch (\Throwable $th) {
            // Jika terjadi kesalahan (eksepsi), menangkapnya dan menyiapkan data kosong
            $data = [
                'tarif' => [], // Data tarif kosong
                'name' => session()->get('name') // Mengambil nama dari sesi
            ];
        }

        // Menampilkan view 'kelola_tarif' dengan data yang sudah diambil atau disiapkan
        return view('admin/read/kelola_tarif', $data);
    }
    public function kelola_level()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/login_admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        }
        try {
            $data = [
                'level' => $this->model_level->findAll(),
                'name' => session()->get('name')
            ];
        } catch (\Throwable $th) {
            $data = [
                'level' => [],
                'name' => session()->get('name')
            ];
        }
        return view('admin/read/kelola_level', $data);
    }
    public function kelola_user()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/login_admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        }
        try {
            $data = [
                'user' => $this
                    ->model_admin
                    ->join('level', 'user.id_level = level.id_level')
                    ->select('user.*, level.nama_level')
                    ->findAll(),
                'name' => session()->get('name')
            ];
        } catch (\Throwable $th) {
            $data = [
                'user' => [],
                'name' => session()->get('name')
            ];
        }

        return view('admin/read/kelola_user', $data);
    }
    public function kelola_pelanggan()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/login_admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        }
        try {
            $data = [
                'pelanggan' => $this
                    ->model_pengguna
                    ->join('tarif', 'pelanggan.id_tarif = tarif.id_tarif')
                    ->select('pelanggan.*, tarif.daya')
                    ->findAll(),
                'name' => session()->get('name')
            ];
        } catch (\Throwable $th) {
            $data = [
                'pelanggan' => [],
                'name' => session()->get('name')
            ];
        }
        return view('admin/read/kelola_pelanggan', $data);
    }
    public function kelola_penggunaan()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/login_admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        }
        try {
            $data = [
                'penggunaan' => $this
                    ->model_penggunaan
                    ->join('pelanggan', 'penggunaan.id_pelanggan = pelanggan.id_pelanggan')
                    ->select('penggunaan.*, pelanggan.nama_pelanggan')
                    ->findAll(),
                'name' => session()->get('name')
            ];
        } catch (\Throwable $th) {
            $data = [
                'penggunaan' => [],
                'name' => session()->get('name')
            ];
        }
        return view('admin/read/kelola_penggunaan', $data);
    }
    public function kelola_tagihan()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/login_admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        }
        try {
            $data = [
                'tagihan' => $this
                    ->model_tagihan
                    ->join('pelanggan', 'tagihan.id_pelanggan = pelanggan.id_pelanggan')
                    ->join('penggunaan', 'tagihan.id_penggunaan = penggunaan.id_penggunaan')
                    ->select('tagihan.*, pelanggan.nama_pelanggan, penggunaan.meter_awal, penggunaan.meter_akhir')
                    ->findAll(),
                'status' => $this->model_status->findAll(),
                'name' => session()->get('name')
            ];
        } catch (\Throwable $th) {
            $data = [
                'tagihan' => [],
                'name' => session()->get('name')
            ];
        }
        return view('admin/read/kelola_tagihan', $data);
    }
    public function kelola_pembayaran()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/login_admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        }
        try {
            $data = [
                'pembayaran' => $this
                    ->model_pembayaran
                    ->join('pelanggan', 'pembayaran.id_pelanggan = pelanggan.id_pelanggan')
                    ->join('tagihan', 'pembayaran.id_tagihan = tagihan.id_tagihan')
                    ->join('user', 'pembayaran.id_user = user.id_user')
                    ->select('pembayaran.*, pelanggan.nama_pelanggan, tagihan.id_status, tagihan.jumlah_meter, user.nama_admin')
                    ->findAll(),
                'admin' => $this
                    ->model_admin
                    ->select('id_user, nama_admin')
                    ->findAll(),
                'name' => session()->get('name'),
            ];
        } catch (\Throwable $th) {
            $data = [
                'pembayaran' => [],
                'name' => session()->get('name')
            ];
        }
        return view('admin/read/kelola_pembayaran', $data);
    }
    public function laporan()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/login_admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        }
        try {
            $data = [
                'pembayaran' => $this
                    ->model_pembayaran
                    ->join('pelanggan', 'pembayaran.id_pelanggan = pelanggan.id_pelanggan')
                    ->join('tagihan', 'pembayaran.id_tagihan = tagihan.id_tagihan')
                    ->join('user', 'pembayaran.id_user = user.id_user')
                    ->select('pembayaran.*, pelanggan.nama_pelanggan, tagihan.id_status, tagihan.jumlah_meter, user.nama_admin')
                    ->where('id_status', 2)
                    ->findAll(),
                'admin' => $this
                    ->model_admin
                    ->select('id_user, nama_admin')
                    ->findAll(),
                'status' => $this->model_status->findAll(),
                'name' => session()->get('name'),
            ];
        } catch (\Throwable $th) {
            $data = [
                'pembayaran' => [],
                'name' => session()->get('name')
            ];
        }
        return view('admin/read/laporan', $data);
    }
    public function edit_level()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/login_admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        }
        try {
            $data = [
                'level' => $this
                    ->model_level
                    ->where('id_level', $this->request->getPost('id_level'))
                    ->first(),
                'name' => session()->get('name')
            ];
        } catch (\Throwable $th) {
            $data = [
                'level' => [],
                'name' => session()->get('name')
            ];
        }
        return view('admin/edit/edit_level', $data);
    }
    public function edit_tarif()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/login_admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        }
        try {
            $data = [
                'tarif' => $this
                    ->model_tarif
                    ->where('id_tarif', $this->request->getPost('id_tarif'))
                    ->first(),
                'name' => session()->get('name')
            ];
        } catch (\Throwable $th) {
            $data = [
                'tarif' => [],
                'name' => session()->get('name')
            ];
        }
        return view('admin/edit/edit_tarif', $data);
    }
    public function edit_user()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/login_admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        }
        try {
            $data = [
                'user' => $this
                    ->model_admin
                    ->where('id_user', $this->request->getPost('id_user'))
                    ->first(),
                'level' => $this->model_level->findAll(),
                'name' => session()->get('name')
            ];
        } catch (\Throwable $th) {
            $data = [
                'user' => [],
                'level' => [],
                'name' => session()->get('name')
            ];
        }
        return view('admin/edit/edit_user', $data);
    }
    public function edit_pelanggan()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/login_admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        }
        try {
            $data = [
                'pelanggan' => $this
                    ->model_pengguna
                    ->join('tarif', 'pelanggan.id_tarif = tarif.id_tarif')
                    ->where('id_pelanggan', $this->request->getPost('id_pelanggan'))
                    ->select('pelanggan.*, tarif.daya')
                    ->first(),
                'tarif' => $this->model_tarif->findAll(),
                'name' => session()->get('name')
            ];
        } catch (\Throwable $th) {
            $data = [
                'pelanggan' => [],
                'tarif' => [],
                'name' => session()->get('name')
            ];
        }
        return view('admin/edit/edit_pelanggan', $data);
    }
    public function edit_penggunaan()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/login_admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        }
        try {
            $data = [
                'penggunaan' => $this
                    ->model_penggunaan
                    ->join('pelanggan', 'penggunaan.id_pelanggan = pelanggan.id_pelanggan')
                    ->where('id_penggunaan', $this->request->getPost('id_penggunaan'))
                    ->select('penggunaan.*, pelanggan.id_pelanggan')
                    ->first(),
                'name' => session()->get('name')
            ];
        } catch (\Throwable $th) {
            $data = [
                'penggunaan' => [],
                'name' => session()->get('name')
            ];
        }
        return view('admin/edit/edit_penggunaan', $data);
    }
    public function edit_tagihan()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/login_admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        }
        try {
            $data = [
                'tagihan' => $this
                    ->model_tagihan
                    ->join('pelanggan', 'tagihan.id_pelanggan = pelanggan.id_pelanggan')
                    ->join('penggunaan', 'tagihan.id_penggunaan = penggunaan.id_penggunaan')
                    ->where('id_tagihan', $this->request->getPost('id_tagihan'))
                    ->select('tagihan.*, pelanggan.nama_pelanggan, penggunaan.meter_awal, penggunaan.meter_akhir')
                    ->first(),
                'status' => $this->model_status->findAll(),
                'name' => session()->get('name')
            ];
        } catch (\Throwable $th) {
            $data = [
                'tagihan' => [],
                'name' => session()->get('name')
            ];
        }
        return view('admin/edit/edit_tagihan', $data);
    }
    public function edit_pembayaran()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/login_admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        }
        try {
            $data = [
                'pembayaran' => $this
                    ->model_pembayaran
                    ->join('pelanggan', 'pembayaran.id_pelanggan = pelanggan.id_pelanggan')
                    ->join('tagihan', 'pembayaran.id_tagihan = tagihan.id_tagihan')
                    ->where('id_pembayaran', $this->request->getPost('id_pembayaran'))
                    ->select('pembayaran.*, pelanggan.nama_pelanggan, tagihan.id_status, tagihan.jumlah_meter')
                    ->first(),
                'status' => $this->model_status->findAll(),
                'admin' => $this
                    ->model_admin
                    ->select('id_user, nama_admin')
                    ->findAll(),
                'name' => session()->get('name')
            ];
        } catch (\Throwable $th) {
            $data = [
                'pembayaran' => [],
                'name' => session()->get('name')
            ];
        }
        return view('admin/edit/edit_pembayaran', $data);
    }
    public function create_level()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/login_admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        }
        $data = [
            'name' => session()->get('name'),
        ];
        return view('admin/create/create_level', $data);
    }
    public function create_tarif()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/login_admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        }
        $data = [
            'name' => session()->get('name'),
        ];
        return view('admin/create/create_tarif', $data);
    }
    public function create_user()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/login_admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        }
        $data = [
            'level' => $this->model_level->findAll(),
            'name' => session()->get('name'),
        ];
        return view('admin/create/create_user', $data);
    }
    public function create_pelanggan()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/login_admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        }
        $data = [
            'tarif' => $this->model_tarif->findAll(),
            'name' => session()->get('name'),
        ];
        return view('admin/create/create_pelanggan', $data);
    }
    public function create_penggunaan()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/login_admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        }
        $data = [
            'pelanggan' => $this->request->getPost('id_pelanggan'),
            'name' => session()->get('name'),
        ];
        return view('admin/create/create_penggunaan', $data);
    }
    public function create_tagihan()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/login_admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        }
        $data = [
            'penggunaan' => $this->request->getPost('id_penggunaan'),
            'pelanggan' => $this->request->getPost('id_pelanggan'),
            'jumlah_meter' => ($this->request->getPost('meter_akhir') - $this->request->getPost('meter_awal')),
            'name' => session()->get('name'),
        ];
        return view('admin/create/create_tagihan', $data);
    }
}
