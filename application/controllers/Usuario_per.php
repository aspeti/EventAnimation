<!-- <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_per extends CI_Controller {


    public function __construct(){
        parent::__construct();   

        if (!$this->session->userdata("login")) {
            echo '<script>
            alert("LA SESION EXPIRO");
            </script>';
            redirect('usuario/index/3');
		}
	}
	public function index()
	{
        $lista=$this->usuarioper_model->lista();
        $data['usuario']=$lista; 

		$this->load->view('inc_inicio.php');
		$this->load->view('usuario/lista_usuario',$data);
		$this->load->view('inc_fin.php');

	}
    public function test()
	{
        //  $id = $this->input->get("mesa");
        // if ($id >=1) {
        //     $data['arrSilla'] = $this->silla_model->get_cantidad($id); 
        //     alert("llego el dato") ;      
        // }
        $lista=$this->usuarioper_model->lista();
        $data['usuario']=$lista; 

        $data['arrZona'] = $this->zona_model->get_zona();   
        // $data['arrSilla'] = $this->silla_model->get_cantidad(); 


		$this->load->view('inc_inicio.php');
        // $this->load->view('inc_menu2.php');
		$this->load->view('usuario/administrador/usuario_vista',$data);
		$this->load->view('inc_fin.php');

	}
   

   
      

	

    function formUser (){
        $this->load->view('inc_inicio.php');
         $this->load->view('inc_menu2.php');
		$this->load->view('venta/formulario');
		$this->load->view('inc_fin.php');

    }

 


       public function modificar($idUsuario)
    {
        // $idUsuario=$idUsuario;
        $data['infousuario']=$this->usuarioper_model->obtenerUsuario($idUsuario);
        $this->load->view('inc_inicio.php');
        $this->load->view('inc_menu.php');
		$this->load->view('usuario/modificar_usuario',$data);
		$this->load->view('inc_fin.php');
    }

    public function modificar2()
    {
        $idUsuario = $this->session->flashdata('idUsuario');

        // $idUsuario=$_POST['idUsuario'];
        $data['infousuario']=$this->usuarioper_model->obtenerUsuario($idUsuario);
        $this->load->view('inc_inicio.php');
        $this->load->view('inc_menu2.php');
		$this->load->view('usuario/modificar_usuario',$data);
		$this->load->view('inc_fin.php');
    }


    public function modificarUsu()
    {
       

        $idUsuario=$_POST['idUsuario'];
        $data['nombres']=$_POST['nombres'];
        $data['apellidoPaterno']=$_POST['apellidoPaterno'];
        $data['apellidoMaterno']=$_POST['apellidoMaterno'];
        $data['fechaNacimiento']=$_POST['fechaNacimiento'];
        $data['sexo']=$_POST['sexo'];
        $data['ci']=$_POST['ci'];
        $data['telefono']=$_POST['telefono'];
        $data['direccion']=$_POST['direccion'];
        // $data['correo']=$_POST['correo'];
        $rol=$_POST['rol'];
       
                switch ($rol) {
                   case 'Administrador':
                       $data['idRol']='2';
                       break;
                   case 'Profesor':
                       $data['idRol']='3';    
                       break;
                    case 'Estudiante':
                       $data['idRol']='4';        
                        break; 
               }
        $data['idUsuario_Acciones'] =$_POST['idUsuario_Acciones'];      

       // $data['fechaModificacion']=$_POST['CURRENT_TIMESTAMP'];
       // $data['estado']=$_POST['estado'];

        $this->usuarioper_model->modificarUsuario($idUsuario,$data);

        redirect('usuario_per/test','refresh');
    }

    public function modificarUsu2()
    {
        $idUsuario=$this->session->flashdata('idUsuario');


        $idUsuario=$_POST['idUsuario'];
        $data['profesor']=$this->usuarioper_model->obtenerUsuario($idUsuario);
        $this->load->view('inc_inicio.php');
        $this->load->view('inc_menu.php');
		$this->load->view('usuario/profesor/form_profesor',$data);
		$this->load->view('inc_fin.php');

       
    }
    public function modificarLoguin()
    {
       
        $idUsuario=$_POST['idUsuario'];
        $data['login']=$_POST['login'];
        $data['password']=md5($_POST['password']);
      

        $this->usuarioper_model->modificarUsuario($idUsuario,$data);

        redirect('estudiante/estudiante/test','refresh');
    }




    public function listaUsuario(){
        $lista=$this->usuarioper_model->lista();
        $data['usu']=$lista; //otro array asociativo
		$this->load->view('inc_inicio.php');
        $this->load->view('inc_menu.php');
		$this->load->view('usuario/administrador/usuario_list',$data);
		$this->load->view('inc_fin.php');



    }
   
    public function modificarLoguinAdmin()
    {
        try {           
        
       
            $data['password']=md5($_POST['password']);
            $idUsuario=$_POST['idUsuario'];        
            $data['idUsuario_Acciones'] =$_POST['idUsuario_Acciones'];
            $cod=md5($_POST['password']);
            if ($this->usuarioper_model->existencia($cod)) {

                echo '<script>
                alert("Password ya Registrado");
                </script>'; 
                $this->session->set_flashdata('idUsuario', $idUsuario);
                redirect('usuario_per/modificar2','refresh');
            }
            else{
                
                $this->usuarioper_model->modificarUsuario($idUsuario,$data);
                echo '<script>
                alert("Modificacion Satisfactoria");
                </script>';

                redirect('usuario_per/test','refresh');
            }

            
        } catch (\Throwable $th) {
            echo '<script>
                alert("Password ya Registrado");
                </script>'; 
                    redirect('usuario_per/test', 'refresh');
        }      

       
       

    }
    

    

    
      public function agregar()
    {
        // $this->load->library(array('form_validation'));
        $this->load->view('inc_inicio.php');
        $this->load->view('inc_menu.php');
		$this->load->view('usuario/addUsuario'); 
		$this->load->view('inc_fin.php');

    }

 

    //agregar el usuario desde admin 
     public function addUsuario()
     {       
          $this->load->library(array('form_validation'));

                $this->load->helper('form');
                $data['nombres']=$_POST['nombres'];
                $data['apellido1']=$_POST['apellido1'];
                $data['apellido2']=$_POST['apellido2'];
                // $data['sexo']=$_POST['sexo'];
                $data['telefono']=$_POST['telefono'];
                $data['ci']=$_POST['ci'];
                $data['correo']=$_POST['correo'];
				$data['idRol']=$_POST['rol'];
				$data['evento']=$_POST['evento'];
                // $data['fechaNacimiento']=$_POST['fechaNacimiento'];
                //provando loguin
                $nom=$_POST['nombres'];
                $ap=$_POST['apellido1'];
                $am=$_POST['apellido2'];
                $ci=$_POST['ci'];
                
                 $data['idUsuario_Acciones'] =$this->session->userdata('idusuario');
              //  $rol=$_POST['rol'];
       
            //     switch ($rol) {                  
            //        case 'Admin':
            //            $data['idRol']='2';    
            //            break;
            //         case 'User':
            //            $data['idRol']='3';        
            //             break; 
            //    }
        

        // aver aca haciendo pruebas de validation de

            $config=array(
                array(
                    'field'=>'ci',
                    'label' =>'carnet',
                    'rules' =>'is_unique[usuario.ci]',
                    // 'errors'=> array(
                    //         'is_unique' =>'El %s. ya se encuentra registrado',
                    // ),

                ),
            );
            $this->form_validation->set_rules($config);

            if ($this->form_validation->run()==FALSE) {
                # code...
                // $data=$config;
                echo '<script>
                alert("CI YA REGISTRADO");
                </script>'; 
                //  redirect($_SERVER['HTTP_REFERER']);

                    redirect('usuario_per/agregar','refresh');

                // $data=$config;
                // redirect('usuario_per/agregar',$data);
            }
            else {
                // $this->load->view('formsuccess');
                $data['login']=$this->usuarioper_model->crearLoguin($nom,$ap,$am,$ci); 
                $data['password']=md5($this->usuarioper_model->crearLoguin($nom,$ap,$am,$ci)); 
                $this->usuarioper_model->agregarUsuario($data); 
                echo '<script>
                alert("Registro Satisfactorio");
                </script>';
                redirect('usuario_per/listaUsuario','refresh');
       
            }





     }
    
     public function ValidarCI(){

        $data['ci']=$_POST['ci'];
        $ci=$_POST['ci'];
        $val=$this->usuarioper_model->validarCarnet($ci); 
        $data='1';
        $data2='2'; 

         if ($val == 'null') {
            return $data;
         }
         else {
             return $data2;


         }
/*

         $valor = $this->input->post('ci');
         $resultado = $this->usuarioper_model->validarCarnet($valor);
         if($resultado) {
            echo 1;
         } else { 
            echo 0;
         }*/
     }



    
     public function  eliminarUsu()
     {
        $idUsuario=$_POST['idUsuario'];  
        $this->usuarioper_model->eliminarUsuario($idUsuario); 

        redirect('usuario_per/test','refresh');

     }

     public function habillitarUsu($idUsuario){
         $idUsuario_Acciones=$this->session->userdata('idusuario');
        $this->usuarioper_model->HabilUsuario($idUsuario,$idUsuario_Acciones);
       // $this->usuarioper_model->HabilUsuario($idUsuario);

        redirect('usuario_per/listaUsuario','refresh');
     }

    public function desabilitarUsu($idUsuario){
        // $idUsuario_Acciones=$_POST['idUsuario_Acciones'];
       // $this->usuarioper_model->bajaUsuario($idUsuario,$idUsuario_Acciones);
        $this->usuarioper_model->bajaUsuario($idUsuario);

        redirect('usuario_per/listaUsuario','refresh');
    }




 


  

 



} 
