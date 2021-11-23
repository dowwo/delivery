<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class LoginMovilController extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('loginMovil');
    }

    public function loginapp(){
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');


    }
}