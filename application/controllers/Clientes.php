<!-- <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {


    public function __construct(){
        parent::__construct();   

        if (!$this->session->userdata("login")) {
            echo '<script>
            alert("LA SESION EXPIRO");
            </script>';
            redirect('usuario/index/3');
		}
	}
	public function cliente()
{
	$estado=1;
	$datos['cliente']=$this->cliente_model->listar($estado);
    

	    $this->load->view('header/menu_inicio.php');
         $this->load->view('cliente/cliente.php',$datos);
         $this->load->view('fooder/fin.php');

	}
	public function nuevoCli()
	{
    

	    $this->load->view('header/menu_inicio.php');
         $this->load->view('cliente/nuevoCli.php');
         $this->load->view('fooder/fin.php');

	}
	public function editarCli()
	{
		$datos['nombre']=$_POST['nombre'];
		$datos['ci']=$_POST['ci'];
		$datos['id']=$_POST['id'];

		$datos['telefono']=$_POST['telefono'];
		$datos['correo']=$_POST['correo'];
		$datos['direccion']=$_POST['direccion'];
		$datos['idUsuario_Acciones']=$_POST['idUsuario_Acciones'];
	    $this->load->view('header/menu_inicio.php');
         $this->load->view('cliente/editarCli.php',$datos);
         $this->load->view('fooder/fin.php');

		 
	}
	public function EditCli()
	{
		$datos['nombre']=$_POST['nombre'];
		$datos['ci']=$_POST['ci'];
		$datos['telefono']=$_POST['telefono'];
		$datos['correo']=$_POST['correo'];
		$datos['direccion']=$_POST['direccion'];
		$datos['idUsuario_Acciones']=$this->session->userdata('idusuario');
		$id=$_POST['id'];

		$this->cliente_model->editarCli($datos,$id);
		 redirect('clientes/cliente');


	}
	public function eliminarCliente()
	{
    
		$id=$_POST['id'];
		$this->cliente_model->eliminarCli($id);
		redirect('clientes/cliente');

	}
	public function registrarNuevo()
	{
		$datos['nombre']=$_POST['nombre1'];
		$datos['ci']=$_POST['ci'];
		$datos['telefono']=$_POST['telefono'];
		$datos['correo']=$_POST['correo'];
		$datos['direccion']=$_POST['direccion'];		
		$datos['idUsuario_Acciones']=$this->session->userdata('idusuario');
		$this->cliente_model->registrarNuevo($datos);
		 redirect('clientes/cliente');


	}
	
	

   

   
      

	



   


} 
