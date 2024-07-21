<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models;

class Pengguna extends BaseController
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
        $this->model_pengguna = new Models\Pelanggan();
        $this->model_admin = new Models\User();
        $this->model_pembayaran = new Models\Pembayaran();
        $this->model_penggunaan = new Models\Penggunaan();
        $this->model_tagihan = new Models\Tagihan();
        $this->model_tarif = new Models\Tarif();
        $this->model_level = new Models\Level();
        $this->model_status = new Models\Status();
    }
    public function penggunaan()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/auth_user');
        } else if (session()->get('role') == 'admin') {
            return redirect()->to('/admin');
        }
        $data = [
            'penggunaan' => $this
                ->model_penggunaan
                ->where('id_pelanggan', session()->get('id_pelanggan'))
                ->findAll(),
            'name' => session()->get('name'),
        ];
        // dd($data);
        return view('user/read/penggunaan', $data);
    }
    public function tagihan()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/auth_user');
        } else if (session()->get('role') == 'admin') {
            return redirect()->to('/admin');
        }
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
            'name' => session()->get('name'),
        ];
        // dd($data, session()->get('id_pelanggan'));
        return view('user/read/tagihan', $data);
    }
    public function riwayat()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/auth_user');
        } else if (session()->get('role') == 'admin') {
            return redirect()->to('/admin');
        }
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
            'name' => session()->get('name'),
        ];
        // dd($data);
        return view('user/read/riwayat', $data);
    }
    public function bayar_tagihan()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/auth_user');
        } else if (session()->get('role') == 'admin') {
            return redirect()->to('/admin');
        }
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
            'name' => session()->get('name'),
        ];
        // dd($data);
        return view('user/edit/edit_tagihan', $data);
    }
}
