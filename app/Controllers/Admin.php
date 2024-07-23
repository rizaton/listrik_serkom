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
use App\Models\Status;

class Admin extends BaseController
{
    private $model_pengguna;
    private $model_admin;
    private $model_pembayaran;
    private $model_penggunaan;
    private $model_tagihan;
    private $model_tarif;
    private $model_level;
    private $model_status;
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
        $this->model_status = new Status();
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
            throw $th;
            $data = [
                'name' => session()->get('name'),
                'tagihan' => [],
                'pembayaran' => []
            ];
        }

        return view('admin/read/dashboard', $data);
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
        // dd($data);
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
