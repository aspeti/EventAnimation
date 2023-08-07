<!-- <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {


    public function __construct(){
        parent::__construct();   

        if (!$this->session->userdata("login")) {
            echo '<script>
            alert("LA SESION EXPIRO");
            </script>';
            redirect('usuario/index/3');
		}
	}
	public function categoria()
{
	$estado=1;
	$datos['categoria']=$this->categoria_model->listar($estado);
    

	    $this->load->view('header/menu_inicio.php');
         $this->load->view('categoria/categoria.php',$datos);
         $this->load->view('fooder/fin.php');

	}
	public function nuevoCat()
	{
    

	    $this->load->view('header/menu_inicio.php');
         $this->load->view('categoria/nuevoCat.php');
         $this->load->view('fooder/fin.php');

	}
	public function editarCat()
	{
		$datos['nombre']=$_POST['nombre'];
		$datos['descripcion']=$_POST['descripcion'];
		$datos['id']=$_POST['id'];
		$datos['idUsuario_Acciones']=$_POST['idUsuario_Acciones'];
    

	    $this->load->view('header/menu_inicio.php');
         $this->load->view('categoria/editarCat.php',$datos);
         $this->load->view('fooder/fin.php');

		 
	}
	public function EditCat()
	{
		$datos['nombre']=$_POST['nombre'];
		$datos['descripcion']=$_POST['descripcion'];
		$datos['idUsuario_Acciones']=$this->session->userdata('idusuario');
		$id=$_POST['id'];

		$this->categoria_model->editarCat($datos,$id);
		 redirect('categoria/categoria');


	}
	public function eliminarCat()
	{
    

	    $this->load->view('header/menu_inicio.php');
         $this->load->view('categoria/addCat.php');
         $this->load->view('fooder/fin.php');

	}
	public function registrarNuevo()
	{
		$datos['nombre']=$_POST['nombre'];
		$datos['descripcion']=$_POST['descripcion'];
		$datos['idUsuario_Acciones']=$this->session->userdata('idusuario');
		$this->categoria_model->registrarNuevo($datos);
		 redirect('categoria/categoria');


	}
	public function habilDes()
	{
		$id=$_POST['id'];
		$idUsuario_Acciones=$this->session->userdata('idusuario');
		//$datos['estado']=$_POST['estado'];
		$estado=$_POST['estado'];
		switch ($estado) {
			case '1':
				$this->categoria_model->deshabilitar($id,$idUsuario_Acciones);
				echo '<script>
				alert("Deshabilitado");
				</script>'; 
				  redirect('categoria/categoria', 'refresh');
				break;
			
				case '0':
					$this->categoria_model->habilitar($id,$idUsuario_Acciones);
					echo '<script>
					alert("Habilitado");
					</script>'; 
					  redirect('categoria/categoria', 'refresh');
					break;
		}

	}
	public function eliminarCategoria()
	{
		$id=$_POST['id'];
	
				$this->categoria_model->eliminar($id);
				echo '<script>
				alert("eliminado");
				</script>'; 
				  redirect('categoria/categoria', 'refresh');
				

	}
	
	
	

   

   
      

	



   


} 
