<?php


namespace App\Controllers;


use CodeIgniter\Controller;

class DashboardAdmin extends Controller
{
    //Esta función redirige al dashboard para un Administrador
    public function index()
    {
        $session = session();
        //echo "Bienvenido, ".$session->get('nombre ');
        echo view('dashboard3');
    }

}