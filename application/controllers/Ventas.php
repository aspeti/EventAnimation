<!-- <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {


    public function __construct(){
        parent::__construct();   

        if (!$this->session->userdata("login")) {
            echo '<script>
            alert("LA SESION EXPIRO");
            </script>';
            redirect('usuario/index/3');
		}
	}
	public function ventas()
{
	$estado=1;
	$datos['ventas']=$this->ventas_model->listar($estado);
    

	    $this->load->view('header/menu_inicio.php');
         $this->load->view('ventas/venta.php',$datos);
         $this->load->view('fooder/fin.php');

	}

	public function getData(){
		$name = $this->input->post("name");
        $resp = $this->ventas_model->listarProducto2($name);
        echo json_encode($resp);
    }

	public function nuevaVen()
	{
		$estado=1;
    	$datos['productos']=$this->ventas_model->listarProducto($estado);

		$datos = array("clientes" => $this->ventas_model->listarCliente2()); 


	    $this->load->view('header/menu_inicio.php');
        $this->load->view('ventas/nuevaVen.php',$datos);
        $this->load->view('fooder/fin.php');

	}
	public function editarVen()
	{
		$datos['nombre']=$_POST['nombre'];
		$datos['descripcion']=$_POST['descripcion'];
		$datos['id']=$_POST['id'];
		$datos['idUsuario_Acciones']=$_POST['idUsuario_Acciones'];
    

	    $this->load->view('header/menu_inicio.php');
         $this->load->view('ventas/editarVen.php',$datos);
         $this->load->view('fooder/fin.php');

		 
	}
	public function EditVen()
	{
		$datos['nombre']=$_POST['nombre'];
		$datos['descripcion']=$_POST['descripcion'];
		$datos['idUsuario_Acciones']=$this->session->userdata('idusuario');
		$id=$_POST['id'];

		$this->categoria_model->editarCat($datos,$id);
		 redirect('ventas/categoria');


	}
	public function eliminarVen()
	{
    

	    $this->load->view('header/menu_inicio.php');
         $this->load->view('ventas/addCat.php');
         $this->load->view('fooder/fin.php');

	}
	public function registrarNuevo()
	{
		$datos['nombre']=$_POST['nombre'];
		$datos['descripcion']=$_POST['descripcion'];
		$datos['idUsuario_Acciones']=$this->session->userdata('idusuario');
		$this->ventas_model->registrarNuevo($datos);
		 redirect('ventas/ventas');


	}
	
	

   

   
	public function lookup(){
        // process posted form data
        $keyword = $this->input->post('term');
        $data['response'] = 'false'; //Set default response
        $query = $this->ventas_model->lookup($keyword); //Search DB
        if( ! empty($query) )
        {
            $data['response'] = 'true'; //Set response
            $data['message'] = array(); //Create array
            foreach( $query as $row )
            {
                $data['message'][] = array( 
                                        'id'=>$row->id,
                                        'value' => $row->nombre,
                                        ''
                                     );  //Add a row to array
            }
        }
        if('IS_AJAX')
        {
            echo json_encode($data); //echo json string if ajax request
              
        }
        else
        {
            $this->load->view('autocomplete/index',$data); //Load html view of search results
        }
    }

	



   


} 
