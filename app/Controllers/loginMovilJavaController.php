<?php

namespace App\Controllers;

class loginMovilJavaController
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