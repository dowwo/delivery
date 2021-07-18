<?php
namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;

class UsuarioController extends Controller
{
    // show users list
    public function index(){
        $modeloUsuario = new UserModel();
        $data['usuarios'] = $modeloUsuario->orderBy('id_usuario', 'DESC')->findAll();
        // Para las vistas que se encuentran en subvcarpetas se realiza de la siguiente manera
        // return view('carpeta/vista', $data);
        return view('lista_usuarios', $data);
    }

    // show single user
    public function singleUser($id = null){
        $modeloUsuario = new UserModel();
        $data['usuario_obj'] = $modeloUsuario->where('id_usuario', $id)->first();
        return view('modificar_usuario', $data);
    }

    // update user data
    public function update(){
        $modeloUsuario = new UserModel();
        $id = $this->request->getVar('id_usuario');
        $data = [
            'name' => $this->request->getVar('nombre_usuario'),
            'apellido_p' => $this->request->getVar('apellido_p'),
            'apellido_m' => $this->request->getVar('apellido_m'),
            'email'  => $this->request->getVar('email_usuario'),
            'rol' => $this->request->getVar('rol_id_rol'),
        ];
        $modeloUsuario->update($id, $data);
        return $this->response->redirect(site_url('/lista_usuarios'));
    }

    // delete user
    public function delete($id = null){
        $modeloUsuario = new UserModel();
        $data['usuario'] = $modeloUsuario->where('id_usuario', $id)->delete($id);
        return $this->response->redirect(site_url('/lista_usuarios'));
    }
}