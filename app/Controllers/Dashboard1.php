<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard1 extends Controller
{
    public function index()
    {
        $session = session();
        //echo "Bienvenido, ".$session->get('nombre ');
        echo view('dashboard1');
    }
}