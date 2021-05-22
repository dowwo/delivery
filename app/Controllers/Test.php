<?php

namespace App\Controllers;

class Test extends BaseController
{
	public function index()
	{
		echo "<h1>Hola</h1></br><h3>Si estás leyendo esto entonces te diste cuenta que estaba probando un controlador</h3></br><h4>Como se ve aquí, es necesario solo el controlador para crear una vista, pero lo que debemos hacer es mostrar desde el controlador la vista</h4>";
	}
}
