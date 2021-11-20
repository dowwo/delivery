<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class PedidoMovilController extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('listaMovilPedidos');
    }
}