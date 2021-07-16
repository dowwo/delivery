<?php


namespace App\Controllers;


use App\Models\TiendaModel;
use CodeIgniter\Controller;
use CodeIgniter\Model;

class TiendaController extends Controller
{
    // show tienda list
    public function index(){

        $modeloTienda = new TiendaModel();
        $data['tiendas'] = $modeloTienda->where('id_tienda'.$_SESSION['id_usuario'])->orderBy('id_tienda', 'DESC')->findAll();


        // Para las vistas que se encuentran en subcarpetas se realiza de la siguiente manera
        // return view('carpeta/vista', $data);
        return view('lista_tienda', $data);
    }

    //Show single tienda
    public function singleTienda($id = null){
        $modeloTienda = new TiendaModel();
        $data['tienda_obj'] = $modeloTienda->where('id_tienda', $id)->first();
        return view('modificar_tienda', $data);
    }
}