<?php


namespace App\Controllers;


class DashboardVendedor
{
    //Esta función redirige al dashboard
    public function index()
    {
        $session = session();
        //echo "Bienvenido, ".$session->get('nombre ');
        echo view('dashboard');
    }
}