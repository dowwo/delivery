<?php
namespace App\Controllers;
use App\Models\CategoriaModel;
use CodeIgniter\Controller;

class CategoriaController extends Controller
{
    // Categorias es una tabla que será utilizada solo por los administradores de la página
    // Los usuario no tendrán acceso a  esta
    // show users list
    public function index(){
        $categoriaModel = new CategoriaModel();
        $data['categorias'] = $categoriaModel->orderBy('id_categoria', 'DESC')->findAll();
        return view('lista_categorias', $data);
    }

    // Formulario para agregar categoria
    public function create(){
        return view('agregar_categoria');
    }

    // insertar una nueva categoria
    public function store() {
        $categoriaModel = new CategoriaModel();
        $data = [
            'categoria' => $this->request->getVar('categoria'),
        ];
        $categoriaModel->insert($data);
        return $this->response->redirect(site_url('/lista_categorias'));
    }

    //
    public function singleCat($id = null){
        $categoriaModel = new CategoriaModel();
        $data['categoria_obj'] = $categoriaModel->where('id_categoria', $id)->first();
        return view('modificar_categoria', $data);
    }

    // Actualizar categoria
    public function update(){
        $categoriaModel = new CategoriaModel();
        $id = $this->request->getVar('id_categoria');
        $data = [
            'categoria' => $this->request->getVar('categoria'),
        ];
        $categoriaModel->update($id, $data);
        return $this->response->redirect(site_url('/lista_categorias'));
    }

    // Eliminar categoria
    public function delete($id = null){
        $categoriaModel = new CategoriaModel();
        $data['categoria'] = $categoriaModel->where('id_categoria', $id)->delete($id);
        return $this->response->redirect(site_url('/lista_categorias'));
    }
}