<?php

namespace App\Controllers;

use App\Models\PedidoModel;
use App\Models\TiendaModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class TestSMSController extends Controller
{
    //Aqui deberia utilizar una lista de pedidos
    //Listar pedidos
    public function index(){
        $id_usuario = $_SESSION['id_usuario'];

        $modeloTienda = new TiendaModel();
        $modeloPedido = new PedidoModel();
        //$id_tienda = $_SESSION['id_tienda'];
        $id_tienda = $this->request->getVar('id_tienda');

        // Esta si funciona--- QUE NADIE LA TOQUE POR FAVOR!!!!!!
        $data['tiendas'] = $modeloTienda->where('usuario_id_usuario=' .$id_usuario)->orderBy('id_tienda', 'DESC')->findAll();
        $data['pedidos'] = $modeloPedido->where('usuario_id_usuario=' .$id_usuario)->orderBy('id_pedido');

        // Para las vistas que se encuentran en subcarpetas se realiza de la siguiente manera
        // return view('carpeta/vista', $data);

        $data['pedidos'] = $modeloPedido->orderBy('id_pedido', 'DESC')->findAll();
        return view('lista_pedidos', $data);
    }
}