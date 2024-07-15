<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\User;
use App\Models\Pelanggan;
use App\Models\Pembayaran;
use App\Models\Penggunaan;
use App\Models\Tagihan;
use App\Models\Tarif;
use App\Models\Level;

class Admin extends BaseController
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
        if (session()->get('role') == null) {
            return redirect()->to('/login_admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        }
        try {
            $data = [
                'name' => session()->get('name'),
                'tagihan' => $this
                    ->model_tagihan
                    ->select()
                    ->where('status = 0')
                    ->findAll(),
                'pembayaran' => $this
                    ->model_pembayaran
                    ->join('tagihan', 'pembayaran.id_tagihan = tagihan.id_tagihan')
                    ->select('pembayaran.*, tagihan.status')
                    ->where('status = 2')
                    ->findAll(),
            ];
        } catch (\Throwable $th) {
            //throw $th;
            $data = [
                'name' => session()->get('name')
            ];
        }
        return view('admin/dashboard', $data);
    }
    public function kelola_tarif()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/login_admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        }
        try {
            $data = [
                'tarif' => $this->model_tarif->findAll(),
                'name' => session()->get('name')
            ];
        } catch (\Throwable $th) {
            $data = [
                'tarif' => [],
                'name' => session()->get('name')
            ];
        }
        return view('admin/kelola_tarif', $data);
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
        return view('admin/kelola_level', $data);
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

        return view('admin/kelola_user', $data);
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
        return view('admin/kelola_pelanggan', $data);
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
        return view('admin/kelola_penggunaan', $data);
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
                'name' => session()->get('name')
            ];
        } catch (\Throwable $th) {
            $data = [
                'tagihan' => [],
                'name' => session()->get('name')
            ];
        }
        return view('admin/kelola_tagihan', $data);
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
                    ->select('pembayaran.*, pelanggan.nama_pelanggan, tagihan.status, tagihan.jumlah_meter, user.nama_admin')
                    ->findAll(),
                'name' => session()->get('name')
            ];
        } catch (\Throwable $th) {
            $data = [
                'pembayaran' => [],
                'name' => session()->get('name')
            ];
        }
        return view('admin/kelola_pembayaran', $data);
    }
    public function laporan()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/login_admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        }
        return view('admin/laporan');
    }
    public function pengaturan()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/login_admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        }
        return view('admin/pengaturan');
    }
}
