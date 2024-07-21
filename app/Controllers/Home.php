<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $helpers = ['form', 'url'];
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
