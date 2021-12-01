<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class loginMovilJavaController extends Controller
{
    public function validarUser()
    {
        helper(['form']);
        echo view('validar_usuario');
    }
    public function conexion()
    {
        helper(['form']);
        echo view('conexion');
    }

}