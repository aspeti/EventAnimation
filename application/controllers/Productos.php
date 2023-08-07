<!-- <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {


    public function __construct(){
        parent::__construct();   

        if (!$this->session->userdata("login")) {
            echo '<script>
            alert("LA SESION EXPIRO");
            </script>';
            redirect('usuario/index/3');
		}
	}
	public function productos()
{
	$estado=1;
	$datos['productos']=$this->productos_model->listar($estado);
    

	    $this->load->view('header/menu_inicio.php');
         $this->load->view('producto/producto.php',$datos);
         $this->load->view('fooder/fin.php');

	}
	public function nuevoPro()
	{
		$estado=1;
		$datos['categoria']=$this->productos_model->listarCategoria($estado);

	    $this->load->view('header/menu_inicio.php');
         $this->load->view('producto/nuevoPro.php',$datos);
         $this->load->view('fooder/fin.php');

	}
	public function editarProd()
	{

		$estado=1;
		$datos['categoria']=$this->productos_model->listarCategoria($estado);

		$datos['nombre']=$_POST['nombre'];
		$datos['id']=$_POST['id'];
		$datos['descripcion']=$_POST['descripcion'];
		$datos['idUsuario_Acciones']=$this->session->userdata('idusuario');
		$datos['codigo']=$_POST['codigo'];
		$datos['precio']=$_POST['precio'];
		$datos['stock']=$_POST['stock'];
		$datos['cate']=$_POST['categoria'];
		$datos['autor']=$_POST['autor'];
		$datos['editorial']=$_POST['editorial'];
		$datos['area']=$_POST['area'];
		$datos['campo']=$_POST['campo'];
		$datos['ciudad']=$_POST['ciudad'];
		$datos['año_publicacion']=$_POST['año_publicacion'];
		$datos['nro_edicion']=$_POST['nro_edicion'];
		$datos['formato']=$_POST['formato'];
		//$datos['foto']=$_POST['foto'];

    

	    $this->load->view('header/menu_inicio.php');
         $this->load->view('producto/editarPro.php',$datos);
         $this->load->view('fooder/fin.php');

		 
	}
	public function EditPro()
	{
		$datos['nombre']=$_POST['titulo'];
		$id=$_POST['id'];
		// $datos['descripcion']=$_POST['descripcion'];
		$datos['idUsuario_Acciones']=$this->session->userdata('idusuario');
		$datos['codigo']=$_POST['codigo'];
		$datos['precio']=$_POST['precio'];
		$datos['stock']=$_POST['stock'];
		$cat=$_POST['categoria'];
        $datos['id_categoria']=$this->productos_model->get_idcat($cat);
		$datos['autor']=$_POST['autor'];
		$datos['editorial']=$_POST['editorial'];
		$datos['area']=$_POST['area'];
		$datos['campo']=$_POST['campo'];
		$datos['ciudad']=$_POST['ciudad'];
		$datos['año_publicacion']=$_POST['publicacion'];
		$datos['nro_edicion']=$_POST['nro_edicion'];
		$datos['formato']=$_POST['formato'];
		$this->productos_model->editarPro($datos,$id);
		 redirect('productos/productos');


	}
	public function eliminarProductos()
	{
		$id=$_POST['id'];
		$this->productos_model->eliminarPro($id);
		redirect('productos/productos');
	}
	public function registrarNuevo()
	{
		$datos['nombre']=$_POST['titulo'];
		$datos['autor']=$_POST['autor'];
		$datos['editorial']=$_POST['editorial'];
		$cat=$_POST['categoria'];
        $datos['id_categoria']=$this->productos_model->get_idcat($cat);
		$datos['area']=$_POST['area'];
		$datos['campo']=$_POST['campo'];
		$datos['ciudad']=$_POST['ciudad'];
		$datos['año_publicacion']=$_POST['publicacion'];
		$datos['nro_edicion']=$_POST['nro_edicion'];
		$datos['formato']=$_POST['formato'];
		$datos['precio']=$_POST['precio'];
		$datos['stock']=$_POST['stock'];
		$datos['codigo']=$_POST['codigo'];
		$datos['idUsuario_Acciones']=$this->session->userdata('idusuario');
		$this->productos_model->registrarNuevo($datos);
		 redirect('productos/productos');


	}

	public function subir(){
		$idUsuario=$_POST['id'];  //estamso resepcionando el id
        $nombrearchivo=$idUsuario.".jpg";  //generamos un string

       // 2 metadatos
       //ruta dodne se guardan lso ficheros
       $config['upload_path']='./cargas/estudiante/';
       //configuro el nomrbe dle archivo
       $config['file_name']=$nombrearchivo;

       //reemplazar lso archivos
       //primero eliminar el anterior archivo y luego subir el nuevo



       $direccion="./cargas/estudiante/".$nombrearchivo;
       unlink($direccion);
       // estos dos archivos potencian el subir


       //tipos de archivos permitidos
       $config['allowed_types']='jpg';   //'gif','jpg','png'
       $this->load->library('upload',$config);


       //vamos al procedimiento de subir
       if (!$this->upload->do_upload()) {
          //si hay algun error pasremos a la vista a traves de un data
          $data['error']=$this->upload->display_errors();
       }
       else{
           $data['foto']=$nombrearchivo;
           $this->estudiante_model->modificarEstudiante($idUsuario,$data);
            //con estas dos primeras lineas actualizamos en base de datos

           $this->upload->data();     
        
       }

         redirect('productos/productos','refresh');



      
     }
	
	

   

   
      

	



   


} 
