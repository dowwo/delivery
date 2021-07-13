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
        return view('Usuario/lista_usuarios', $data);
    }

    // show single user
    public function singleUser($id = null){
        $modeloUsuario = new UserModel();
        $data['user_obj'] = $modeloUsuario->where('id_usuario', $id)->first();
        return view('edit_user', $data);
    }

    // update user data
    public function update(){
        $modeloUsuario = new UserModel();
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('nombre_usuario'),
            'email'  => $this->request->getVar('email_usuario'),
        ];
        $modeloUsuario->update($id, $data);
        return $this->response->redirect(site_url('/lista-usuarios'));
    }

    // delete user
    public function delete($id = null){
        $modeloUsuario = new UserModel();
        $data['usuario'] = $modeloUsuario->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/lista-usuarios'));
    }
}