<?php

namespace App\Controllers;

use App\Models\Pelanggan;
use App\Models\User;

class Home extends BaseController
{
    private $model_pelanggan;
    private $model_admin;
    protected $helpers = ['form', 'url'];

    public function __construct()
    {
        $this->model_pelanggan = new Pelanggan();
        $this->model_admin = new User();
    }
    public function index()
    {
        if (session()->get('role') != null) {
            session()->destroy();
        }
        return view('user/login');
    }
    public function login_admin()
    {
        if (session()->get('role') != null) {
            session()->destroy();
        }
        return view('admin/login');
    }
}
