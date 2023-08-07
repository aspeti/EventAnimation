
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

        
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

				if (!isset($token['error'])) {
					$google_client->setAccessToken($token['access_token']);

					$this->sessiom ->userdata('access_token', $token['access_token']);

					$google_service = new Google_Service_oauth2($google_client);
					//$data = $google_service->userinfo->get();
					$curren_datetime = date('Y-m-d H:i:s');
					if ($this->google_login_model) {
						# code...
					}

					
				}

			}
			if (!isset($_SESSION['access_token'])) {
				$login_button = $google_client->createAuthUrl() ;
			}
			$data['login_button']=$login_button;

			
     
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
                $this->session->set_userdata('login',$row->login);
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

        //para registro de venta o reserva
        public function registrar_venta()
        {
            # desarrollar el codigo para realizar la venta 
        }

       

    
    
}
