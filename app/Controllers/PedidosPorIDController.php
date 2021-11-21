<?php

namespace App\Controllers;

class PedidosPorIDController extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('listaMovilPedidosPorID');
    }
}