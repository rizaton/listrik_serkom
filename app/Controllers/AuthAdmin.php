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

class AuthAdmin extends BaseController
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
        return redirect()->to('/login_admin');
    }
    public function delete_level()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/login_admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        }
        try {
            $id_level = $this->request->getPost('id_level');
            $this->model_level->delete($id_level);
            session()->setFlashdata('success', 'Data berhasil dihapus');
            return redirect()->to('/admin/kelola_level');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function delete_tarif()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/login_admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        }
        try {
            $id_tarif = $this->request->getPost('id_tarif');
            $this->model_tarif->delete($id_tarif);
            session()->setFlashdata('success', 'Data berhasil dihapus');
            return redirect()->to('/admin/kelola_tarif');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function delete_tagihan()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/login_admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        }
        try {
            $id_tagihan = $this->request->getPost('id_tagihan');
            $this->model_tagihan->delete($id_tagihan);
            session()->setFlashdata('success', 'Data berhasil dihapus');
            return redirect()->to('/admin/kelola_tagihan');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function delete_penggunaan()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/login_admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        }
        try {
            $id_penggunaan = $this->request->getPost('id_penggunaan');
            $this->model_penggunaan->delete($id_penggunaan);
            session()->setFlashdata('success', 'Data berhasil dihapus');
            return redirect()->to('/admin/kelola_penggunaan');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function delete_pembayaran()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/login_admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        }
        try {
            $id_pembayaran = $this->request->getPost('id_pembayaran');
            $this->model_pembayaran->delete($id_pembayaran);
            session()->setFlashdata('success', 'Data berhasil dihapus');
            return redirect()->to('/admin/kelola_pembayaran');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function delete_pelanggan()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/login_admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        }
        try {
            $id_pelanggan = $this->request->getPost('id_pelanggan');
            $this->model_pengguna->delete($id_pelanggan);
            session()->setFlashdata('success', 'Data berhasil dihapus');
            return redirect()->to('/admin/kelola_pelanggan');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function delete_user()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/login_admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        }
        try {
            $id_user = $this->request->getPost('id_user');
            $this->model_admin->delete($id_user);
            session()->setFlashdata('success', 'Data berhasil dihapus');
            return redirect()->to('/admin/kelola_user');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function update_level()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/login_admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        }
        try {
            $data = [
                'id_level' => $this->request->getPost('id_level'),
                'nama_level' => $this->request->getPost('nama_level'),
            ];
            $this->model_level->save($data);
            session()->setFlashdata('success', 'Data berhasil diubah');
            return redirect()->to('/admin/kelola_level');
        } catch (\Throwable $th) {
            session()->setFlashdata('success', 'Data gagal diubah');
            throw $th;
        }
    }
    public function update_pelanggan()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/login_admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        }
        try {
            $data = [
                'id_pelanggan' => $this->request->getPost('id_pelanggan'),
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'nomor_kwh' => $this->request->getPost('nomor_kwh'),
                'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
                'alamat' => $this->request->getPost('alamat'),
                'id_tarif' => $this->request->getPost('id_tarif'),
            ];
            // dd([$data, $this->model_pengguna->save($data), validation_errors()]);
            $this->model_pengguna->save($data);
            session()->setFlashdata('success', 'Data berhasil diubah');
            return redirect()->to('/admin/kelola_pelanggan');
        } catch (\Throwable $th) {
            session()->setFlashdata('success', 'Data gagal diubah');
            throw $th;
        }
    }
    public function update_tarif()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/login_admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        }
        try {
            $data = [
                'id_tarif' => $this->request->getPost('id_tarif'),
                'daya' => $this->request->getPost('daya'),
                'tarif_perkwh' => $this->request->getPost('tarif_perkwh'),
            ];
            $this->model_tarif->save($data);
            session()->setFlashdata('success', 'Data berhasil diubah');
            return redirect()->to('/admin/kelola_tarif');
        } catch (\Throwable $th) {
            session()->setFlashdata('success', 'Data gagal diubah');
            throw $th;
        }
    }
    public function update_user()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/login_admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        }
        try {
            $data = [
                'id_user' => $this->request->getPost('id_user'),
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'nama_admin' => $this->request->getPost('nama_admin'),
                'id_level' => $this->request->getPost('id_level')
            ];
            $this->model_admin->save($data);
            session()->setFlashdata('success', 'Data berhasil diubah');
            return redirect()->to('/admin/kelola_user');
        } catch (\Throwable $th) {
            session()->setFlashdata('success', 'Data gagal diubah');
            throw $th;
        }
    }
    public function update_tagihan()
    {
        try {
            $data = [
                'id_tagihan' => $this->request->getPost('id_tagihan'),
                'bulan' => $this->request->getPost('bulan'),
                'tahun' => $this->request->getPost('tahun'),
                'jumlah_meter' => $this->request->getPost('jumlah_meter'),
                'id_status' => $this->request->getPost('id_status'),
                'id_penggunaan' => $this->request->getPost('id_penggunaan'),
                'id_pelanggan' => $this->request->getPost('id_pelanggan'),
            ];
            $this->model_tagihan->save($data);
            session()->setFlashdata('success', 'Data berhasil diubah');
            return redirect()->to('/admin/kelola_tagihan');
        } catch (\Throwable $th) {
            session()->setFlashdata('success', 'Data gagal diubah');
            throw $th;
        }
    }
    public function update_penggunaan()
    {
        try {
            $data = [
                'id_penggunaan' => $this->request->getPost('id_penggunaan'),
                'bulan' => $this->request->getPost('bulan'),
                'tahun' => $this->request->getPost('tahun'),
                'meter_awal' => $this->request->getPost('meter_awal'),
                'meter_akhir' => $this->request->getPost('meter_akhir'),
                'id_pelanggan' => $this->request->getPost('id_pelanggan'),
            ];
            $this->model_penggunaan->save($data);
            session()->setFlashdata('success', 'Data berhasil diubah');
            return redirect()->to('/admin/kelola_penggunaan');
        } catch (\Throwable $th) {
            session()->setFlashdata('success', 'Data gagal diubah');
            throw $th;
        }
    }
    public function update_pembayaran()
    {
        try {
            $data = [
                'id_pembayaran' => $this->request->getPost('id_pembayaran'),
                'id_tagihan' => $this->request->getPost('id_tagihan'),
                'id_user' => $this->request->getPost('id_user'),
                'biaya_admin' => $this->request->getPost('biaya_admin'),
                'jumlah_meter' => $this->request->getPost('jumlah_meter'),
                'tanggal_pembayaran' => $this->request->getPost('tanggal_pembayaran'),
            ];
            $this->model_pembayaran->save($data);
            session()->setFlashdata('success', 'Data berhasil diubah');
            return redirect()->to('/admin/kelola_pembayaran');
        } catch (\Throwable $th) {
            session()->setFlashdata('success', 'Data gagal diubah');
            throw $th;
        }
    }
    public function create_level()
    {
        try {
            $data = [
                'nama_level' => $this->request->getPost('nama_level'),
            ];
            $this->model_level->insert($data);
            session()->setFlashdata('success', 'Data berhasil ditambahkan');
            return redirect()->to('/admin/kelola_level');
        } catch (\Throwable $th) {
            session()->setFlashdata('success', 'Data gagal ditambahkan');
            throw $th;
        }
    }
    public function create_tarif()
    {
        try {
            $data = [
                'daya' => $this->request->getPost('daya'),
                'tarifperkwh' => floatval($this->request->getPost('tarif_perkwh')),
            ];
            $this->model_tarif->insert($data);
            session()->setFlashdata('success', 'Data berhasil ditambahkan');
            return redirect()->to('/admin/kelola_tarif');
        } catch (\Throwable $th) {
            session()->setFlashdata('success', 'Data gagal ditambahkan');
            throw $th;
        }
    }
    public function create_user()
    {
        try {
            $data = [
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password') ?? '', PASSWORD_DEFAULT),
                'nama_admin' => $this->request->getPost('nama_admin'),
                'id_level' => $this->request->getPost('id_level'),
            ];
            $this->model_admin->insert($data);
            session()->setFlashdata('success', 'Data berhasil ditambahkan');
            return redirect()->to('/admin/kelola_user');
        } catch (\Throwable $th) {
            session()->setFlashdata('success', 'Data gagal ditambahkan');
            throw $th;
        }
    }
    public function create_pelanggan()
    {
        try {
            $data = [
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password') ?? '', PASSWORD_DEFAULT),
                'nomor_kwh' => $this->request->getPost('nomor_kwh'),
                'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
                'alamat' => $this->request->getPost('alamat'),
                'id_tarif' => $this->request->getPost('id_tarif'),
            ];
            // dd($data, $this->model_pengguna->insert($data));
            $this->model_pengguna->insert($data);
            session()->setFlashdata('success', 'Data berhasil ditambahkan');
            return redirect()->to('/admin/kelola_pelanggan');
        } catch (\Throwable $th) {
            session()->setFlashdata('success', 'Data gagal ditambahkan');
            throw $th;
        }
    }
    public function create_penggunaan()
    {
        try {
            $data = [
                'bulan' => $this->request->getPost('bulan'),
                'tahun' => $this->request->getPost('tahun'),
                'meter_awal' => $this->request->getPost('meter_awal'),
                'meter_akhir' => $this->request->getPost('meter_akhir'),
                'id_pelanggan' => $this->request->getPost('id_pelanggan'),
                'id_user' => session()->get('id_user'),
            ];
            $this->model_penggunaan->insert($data);
            session()->setFlashdata('success', 'Data berhasil ditambahkan');
            return redirect()->to('/admin/kelola_penggunaan');
        } catch (\Throwable $th) {
            session()->setFlashdata('success', 'Data gagal ditambahkan');
            throw $th;
        }
    }
    public function create_tagihan()
    {
        try {
            $data = [
                'bulan' => $this->request->getPost('bulan'),
                'tahun' => $this->request->getPost('tahun'),
                'jumlah_meter' => $this->request->getPost('jumlah_meter'),
                'id_status' => $this->request->getPost('id_status'),
                'id_penggunaan' => $this->request->getPost('id_penggunaan'),
                'id_pelanggan' => $this->request->getPost('id_pelanggan'),
                'id_user' => session()->get('id_user'),
            ];
            $this->model_tagihan->insert($data);
            session()->setFlashdata('success', 'Data berhasil ditambahkan');
            return redirect()->to('/admin/kelola_tagihan');
        } catch (\Throwable $th) {
            session()->setFlashdata('success', 'Data gagal ditambahkan');
            throw $th;
        }
    }
}
