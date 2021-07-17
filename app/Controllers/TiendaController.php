<?php namespace App\Controllers;

use App\Models\TiendaModel;
use CodeIgniter\Controller;
use CodeIgniter\Model;

class TiendaController extends Controller
{
    // show tienda list
    public function index(){

        $id_usuario = $_SESSION['id_usuario'];
        $modeloTienda = new TiendaModel();

        // Esta si funciona--- QUE NADIE LA TOQUE POR FAVOR!!!!!!
        $data['tiendas'] = $modeloTienda->where('usuario_id_usuario= ' .$id_usuario)->orderBy('id_tienda', 'DESC')->findAll();

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

    //show agregar tienda
    public function agregar_tienda(){
        return view('agregar_tienda');
    }

    //Guardar tienda - sin funcionar
    public function guardar(){
        $id_usuario = $_SESSION['id_usuario'];
        $nom = "hola";
        $tipo = "99999";
        $comuna = "99999";
        $val = "0";

        //incluir helper form
        helper(['form']);

        //reglas guardar tienda
        $rules = [
            'nombre' => 'required|min_length[3]|max_length[45]'
        ];

        //verifica reglas para guardar tienda
        if($this->validate($rules)){
            $model = new TiendaModel();
            $data = [
                'nombre'                        => $this->request->getVar('nombre'),
                'fecha_registro'                => $this->request->getVar('fecha_registro'),
                'usuario_id_usuario'            => $id_usuario,
                'tipo_tienda_id_tipo_tienda'    => $this->input->post('tipo'),
                'comuna_id_comuna'              => $this->input->post('comuna'),
                //'usuario_id_usuario'            => $this->request->getVar($id_usuario),
                //'tipo_tienda_id_tipo_tienda'    => $this->request->getVar('tipo'),
                //'comuna_id_comuna'              => $this->request->getVar('comuna')
                //'verificacion'                  => $this->request->getVar($val)
            ];
            $model->save($data);
            return redirect()->to('/dashboard1');
        }else{
            $data['validation'] = $this->validation;
            echo view('agregar_tienda', $data);
        }
    }

}