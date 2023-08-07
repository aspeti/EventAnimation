<!-- <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {


    public function __construct(){
        parent::__construct();   

        if (!$this->session->userdata("login")) {
            echo '<script>
            alert("LA SESION EXPIRO");
            </script>';
            redirect('usuario/index/3');
		}
	}
	public function usuario()
	{
	$estado=1;
	$datos['usuario']=$this->usuarios_model->listar($estado);
    

	    $this->load->view('header/menu_inicio.php');
        $this->load->view('usuarios/usuario.php',$datos);
        $this->load->view('fooder/fin.php');

	}
	public function nuevoUsu()
	{
    

	    $this->load->view('header/menu_inicio.php');
        $this->load->view('usuarios/nuevoUsu.php');
        $this->load->view('fooder/fin.php');

	}
	public function habilDes()
	{
		$id=$_POST['id'];
		$idUsuario_Acciones=$this->session->userdata('idusuario');
		//$datos['estado']=$_POST['estado'];
		$estado=$_POST['estado'];
		switch ($estado) {
			case '1':
				$this->usuarios_model->deshabilitar($id,$idUsuario_Acciones);
				echo '<script>
				alert("Deshabilitado");
				</script>'; 
				  redirect('usuarios/usuario', 'refresh');
				break;
			
				case '0':
					$this->usuarios_model->habilitar($id,$idUsuario_Acciones);
					echo '<script>
					alert("Habilitado");
					</script>'; 
					  redirect('usuarios/usuario', 'refresh');
					break;
		}

	}
	public function editarUsu()
	{
		$datos['nombre']=$_POST['nombre'];
		$datos['ci']=$_POST['ci'];
		$datos['id']=$_POST['id'];
		$datos['telefono']=$_POST['telefono'];
		$datos['correo']=$_POST['correo'];
		$datos['login']=$_POST['login'];
		$datos['pa']=$_POST['password'];
		$datos['rol']=$_POST['rol'];
		$datos['roluser']=$_POST['roluser'];
		$datos['idUsuario_Acciones']=$this->session->userdata('idusuario');
	    $this->load->view('header/menu_inicio.php');
        $this->load->view('usuarios/editarUsu.php',$datos);
        $this->load->view('fooder/fin.php');

		 
	}
	
	public function editarUsuario()
	{
		$datos['nombre']=$_POST['nombre'];
		$datos['ci']=$_POST['ci'];
		$id=$_POST['id'];
		$datos['telefono']=$_POST['telefono'];
		$datos['correo']=$_POST['correo'];
		$datos['login']=$_POST['login'];
		$data['password']=md5($_POST['password']);
		$datos['rol']=$_POST['rol'];
		$datos['idUsuario_Acciones']=$this->session->userdata('idusuario');
		$this->usuarios_model->editarUsu($datos,$id);
		echo '<script>
		alert("Usuario modificado");
		</script>'; 
		  redirect('usuarios/usuario', 'refresh');


	}
	public function eliminarUsuario()
	{
    
		$id=$_POST['id'];
		$this->usuarios_model->eliminarUsu($id);
		redirect('usuarios/usuario');

	}
	public function registrarNuevo()
	{
		$datos['nombre']=$_POST['nombre2'];
		$datos['ci']=$_POST['ci'];
		$datos['telefono']=$_POST['telefono'];
		$datos['correo']=$_POST['correo'];
		$datos['login']=$_POST['login'];
		$datos['password']=md5($_POST['password']);
		$datos['pa']=$_POST['pa'];		
		$datos['rol']=$_POST['rol'];		

		$datos['idUsuario_Acciones']=$this->session->userdata('idusuario');
		$this->usuarios_model->registrarNuevo($datos);
		redirect('usuarios/usuario');


	}
	
	

   

   
      

	



   


} 
