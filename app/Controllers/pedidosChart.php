<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class pedidosChart extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('chartPedidos');
    }
}