<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\User;
use App\Models\Pelanggan;
use App\Models\Pembayaran;
use App\Models\Penggunaan;
use App\Models\Tagihan;
use App\Models\Tarif;
use App\Models\Level;

class AuthPengguna extends BaseController
{
    private $model_pengguna;
    private $model_admin;
    private $model_pembayaran;
    private $model_penggunaan;
    private $model_tagihan;
    private $model_tarif;
    private $model_level;
    protected $helpers = ['form', 'url'];

    public function __construct()
    {
        $this->model_pengguna = new Pelanggan();
        $this->model_admin = new User();
        $this->model_pembayaran = new Pembayaran();
        $this->model_penggunaan = new Penggunaan();
        $this->model_tagihan = new Tagihan();
        $this->model_tarif = new Tarif();
        $this->model_level = new Level();
    }
    public function index()
    {
        if (session()->get('role') == 'admin') {
            return redirect()->to('/admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        } else {
            return redirect()->to('/auth_user');
        }
    }
    public function bayar_tagihan()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/auth_user');
        } else if (session()->get('role') == 'admin') {
            return redirect()->to('/admin');
        }
        $data_post = [
            'id_tagihan' => $this->request->getPost('id_tagihan'),
            'id_status' => 3,
        ];
        // dd($data_post);
        $this
            ->model_tagihan
            ->save($data_post);
        return redirect()->to('/user/tagihan');
    }
}
