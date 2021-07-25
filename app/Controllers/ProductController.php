<?php
namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoriaModel;
use App\Models\TiendaModel;
use CodeIgniter\Controller;
use CodeIgniter\Model;

class ProductController extends Controller
{
    // lista los productos
    public function index(){
        $id_usuario = $_SESSION['id_usuario'];

        $modeloProducto = new ProductModel();

        //$data['productos'] = $modeloProducto->where('tienda_id_tienda= ' .$id_usuario)->orderBy('id_producto', 'DESC')->findAll();

        $data['productos'] = $modeloProducto->orderBy('id_producto', 'DESC')->findAll();

        return view('lista_productos', $data);
    }

    // Retorna la vista agregar producto
    public function agregar(){
        $id_usuario = $_SESSION['id_usuario'];
        $modeloCategoria = new CategoriaModel();
        $data['categorias'] = $modeloCategoria->orderBy('id_categoria', 'DESC')->findAll();
        $modeloTienda = new TiendaModel();
        $data['tiendas'] = $modeloTienda->where('usuario_id_usuario= ' .$id_usuario)->orderBy('id_tienda', 'DESC')->findAll();

        return view('agregar_producto', $data);
    }

    // Método para insertar
    public function guardar()
    {
        //incluir helper form
        helper(['form']);
        // Aquí se especifican las reglas para el formulario
        // Las reglas deben quedar exactamente de esta forma, si hay algún otro caracter como un | arrojará un error en el validador
        $rules = [
            'nombre' => 'required|min_length[3]|max_length[100]'
        ];

        if($this->validate($rules)){
            $model = new ProductModel();
            $data = [
                'nombre'                    => $this->request->getVar('nombre'),
                'cantidad'                  => $this->request->getVar('cantidad'),
                'fecha_agregado'            => $this->request->getVar('fecha_agregado'),
                'valor'                     => $this->request->getVar('valor'),
                'tienda_id_tienda'          => $this->request->getVar('tienda'),
                'categoria_id_categoria'    => $this->request->getVar('categoria')
            ];
            $model->save($data);
            return redirect()->to('/lista_productos');
        }else{
            $data['validation'] = $this->validation;
            return redirect()->to('/agregar_producto');
        }
    }

    // show single product
    public function singleProduct($id = null){
        $ModeloProducto = new ProductModel();
        $data['producto_obj'] = $ModeloProducto->where('id_producto', $id)->first();
        $modeloCategoria = new CategoriaModel();
        $data['categorias'] = $modeloCategoria->orderBy('id_categoria', 'DESC')->findAll();
        $modeloTienda = new TiendaModel();
        $data['tiendas'] = $modeloTienda->where('usuario_id_usuario= ' .$id_usuario)->orderBy('id_tienda', 'DESC')->findAll();
        return view('modificar_producto', $data);
    }

    // Actualizar datos de producto
    public function update(){
        $ModeloProducto = new ProductModel();
        $id = $this->request->getVar('id_producto');
        $data = [
            'codigo_barra' => $this->request->getVar('codigo_b'),
            'nombre'  => $this->request->getVar('nombre'),
            'cantidad'  => $this->request->getVar('cantidad'),
            'fecha_agregado'  => $this->request->getVar('fecha_agregado'),
            'valor'  => $this->request->getVar('valor'),
        ];
        $ModeloProducto->update($id, $data);
        return $this->response->redirect(site_url('/lista-productos'));
    }

    // Eliminar producto
    public function eliminar($id = null){
        $ModeloProducto = new ProductModel();
        $data['producto'] = $ModeloProducto->where('id_producto', $id)->delete($id);
        return $this->response->redirect(site_url('/lista_productos'));
    }




}