<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class updatePedidoMovilController extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('updatePedidoMovil');
    }


}