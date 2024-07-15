<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{
    public function __construct()
    {
        helper('form');
    }
    public function index()
    {
        if (session()->get('role') == null) {
            return redirect()->to('/auth_user');
        } else if (session()->get('role') == 'admin') {
            return redirect()->to('/admin');
        }
        return view('user/dashboard');
    }
}
