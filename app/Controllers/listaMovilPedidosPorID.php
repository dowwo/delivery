<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class listaMovilPedidosPorID extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('listaMovilPedidosPorID');
    }
}