<?php

/**
 * Deklarasi namespace untuk controller.
 * 
 * Menyatakan bahwa kelas ini berada dalam namespace App\Controllers, 
 * yang merupakan bagian dari struktur aplikasi CodeIgniter.
 */

namespace App\Controllers;

// Menggunakan BaseController sebagai dasar untuk controller ini
use App\Controllers\BaseController;
// Menggunakan namespace Models untuk mengakses model-model yang dibutuhkan
use App\Models;

/**
 * Class Pengguna
 * Controller untuk mengelola logika terkait pengguna.
 */
/**
 * Class Pengguna
 * Controller untuk mengelola penggunaan, tagihan, dan riwayat pembayaran pengguna.
 */
class Pengguna extends BaseController
{
    // Deklarasi properti model dan helper yang digunakan
    private $model_penggunaan;    // Properti untuk model Penggunaan
    private $model_tagihan;       // Properti untuk model Tagihan
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
        $this->model_penggunaan = new Models\Penggunaan();  // Inisialisasi model Penggunaan
        $this->model_tagihan = new Models\Tagihan();        // Inisialisasi model Tagihan
    }

    /**
     * Menampilkan data penggunaan pengguna
     * 
     * Mengecek sesi pengguna dan menampilkan data penggunaan sesuai id_pelanggan.
     * @return mixed Mengarahkan ke halaman login atau admin jika belum login atau sebagai admin
     */
    public function penggunaan()
    {
        // Mengecek apakah pengguna sudah login atau belum, atau sebagai admin
        if (session()->get('role') == null) {
            return redirect()->to('/auth_user');  // Mengarahkan ke halaman login jika belum login
        } else if (session()->get('role') == 'admin') {
            return redirect()->to('/admin');  // Mengarahkan ke halaman admin jika sebagai admin
        }

        // Mengambil data penggunaan berdasarkan id_pelanggan dari sesi
        $data = [
            'penggunaan' => $this
                ->model_penggunaan
                ->where('id_pelanggan', session()->get('id_pelanggan'))
                ->findAll(),
            'name' => session()->get('name'),  // Menyimpan nama pengguna dari sesi
        ];

        // Menampilkan halaman penggunaan dengan data yang diambil
        return view('user/read/penggunaan', $data);
    }

    /**
     * Menampilkan data tagihan pengguna
     * 
     * Mengecek sesi pengguna dan menampilkan data tagihan sesuai id_pelanggan.
     * @return mixed Mengarahkan ke halaman login atau admin jika belum login atau sebagai admin
     */
    public function tagihan()
    {
        // Mengecek apakah pengguna sudah login atau belum, atau sebagai admin
        if (session()->get('role') == null) {
            return redirect()->to('/auth_user');  // Mengarahkan ke halaman login jika belum login
        } else if (session()->get('role') == 'admin') {
            return redirect()->to('/admin');  // Mengarahkan ke halaman admin jika sebagai admin
        }

        // Mengambil data tagihan berdasarkan id_pelanggan dari sesi
        $data = [
            'tagihan' => $this
                ->model_tagihan
                ->join('pelanggan', 'tagihan.id_pelanggan = pelanggan.id_pelanggan')
                ->join('pembayaran', 'pembayaran.id_tagihan = tagihan.id_tagihan')
                ->join('status', 'tagihan.id_status = status.id_status')
                ->join('penggunaan', 'tagihan.id_penggunaan = penggunaan.id_penggunaan')
                ->where('tagihan.id_pelanggan', session()->get('id_pelanggan'))
                ->where('status.id_status', 1)
                ->select('tagihan.*, pelanggan.nama_pelanggan, pembayaran.*, status.status, penggunaan.meter_awal, penggunaan.meter_akhir')
                ->findAll(),
            'name' => session()->get('name'),  // Menyimpan nama pengguna dari sesi
        ];

        // Menampilkan halaman tagihan dengan data yang diambil
        return view('user/read/tagihan', $data);
    }

    /**
     * Menampilkan riwayat pembayaran pengguna
     * 
     * Mengecek sesi pengguna dan menampilkan data riwayat pembayaran sesuai id_pelanggan.
     * @return mixed Mengarahkan ke halaman login atau admin jika belum login atau sebagai admin
     */
    public function riwayat()
    {
        // Mengecek apakah pengguna sudah login atau belum, atau sebagai admin
        if (session()->get('role') == null) {
            return redirect()->to('/auth_user');  // Mengarahkan ke halaman login jika belum login
        } else if (session()->get('role') == 'admin') {
            return redirect()->to('/admin');  // Mengarahkan ke halaman admin jika sebagai admin
        }

        // Mengambil data riwayat pembayaran berdasarkan id_pelanggan dari sesi
        $data = [
            'pembayaran' => $this
                ->model_tagihan
                ->join('pelanggan', 'tagihan.id_pelanggan = pelanggan.id_pelanggan')
                ->join('pembayaran', 'pembayaran.id_tagihan = tagihan.id_tagihan')
                ->join('status', 'tagihan.id_status = status.id_status')
                ->join('penggunaan', 'tagihan.id_penggunaan = penggunaan.id_penggunaan')
                ->where('tagihan.id_pelanggan', session()->get('id_pelanggan'))
                ->select('tagihan.*, pelanggan.nama_pelanggan, pembayaran.*, status.status, penggunaan.meter_awal, penggunaan.meter_akhir')
                ->findAll(),
            'name' => session()->get('name'),  // Menyimpan nama pengguna dari sesi
        ];

        // Menampilkan halaman riwayat dengan data yang diambil
        return view('user/read/riwayat', $data);
    }

    /**
     * Menampilkan halaman pembayaran tagihan
     * 
     * Mengecek sesi pengguna dan menampilkan data tagihan untuk pembayaran sesuai id_tagihan.
     * @return mixed Mengarahkan ke halaman login atau admin jika belum login atau sebagai admin
     */
    public function bayar_tagihan()
    {
        // Mengecek apakah pengguna sudah login atau belum, atau sebagai admin
        if (session()->get('role') == null) {
            return redirect()->to('/auth_user');  // Mengarahkan ke halaman login jika belum login
        } else if (session()->get('role') == 'admin') {
            return redirect()->to('/admin');  // Mengarahkan ke halaman admin jika sebagai admin
        }

        // Mengambil data tagihan berdasarkan id_pelanggan dari sesi dan id_tagihan dari request
        $data = [
            'tagihan' => $this
                ->model_tagihan
                ->join('pelanggan', 'tagihan.id_pelanggan = pelanggan.id_pelanggan')
                ->join('pembayaran', 'pembayaran.id_tagihan = tagihan.id_tagihan')
                ->join('status', 'tagihan.id_status = status.id_status')
                ->join('penggunaan', 'tagihan.id_penggunaan = penggunaan.id_penggunaan')
                ->where('tagihan.id_pelanggan', session()->get('id_pelanggan'))
                ->where('status.id_status', 1)
                ->where('tagihan.id_tagihan', $this->request->getPost('id_tagihan'))
                ->select('tagihan.*, pelanggan.nama_pelanggan, pembayaran.*, status.status, penggunaan.meter_awal, penggunaan.meter_akhir')
                ->first(),
            'name' => session()->get('name'),  // Menyimpan nama pengguna dari sesi
        ];

        // Menampilkan halaman pembayaran tagihan dengan data yang diambil
        return view('user/edit/edit_tagihan', $data);
    }
}
