<?php


namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class ProductController extends Controller
{
    // lista los productos
    public function index()
    {
        $user_id = $_SESSION['id_usuario'];



        $ModeloDocumento = new ModeloDocumento();
        $ModeloArchivo = new ModeloArchivo();
        $data['registro_documento'] = $ModeloDocumento->where('tienda.usuario_id_usuario= '+$user_id)->orderBy('fecha_agregado', 'DESC')->findAll();


        return view('/lista_productos', $data);
    }



}