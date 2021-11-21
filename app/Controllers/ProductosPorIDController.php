<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class ProductosPorIDController extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('listaMovilProductosPorID');
    }
}