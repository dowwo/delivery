<?php


namespace App\Controllers;


use App\Models\PedidoModel;
use App\Models\TiendaModel;
use App\Models\ProductModel;
use CodeIgniter\Controller;

class PedidoController extends Controller
{

    //Listar pedidos
    public function index(){
        $id_usuario = $_SESSION['id_usuario'];

        $modeloTienda = new TiendaModel();
        $modeloPedido = new PedidoModel();
        //$id_tienda = $_SESSION['id_tienda'];
        $id_tienda = $this->request->getVar('id_tienda');

        // Esta si funciona--- QUE NADIE LA TOQUE POR FAVOR!!!!!!
        $data['tiendas'] = $modeloTienda->where('usuario_id_usuario=' .$id_usuario)->orderBy('id_tienda', 'DESC')->findAll();
        $data['pedidos'] = $modeloPedido->where('usuario_id_usuario=' .$id_usuario)->orderBy('id_pedido');

        // Para las vistas que se encuentran en subcarpetas se realiza de la siguiente manera
        // return view('carpeta/vista', $data);

        $data['pedidos'] = $modeloPedido->orderBy('id_pedido', 'DESC')->findAll();
        return view('lista_pedidos', $data);
    }

    // Retorna la vista agregar pedido
    public function agregar(){
        $id_tienda = $this->request->getVar('id_tienda');

        $modeloProducto = new ProductModel();
        //$data['productos'] = $modeloProducto->where('tienda_id_tienda=' .$id_tienda)->orderBy('id_producto', 'DESC')->findAll();
        $data['productos'] = $modeloProducto->orderBy('id_producto', 'DESC')->findAll();
        return view('agregar_pedido', $data);
    }

    // Método para insertar
    public function guardar()
    {

        //incluir helper form
        helper(['form']);
        // Aquí se especifican las reglas para el formulario
        // Las reglas deben quedar exactamente de esta forma, si hay algún otro caracter como un | arrojará un error en el validador
        $rules = [
            'telefono' => 'required|min_length[9]|max_length[9]'

        ];

        if($this->validate($rules)){
            $model = new PedidoModel();
            $data = [
                'usuario_id_usuario'    =>  $this->request->getVar('usuario'),
                'tienda_id_tienda'      =>  $this->request->getVar('id_tienda'),
                'descripcion'           =>  $this->request->getVar('descripcion'),
                'telefono'              =>  $this->request->getVar('telefono'),
                'direccion_destino'     =>  $this->request->getVar('direccion'),
                'latitud'               =>  $this->request->getVar('latitud'),
                'longitud'              =>  $this->request->getVar('longitud'),
                'fecha_pedido'          =>  $this->request->getVar('fecha_pedido'),
                'valor_total'           =>  $this->request->getVar('total'),
                'estado_id_estado'      =>  $this->request->getVar('estado')
            ];
            $model->save($data);

            //Aquí se actualiza el stock despues de agregar el pedido
            /*
            $ModeloProducto = new ProductModel();

            $id_producto = $this->request->getVar('producto');
            $stock = $this->request->getVar('cantidad');
            $cantidadPedido = $this->request->getVar('cantidad');
            $cantidadNueva = $stock - $cantidadPedido;
            $data2 = [
                'cantidad'  => $this->request->getVar($cantidadNueva)
            ];
            $ModeloProducto->stock($id_producto, $data2);*/
            return redirect()->to('/lista_pedidos');
        }else{
            $data['validation'] = $this->validation;
            return redirect()->to('../dashboard1');
        }
    }

    // show single product
    public function singlePedido($id = null){
        $id_usuario = $_SESSION['id_usuario'];

        $modeloTienda = new TiendaModel();
        $data['tiendas'] = $modeloTienda->where('usuario_id_usuario=' .$id_usuario)->orderBy('id_tienda', 'DESC')->findAll();

        $modeloProducto = new ProductModel();
        $data['productos'] = $modeloProducto->orderBy('id_producto', 'DESC')->findAll();

        $modeloPedido = new PedidoModel();
        $data['pedido_obj'] = $modeloPedido->where('id_pedido', $id)->first();

        return view('modificar_pedido', $data);
    }

    // Actualizar datos de producto
    public function update(){
        $modeloPedido = new PedidoModel();
        $id = $this->request->getVar('id_pedido');
        $data = [
            'producto_id_producto'  => $this->request->getVar('id_producto'),
            'descripcion'  => $this->request->getVar('descripcion'),
            'telefono'  => $this->request->getVar('telefono'),
            'direccion_destino'  => $this->request->getVar('direccion'),
            'latitud'  => $this->request->getVar('latitud'),
            'longitud'  => $this->request->getVar('longitud'),
            'valor_total'  => $this->request->getVar('total'),
            'estado_id_estado'  => $this->request->getVar('estado'),
            'fecha_modificacion'  => $this->request->getVar('fecha')
        ];

        $modeloPedido->update($id, $data);
        return $this->response->redirect(site_url('/lista_pedidos'));
    }

    // Eliminar
    public function eliminar($id = null){
        $modeloPedido = new PedidoModel();
        $data['pedido'] = $modeloPedido->where('id_pedido', $id)->delete($id);
        return $this->response->redirect(site_url('/lista_pedidos'));
    }


    // Este método permite la subida de archivos al servidor
    function upload() {
        helper(['form', 'url']);

        $input = $this->validate([
            'file' => [
                'uploaded[file]',
                'max_size[file,1024]',
            ]
        ]);

        if (!$input) {

            echo "<script>alert('Archivo no compatible.');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"1;url=lista_registros\"/>";




        } else {

            $archivo = $this->request->getFile('file');
            $newName = $archivo->getRandomName();
            $archivo->move('../uploads/'.$newName);


            $modelo = new ModeloArchivo();
            $data = [
                'nombre_archivo'        =>  $this->request->getVar('nombre'),
                'titulo_archivo'        =>  $this->request->getVar('titulo'),
                'id_registro_documento' =>  $this->request->getVar('id_doc'),
                'file_path'             =>  $newName
            ];
            $modelo->save($data);
            //Aquí se actualizará el documento para agregar el id del archivo recién agregado
            $modeloDoc = new ModeloDocumento();

            $id_documento = $this->request->getVar('id__registro_documento');
            $id_archivo = $this->request->getVar('id_archivo');

            $data2 =
                [
                    'id_archivo'  => $id_archivo,
                ];




            echo "<script>alert('El archivo se subió correctamente');</script>";

            echo "<meta http-equiv=\"refresh\" content=\"1;url=lista_registros\"/>";




        }
    }

    public function download($id){

        $this->load->helper('download');
        $fileinfo = $this->modeloArchivo->download($id);
        $file = 'uploads/'.$fileinfo['filename'];
        force_download($file, NULL);
    }


}