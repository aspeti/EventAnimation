
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {


		// public function __construct()
		// 	{
		// 	parent::__construct();
		// 	$this->load->model('google_login_model');
		// 	}


        
        public function index()
        {
			include_once APPPATH . 'libraries/vendor/autoload.php';

			$google_client = new GoogLe_Client();

			$google_client->setClientId('544817264624-eodfnbk7e915r1e9tdbkpigo0q9k5s4o.apps.googleusercontent.com');

			$google_client->setClientSecret('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');

			$google_client->setRedirectUri('http://localhost:9090/SIS-PEDIDOS/index.php/usuario/index');
			$google_client-> addScope('email');
			$google_client-> addScope('profile');

			if (isset($_GET["code"])) {
				$token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

				if(!isset($token["error"]))
				{
					$google_client->setAccessToken($token['access_token']);
					//redirect('usuario/panel','refresh');
					$this->session->set_userdata('access_token', $token['access_token']);

					$google_service = new Google_Service_Oauth2($google_client);

					$data = $google_service->userinfo->get(); // aca obtiene toda la info del usuario


					//$data = $google_service->userinfo->get();
					$current_datetime = date('Y-m-d H:i:s');
					if($this->usuarioper_model->Is_already_register($data['email']))
						{
						//update data
						$user_data = array(
						'nombre' => $data['given_name'],
						'apellido'  => $data['family_name'],
						//'email' => $data['email'],
						'password' => $data['id'],

						//'profile_picture'=> $data['picture'],
						'fecha_modificacion' => $current_datetime
						);

						$this->usuarioper_model->modificarUsuario2($user_data, $data['email']);
						}
						else
						{
						 //insert data
						 $user_data = array(
						  'password' => $data['id'],
						  'nombre'  => $data['given_name'],
						  'apellido'   => $data['family_name'],
						  'email'  => $data['email'],
						  //'profile_picture' => $data['picture'],
						  'fecha_creacion'  => $current_datetime,
						  'rol'  => '1'

						 );
					
						 $this->usuarioper_model->agregarUsuario($user_data);
						 
						}


					
						$login1=$data['email'];
						$pass2=$data['id'];


						// PARA CARGAR ALS VARIABLE SSE SECCION DESDE GOOGLE


						$consulta=$this->usuario_model->validar($login1,$pass2);
						if ($consulta->num_rows()>0) 
						 {
							 
							foreach ($consulta->result() as $row)
							{
								$this->session->set_userdata('idusuario',$row->id);
								$this->session->set_userdata('login',$row->email);
								$this->session->set_userdata('password',$row->password);
								$this->session->set_userdata('idRol',$row->rol);
								$this->session->set_userdata('nombres',$row->nombre);
								$this->session->set_userdata('foto',$row->foto);	
								redirect('usuario/panel','refresh');				
							}
						}
						else 
						{
							redirect('usuario/index/1','refresh');				
						}
						// AHST AACA ALS AVRIABLES DE SECION

						//$this->session->set_userdata('user_data', $user_data);

					
				}

			}

			$login_button = '';
			if(!$this->session->userdata('access_token'))
			{
			$login_button = $google_client->createAuthUrl() ;
			 $data['login_button'] = $login_button;
			 $this->load->view('loguin/loguin2',$data);
			}
			else
			{
                $this->load->view('loguin/loguin2');
			}


     
            //index.php/controlador/metodo/
            $data['msg']=$this->uri->segment(3);

            //carga del panel de control
            if ($this->session->userdata('login')) //consultara si hay una variable de secion
            {
                //si hay entonces redireccionar
                redirect('usuario/panel','refresh'); //panel es un metodo de este controlador
     
            }
            else {
                //cargar un login form
               // $this->load->view('inc_inicio.php');
                $this->load->view('loguin/loguin2',$data);
               // $this->load->view('inc_fin.php');
            }
        
        }

    public function validarUsuario()
    {
       
        //va a lelgar datos desde un formulario
        $login=$_POST['login'];
        //$password=md5($_POST['password']); //lo encriptamso directamente
		$password=md5($_POST['password']);
        //antes de encriptar aremos la prueva 
        //$password=$_POST['password'];

        $consulta=$this->usuario_model->validar($login,$password);

        //ENTONCES CONSULTA VA A TENER UN RESULTADO
        if ($consulta->num_rows()>0) //si fuera true entonces tenemso un usuario bien valuidados
         {
             
            foreach ($consulta->result() as $row)
            {
                //accedemso a las variables de base de datos
                //creamos las variables de sesion

                $this->session->set_userdata('idusuario',$row->id);
                $this->session->set_userdata('login',$row->email);
                $this->session->set_userdata('password',$row->password);
                $this->session->set_userdata('idRol',$row->rol);
                $this->session->set_userdata('nombres',$row->nombre);
				$this->session->set_userdata('foto',$row->foto);

               // $this->session->set_userdata('evento',$row->evento);
               // $this->session->set_userdata('nombreEvento',$row->nombreEvento);


                redirect('usuario/panel','refresh');

            }
        }
        else //si no existe ni una direccion redireccionada
        {
            //sino redireccionamos a index 1 en el urisegment
            redirect('usuario/index/1','refresh');

        }


    }
    
        public function panel()
        {
            $this->load->library('session');
            if ($this->session->userdata('login') ) //consultara si hay una variable de secion
            {

                $idRol=$this->session->userdata('idRol');
               // $evento=$this->session->userdata('evento');
                switch ($idRol) {
                    case '1':
						redirect('menu/menu','refresh');

                        break;
                        case '2':
							redirect('menu/menu','refresh');

                            break;
                         
     
                
                //el case funcionara para los eventos q se vaya aa realizar entonces redireccionar                
                //PARA LOS ROLES            

             
             }
                
            }
            else
            {
                redirect('usuario/index/3','refresh');

            }


           
        }
 
 //para cerrar sesion
        public function logout()
        {
            $this->session->sess_destroy();   //aca eliminamos las variables de sesion
            redirect('usuario/index/3','refresh');
        }

        //  function logout2()
		// {
		//  $this->session->unset_userdata('access_token');
	   
		//  $this->session->unset_userdata('user_data');
	   
		//  redirect('google_login/login');
		// }
       

    
    
}
