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

use App\Models\Tagihan;     // Mengimpor model Tagihan untuk berinteraksi dengan tabel 'tagihan'

/**
 * Class AuthPengguna
 * Controller untuk autentikasi pengguna dan pembayaran tagihan.
 */
class AuthPengguna extends BaseController
{
    // Deklarasi properti model dan helper yang digunakan
    private $model_tagihan;  // Properti untuk model Tagihan
    protected $helpers = ['form', 'url'];  // Helper yang digunakan dalam controller

    /**
     * Konstruktor kelas
     * 
     * Konstruktor ini menginisialisasi properti model dengan instance dari model yang sesuai.
     */
    public function __construct()
    {
        // Inisialisasi properti model dengan instance dari model yang sesuai
        $this->model_tagihan = new Tagihan();  // Inisialisasi model Tagihan
    }

    /**
     * Halaman utama autentikasi pengguna
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
            return redirect()->to('/auth_user');  // Mengarahkan ke halaman login user jika belum login
        }
    }

    /**
     * Pembayaran tagihan
     * 
     * Memproses pembayaran tagihan berdasarkan data yang diterima dari form.
     * @return mixed Mengarahkan ke halaman yang sesuai berdasarkan peran pengguna setelah pembayaran
     */
    public function bayar_tagihan()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/auth_user');  // Mengarahkan ke halaman login user jika belum login
        } else if (session()->get('role') == 'admin') {
            return redirect()->to('/admin');  // Mengarahkan ke halaman admin jika peran adalah admin
        }

        // Mendapatkan data dari form
        $data_post = [
            'id_tagihan' => $this->request->getPost('id_tagihan'),
            'id_status' => 3,  // Mengubah status tagihan menjadi 3 (dibayar)
        ];

        // Menyimpan perubahan pada tagihan
        $this->model_tagihan->save($data_post);

        return redirect()->to('/user/tagihan');  // Mengarahkan ke halaman tagihan user
    }
}
