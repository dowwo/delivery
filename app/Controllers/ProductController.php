<?php
namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\ModeloTiendaProducto;
use CodeIgniter\Controller;

class ProductController extends Controller
{

    // lista los productos
    public function index(){
        $id_usuario = $_SESSION['id_usuario'];

        $modeloProducto = new ProductModel();

        //$data['productos'] = $modeloProducto->where('usuario_id_usuario= ' .$id_usuario)->orderBy('id_producto', 'DESC')->findAll();

        $data['productos'] = $modeloProducto->orderBy('id_producto', 'DESC')->findAll();

        return view('lista_productos', $data);
    }

    // Retorna la vista agregar producto
    public function create(){
        return view('agregar_producto');
    }

    // Método para insertar
    public function guardar()
    {
        //incluir helper form
        helper(['form']);
        // Aquí se especifican las reglas para el formulario
        // Las reglas deben quedar exactamente de esta forma, si hay algún otro caracter como un | arrojará un error en el validador
        $reglas = [
            'nombre'   => 'required|min_length[3]|max_length[100]',
            'valor'     => 'required|min_length[3]|max_length[100]'
        ];
        if($this->validate($reglas)){
            $model = new ModeloDocumento();

            $data = [
                'codigo_barra'      =>  $this->request->getVar('codigo_b'),
                'nombre'            =>  $this->request->getVar('nombre'),
                'cantidad'          =>  $this->request->getVar('cantidad'),
                'fecha_agregado'    =>  $this->request->getVar('fecha_agregado'),
                'valor'             =>  $this->request->getVar('valor')
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