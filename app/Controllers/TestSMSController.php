<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class TestSMSController extends Controller
{
    // show users list
    public function index(){
        $modeloUsuario = new UserModel();
        $data['usuarios'] = $modeloUsuario->orderBy('id_usuario', 'DESC')->findAll();
        // Para las vistas que se encuentran en subvcarpetas se realiza de la siguiente manera
        // return view('carpeta/vista', $data);
        return view('lista_usuarios', $data);
    }
}