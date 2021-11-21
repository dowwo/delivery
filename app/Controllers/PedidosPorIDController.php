<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class PedidosPorIDController extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('listaMovilPedidosPorID');
    }
}