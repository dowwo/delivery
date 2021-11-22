<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class LoginMovilController extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('login');
    }
}