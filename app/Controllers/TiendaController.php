<?php


namespace App\Controllers;


use CodeIgniter\Controller;
use CodeIgniter\Model;

class TiendaController extends Controller
{
    // show users list
    public function index(){
        $modeloTienda = new TiendaModel();
        $data['tienda'] = $modeloTienda->orderBy('id_tienda', 'DESC')->findAll();
        // Para las vistas que se encuentran en subvcarpetas se realiza de la siguiente manera
        // return view('carpeta/vista', $data);
        return view('lista_usuarios', $data);
    }
}