<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Las rutas se configuran de la siguiente manera
// 'ruta con el nombre del archivo','nombre para acceder del navegador::funcion en el controlador', luego ya se aplican los filtros

$routes->get('/', 'Home::index');
$routes->get('/dashboard1', 'Dashboard1::index',['filter' => 'auth']);
$routes->get('/dashboard3', 'DashboardAdmin::index',['filter' => 'admin']);

//$routes->get('/dashboard', 'Dashboard::index',['filter' => 'admin']);

//Ruta que da acceso a la página de registro de usuario

$routes->get('/registro', 'Register::index',['filter' => 'admin']);
$routes->get('/register','Register::index',['filter' => 'admin']);
$routes->get('/lista_usuarios','UsuarioController::index',['filter' => 'admin']);


//Ruta de acceso a vendedor
$routes->get('/lista_tienda','TiendaController::index', ['filter' => 'auth']);
$routes->get('/agregar_tienda','TiendaController::agregar', ['filter' => 'auth']);

//Ruta de acceso a producto
$routes->get('/agregar_producto','ProductController::agregar', ['filter' => 'auth']);
$routes->post('/guardar_producto', 'ProductController::guardar');
$routes->get('/lista_productos','ProductController::index', ['filter' => 'auth']);
$routes->post('/seleccionar_tienda','TiendaController::select', ['filter' => 'auth']);

//Ruta de acceso a pedido
$routes->get('/agregar_pedido','PedidoController::agregar', ['filter' => 'auth']);
$routes->get('/lista_pedidos','PedidoController::index', ['filter' => 'auth']);


//Ruta de acceso a categoria
$routes->get('/lista_categorias','CategoriaController::index',['filter' => 'admin']);
$routes->get('/agregar_categoria','CategoriaController::create',['filter' => 'admin']);

    // Editar y Eliminar deben llevar el /(:num)
//Editar - Eliminar usuario
$routes->get('/modificar_usuario/(:num)','UsuarioController::singleUser/$1');

$routes->get('/delete/(:num)','UsuarioController::delete/$1');

//Editar - Eliminar tienda
$routes->get('/modificar_tienda/(:num)','TiendaController::singleTienda/$1');
$routes->get('/delete/(:num)','TiendaController::delete/$1');

//Editar - Eliminar categoria
$routes->get('/modificar_categoria/(:num)','CategoriaController::singleCategoria/$1');
$routes->get('/delete/(:num)','CategoriaController::delete/$1'); //Eliminar categoria redirecciona a lista usuario



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
