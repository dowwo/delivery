<?php


namespace App\Controllers;


use App\Models\PedidoModel;
use App\Models\TiendaModel;
use CodeIgniter\Controller;

class PedidoController extends Controller
{

    //Listar pedidos
    public function index(){
        $id_usuario = $_SESSION['id_tienda'];
        $id_tienda = $_SESSION['id_tienda']
        $modeloTienda = new TiendaModel();
        $modeloPedido = new PedidoModel();


        // Esta si funciona--- QUE NADIE LA TOQUE POR FAVOR!!!!!!
        $data['tiendas'] = $modeloTienda->where('usuario_id_usuario= ' .$id_usuario)->orderBy('id_tienda', 'DESC')->findAll();
        $data['pedidos'] = $modeloPedido->where('tienda_id_tienda=' .$id_tienda)->orderBy('id_pedido');

        // Para las vistas que se encuentran en subcarpetas se realiza de la siguiente manera
        // return view('carpeta/vista', $data);

        $data['pedidos'] = $modeloPedido->orderBy('id_pedido', 'DESC')->findAll();
        return view('lista_pedidos', $data);
    }

    // Retorna la vista agregar pedido
    public function agregar(){
        return view('agregar_pedido');
    }

    // Método para insertar
    public function guardar()
    {
        //incluir helper form
        helper(['form']);
        // Aquí se especifican las reglas para el formulario
        // Las reglas deben quedar exactamente de esta forma, si hay algún otro caractér como un | arrojará un error en el validador
        $reglas = [
            'nombre'   => 'required|min_length[3]|max_length[100]',
            'valor'     => 'required|min_length[3]|max_length[100]'
        ];
        if($this->validate($reglas)){
            $model = new PedidoModel();

            $data = [
                'usuario_id_usuario'    =>  $this->request->getVar('id_usuario'),
                'tienda_id_tienda'      =>  $this->request->getVar('id_tienda'),
                'producto_id_producto'  =>  $this->request->getVar('id_producto'),
                'direccion_id_direccion'=>  $this->request->getVar('id_direccion'),
                'fecha_pedido'          =>  $this->request->getVar('fecha_pedido'),
                'valor_total'           =>  $this->request->getVar('valor_total'),
                'estado_id_estado'      =>  $this->request->getVar('id_estado')

            ];
            $model->save($data);
            return redirect()->to('/dashboard1');
        }else{
            $data['validation'] = $this->validator;
            echo view('/Documentos/agregar_registro', $data);
        }

    }

    // show single product
    public function singleProducto($id = null){
        $ModeloProducto = new ProductModel();
        $data['producto_obj'] = $ModeloProducto->where('id_producto', $id)->first();
        return view('edit_producto', $data);
    }

    // Actualizar datos de producto
    public function update(){
        $ModeloProducto = new ProductModel();
        $id = $this->request->getVar('id_producto');
        $data = [
            'codigo_barra' => $this->request->getVar('codigo_b'),
            'nombre'  => $this->request->getVar('nombre'),
            'cantidad'  => $this->request->getVar('cantidad'),
            'fecha_agregado'  => $this->request->getVar('fecha_agregado'),
            'valor'  => $this->request->getVar('valor'),
        ];
        $ModeloProducto->update($id, $data);
        return $this->response->redirect(site_url('/lista-productos'));
    }

    // Eliminar producto
    public function eliminar($id = null){
        $ModeloProducto = new ProductModel();
        $data['producto'] = $ModeloProducto->where('id_producto', $id)->delete($id);
        return $this->response->redirect(site_url('/lista_productos'));
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