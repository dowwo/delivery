<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class loginMovilJavaConexion extends Controller
{
    public function conexion()
    {
        helper(['form']);
        echo view('conexion');
    }
}