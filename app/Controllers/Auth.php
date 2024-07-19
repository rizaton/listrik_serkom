<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\Pelanggan;
use App\Models\User;

class Auth extends BaseController
{
    private $model_pengguna;
    private $model_admin;
    private $db;
    protected $helpers = ['form', 'url'];

    public function __construct()
    {
        $this->model_pengguna = new Pelanggan();
        $this->model_admin = new User();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        if (session()->get('role') == 'admin') {
            return redirect()->to('/admin');
        } else if (session()->get('role') == 'user') {
            return redirect()->to('/user');
        } else {
            return view('/auth');
        }
    }
    public function auth_admin()
    {
        try {
            $data_login = [
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password') ?? ''
            ];
            $username_exist = $this->model_admin
                ->select()
                ->where('username', $data_login['username'])->first();
            if ($username_exist) {
                if (password_verify($data_login['password'], $username_exist['password'])) {
                    session()->set('id_user', $username_exist['id_user']);
                    session()->set('username', $username_exist['username']);
                    session()->set('name', $username_exist['nama_admin']);
                    session()->set('role', 'admin');
                    $this->db->query('SET @current_user_id =' . $username_exist['id_user'] . ';');
                    return redirect()->to('/admin');
                } else {
                    session()->setFlashdata('found', false);
                    return view('admin/login');
                }
            } else {
                session()->setFlashdata('found', false);
                return view('admin/login');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function auth_user()
    {
        try {
            $data_login = [
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password') ?? ''
            ];
            $username_exist = $this->model_pengguna
                ->select()
                ->where('username', $data_login['username'])->first();
            if ($username_exist) {
                if (password_verify($data_login['password'], $username_exist['password'])) {
                    session()->set('username', $username_exist['username']);
                    session()->set('id_user', $username_exist['id_user']);
                    session()->set('role', 'user');

                    return redirect()->to('/user');
                } else {
                    session()->setFlashdata('found', false);
                    return view('user/login');
                }
            } else {
                session()->setFlashdata('found', false);
                return view('user/login');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
