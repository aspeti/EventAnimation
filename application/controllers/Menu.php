<!-- <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {




    public function __construct(){
        parent::__construct();

        if (!$this->session->userdata("login")) {
            echo '<script>
            alert("LA SESION EXPIRO");
            </script>';
            redirect('usuario/index/3');
		}
	}
	public function menu()
	{
       // $id=$this->session->userdata('login');

          $data['id']= $this->session->userdata('login');     
          $this->load->view('header/menu_inicio.php');
         $this->load->view('menu/menu',$data);
         $this->load->view('fooder/fin.php');

	}

    public function evento2()
	{
        $evento=$this->session->userdata('evento');
        ;
         $data['arrMesa']= "";
         $data['mesa']= "";
         $data['precio']= "";
         $data['sillas']= $this->silla_model->get_sillas($evento);



         $mesa =$this->input->get('mesa', TRUE);

         if ($mesa) {
             //$result = $this->silla_model->get_cantidad($query);

                 $data['arrMesa']=$this->silla_model->get_cantidad($mesa,$evento);
                 $data['mesa']=$mesa;
                 $data['precio']= $this->silla_model->get_precio($mesa,$evento);
                 //$data['sillas']=$this->silla_model->get_sillas();




         }


        // $lista=$this->usuarioper_model->lista();
         //$data['usuario']=$lista;

         //$data['arrZona'] = $this->zona_model->get_zona();

         $this->load->view('header/menu_inicio.php');
         //$this->load->view('inc_menu3.php');
         //  $this->load->view('inc_menu4.php');
         // $this->load->view('inc_menu.php');

         $this->load->view('evento/evento2',$data);
         $this->load->view('inc_fin2.php');

	}
    public function evento3()
	{
        $evento=$this->session->userdata('evento');

         $data['arrUbicacion']= "";
         $data['ubicacion']= "";
         $data['precio']= "";
         $data['sillas']= $this->silla_model->get_sillas($evento);
		 $vip='VIP';
		 $preferencial='PREFERENCIAL';
		 $general='GENERAL';



		 $data['vip']=$this->silla_model->contarVentas($vip);
		 $data['preferencial']=$this->silla_model->contarVentas( $preferencial);
		 $data['general']=$this->silla_model->contarVentas($general);




         $ubicacion =$this->input->get('ubicacion', TRUE);

         if ($ubicacion) {
             //$result = $this->silla_model->get_cantidad($query);
			 //echo "$ubicacion";

                 $data['arrUbicacion']=$this->silla_model->get_cantidad($ubicacion,$evento);
                 $data['ubicacion']=$ubicacion;
                 $data['precio']= $this->silla_model->get_precio($ubicacion,$evento);
				 $PRE= $this->silla_model->get_precio($ubicacion,$evento);

				 //ECHO "$PRE";
                 //$data['sillas']=$this->silla_model->get_sillas();




         }


        // $lista=$this->usuarioper_model->lista();
         //$data['usuario']=$lista;

         //$data['arrZona'] = $this->zona_model->get_zona();

         $this->load->view('header/menu_inicio.php');
         //$this->load->view('inc_menu3.php');
         //  $this->load->view('inc_menu4.php');
         // $this->load->view('inc_menu.php');

         $this->load->view('evento/evento3',$data);
         $this->load->view('inc_fin2.php');

	}
	public function vip()
	{
		$idUsuario=$this->session->userdata('idusuario');
		$user=$this->session->userdata('idusuario');

		$nomb=$this->session->userdata('nombres');

        $evento=$this->session->userdata('evento');
		$ubicacion =$this->input->get('ubicacion', TRUE);

         $data['arrUbicacion']= $this->silla_model->contarVip($user,$nomb);
		 $data['arrElegidas']='';

        // $data['ubicacion']= "";
		$data['ubicacion']= $this->input->post("mesa");
		$ubi='VIP';

        // $data['precio']= $this->silla_model->get_precio($ubicacion,$evento);

         $data['sillas']= $this->silla_model->get_sillas($evento);
			$data['precio']=$this->silla_model->get_precio($ubi,$evento);

			$data['arrElegidas']=$this->silla_model->sillasSeleccionadas($user,$nomb);

		 $sillas =$this->input->get('ubicacion', TRUE);

         if ($sillas) {

			$user=$this->session->userdata('idusuario');
			$nomb=$this->session->userdata('nombres');

			$numero = $this->silla_model->verificar($sillas,$user,$nomb);
			if ($numero>=1) {


			}
			else{
				$dat['idusuarioacciones']=$this->session->userdata('idusuario');
				$dat['nombreUsuario']=$this->session->userdata('nombres');

				$dat['idubicacion']=$sillas;
				$this->silla_model->cargarSilla($dat);

			}


			$data['precio']=$this->silla_model->get_precio($ubi,$evento);
			$data['arrElegidas']=$this->silla_model->sillasSeleccionadas($user,$nomb);
			$data['arrUbicacion']= $this->silla_model->contarVip($user,$nomb);


         }



		 $data['arrElegidas']=$this->silla_model->sillasSeleccionadas($user,$nomb);

         $this->load->view('header/menu_inicio.php');
         $this->load->view('evento/vip',$data);
         $this->load->view('inc_fin2.php');

	}




    function tiket(){
        $data1['tiket']='';
        $data1['num']=' ';

            if ($this->input->post('tiket', TRUE)) {
                    $tiket =$this->input->post('tiket', TRUE);
					//echo $cadena;


				 		if ($tiket!=' ' ) {

				 			$resultado = str_replace("'", "|", $tiket);
				 			$data['tiket'] =  $resultado;
				 			$data['idUsuarioAcciones'] = $this->session->userdata('idusuario');
				 			$numero = $this->venta_model->verificarTiket($resultado);
							 $cadena= substr($tiket, 0, 7);

							if ($cadena=='Reserva') {
								$data1['num']='3';

							} else {
											if ((int)$numero>=1) {



												$data1['num']=1;


										}
									else {
										$data1['num']=2;
										$this->venta_model->registrarTiket($data);
										$data1['tiket']='';

									}
							}


				 		}
				 		else {
				 			$data1['num']=' ';
				 		}






		}

        $this->load->view('header/menu_inicio.php');
         $this->load->view('evento/tiket',$data1);
          $this->load->view('inc_fin2.php');
    }



    function formUser (){
        $evento=$this->session->userdata('evento');


        $accion = $_GET['accion'] ?? '';
         $m=$_GET['numSilla'];
         if ($m == 'general') {
            $mesa=46;
         }else {
            $mesa = $_GET['numSilla'];
         }

        // $data['cantidad']=$_POST['silla'];
        // $data['precio']=$_POST['precioTotal'];
        // Buscar qué botón fue el que se usó para enviar el formulario
        if($accion == 'vender') {
            // Inicializar y ejecutar controlador correspondiente

            $this->load->view('header/menu_inicio.php');
            // $this->load->view('inc_menu4.php');
             $this->load->view('venta/formulario2');
             $this->load->view('inc_fin2.php');
        } elseif($accion == 'reservar') {
            // Inicializar y ejecutar controlador correspondiente
            $this->load->view('header/menu_inicio.php');
            // $this->load->view('inc_menu4.php');
             $this->load->view('venta/formularioReserva');
             $this->load->view('inc_fin2.php');
        }  elseif($accion == 'ventaReserva') {
            // Inicializar y ejecutar controlador correspondiente
				if($this->input->get("numSilla")==null){
					echo '<script>
					alert("Debe seleccionar una zona para realizar la accion");
					</script>';
					redirect('evento/evento3','refresh');
				}
				else{
					$data['reservas']=$this->evento_model->verReservas($mesa,$evento);
					$this->load->view('header/menu_inicio.php');
					// $this->load->view('inc_menu4.php');
					$this->load->view('venta/formularioVentaReserva2',$data,$mesa);
					$this->load->view('inc_fin2.php');
				}
        } elseif($accion == 'invitados') {
            // Inicializar y ejecutar controlador correspondiente
			$this->load->view('header/menu_inicio.php');
            // $this->load->view('inc_menu4.php');
             $this->load->view('venta/formulario3');
             $this->load->view('inc_fin2.php');
        }


        //$this->load->view('inc_inicio.php');




    }

	function formUser2 (){
        $evento=$this->session->userdata('evento');


        $accion = $_GET['accion'] ?? '';
         $m=$_GET['numSilla'];
         if ($m == 'general') {
            $mesa=46;
         }else {
            $mesa = $_GET['numSilla'];
         }

        // $data['cantidad']=$_POST['silla'];
        // $data['precio']=$_POST['precioTotal'];
        // Buscar qué botón fue el que se usó para enviar el formulario
        if($accion == 'vender') {
            // Inicializar y ejecutar controlador correspondiente

            $this->load->view('header/menu_inicio.php');
            // $this->load->view('inc_menu4.php');
             $this->load->view('venta/formulario2');
             $this->load->view('inc_fin2.php');
        } elseif($accion == 'reservar') {
            // Inicializar y ejecutar controlador correspondiente
            $this->load->view('header/menu_inicio.php');
            // $this->load->view('inc_menu4.php');
             $this->load->view('venta/formularioReserva');
             $this->load->view('inc_fin2.php');
        }  elseif($accion == 'ventaReserva') {
            // Inicializar y ejecutar controlador correspondiente
            $data['reservas']=$this->evento_model->verReservas($mesa,$evento);
            $this->load->view('header/menu_inicio.php');
            // $this->load->view('inc_menu4.php');
             $this->load->view('venta/formularioVentaReserva2',$data,$mesa);
             $this->load->view('inc_fin2.php');
        } elseif($accion == 'invitados') {
            // Inicializar y ejecutar controlador correspondiente
			$this->load->view('header/menu_inicio.php');
            // $this->load->view('inc_menu4.php');
             $this->load->view('venta/formulario3');
             $this->load->view('inc_fin2.php');
        }


        //$this->load->view('inc_inicio.php');



    }



    function reporte(){


        $evento=$this->session->userdata('evento');

        $data['mesas']= $this->evento_model->mesas($evento);
        $data['venta']= $this->evento_model->vendedor($evento);
        $data['compra']= $this->evento_model->comprador($evento);
        $data['reporte']= $this->evento_model->reporteFantasma($evento);
        $data['titulo']="";

        $opcion =$this->input->get('filtro', TRUE);



               switch ($opcion) {
                  case '1':
                        $desde =$this->input->get('desde', TRUE);
                        $hasta =$this->input->get('hasta', TRUE);


                      $data['reporte']=$this->evento_model->reporteFechas($desde,$hasta,$evento);
                      $data['titulo']="Reporte desde fecha ".$desde." hasta fecha ".$hasta;
                      break;
                  case '2':
					$desde =$this->input->get('desde', TRUE);
					$hasta =$this->input->get('hasta', TRUE);
					if ($desde == true and $hasta == true) {
						$mesa =$this->input->get('mesa', TRUE);
						$data['reporte']=$this->evento_model->reporteMesaFecha($mesa,$evento,$desde,$hasta);
						$data['titulo']="Reporte: Ubicacion ".$mesa." desde fecha ".$desde." hasta fecha ".$hasta ;
					}else{
                       $mesa =$this->input->get('mesa', TRUE);
                      $data['reporte']=$this->evento_model->reporteMesa($mesa,$evento);
                      $data['titulo']="Reporte de la mesa ".$mesa ;
					}
                      break;
                   case '3':
					$desde =$this->input->get('desde', TRUE);
					$hasta =$this->input->get('hasta', TRUE);
							if ($desde == true and $hasta == true) {
								$comprador =$this->input->get('comprador', TRUE);
								$data['reporte']=$this->evento_model->reporteCompradorFecha($comprador,$evento,$desde,$hasta);
								$data['titulo']="Reporte: Comprador ".$comprador." desde fecha ".$desde." hasta fecha ".$hasta ;
							}else{
								$comprador =$this->input->get('comprador', TRUE);
							$data['reporte']=$this->evento_model->reporteComprador($comprador,$evento);
							$data['titulo']="Reporte: Comprador ".$comprador;}

                       break;
                   case '4':
					$desde =$this->input->get('desde', TRUE);
					$hasta =$this->input->get('hasta', TRUE);
							if ($desde == true and $hasta == true) {
								$vendedor =$this->input->get('vendedor', TRUE);
								$data['reporte']=$this->evento_model->reporteVendedorFecha($vendedor,$evento,$desde,$hasta);
								$data['titulo']="Reporte: Vendedor ".$vendedor." desde fecha ".$desde." hasta fecha ".$hasta ;
							}else{
								$vendedor =$this->input->get('vendedor', TRUE);
							$data['reporte']=$this->evento_model->reporteVendedor($vendedor,$evento);
							$data['titulo']="Reporte: Vendedor ".$vendedor;}

                       break;
                   case '5':
					$desde =$this->input->get('desde', TRUE);
					$hasta =$this->input->get('hasta', TRUE);
							if ($desde == true and $hasta == true) {
								$data['reporte']=$this->evento_model->reporteGeneralFecha($evento,$desde,$hasta);
								$data['titulo']="Reporte: General desde fecha ".$desde." hasta fecha ".$hasta ;
							}else{
							$data['reporte']=$this->evento_model->reporteGeneral($evento);
							$data['titulo']="Reporte General ";}

                        break;
						case '6':
							$desde =$this->input->get('desde', TRUE);
							$hasta =$this->input->get('hasta', TRUE);
								if ($desde == true and $hasta == true) {
									$data['reporte']=$this->evento_model->reporteInvitadosFecha($evento,$desde,$hasta);
									$data['titulo']="Reporte: Invitados desde fecha ".$desde." hasta fecha ".$hasta ;
								}else{
								$data['reporte']=$this->evento_model->reporteInvitados($evento);
								$data['titulo']="Reporte Invitados";}

							 break;
							 case '7':
								$desde =$this->input->get('desde', TRUE);
								$hasta =$this->input->get('hasta', TRUE);
									if ($desde == true and $hasta == true) {
										$data['reporte']=$this->evento_model->reporteReservasFecha($evento,$desde,$hasta);
										$data['titulo']="Reporte: Reservas desde fecha ".$desde." hasta fecha ".$hasta ;
									}else{
									$data['reporte']=$this->evento_model->reporteReservas($evento);
									$data['titulo']="Reporte Reservas ";}

								 break;
              }
       $this->load->view('header/menu_inicio.php');

        //$this->load->view('inc_menu3.php');
       // $this->load->view('inc_menu4.php');
        $this->load->view('evento/reporte',$data);
        $this->load->view('inc_fin2.php');

    }


	function reporteVendedor(){


        $evento=$this->session->userdata('evento');
		$idusuario=$this->session->userdata('idusuario');


        //$data['mesas']= $this->evento_model->mesas($evento);
        //$data['venta']= $this->evento_model->vendedor($evento);
        //$data['compra']= $this->evento_model->comprador($evento);
        $data['reporte']= $this->evento_model->reporteFantasma($evento);
        $data['titulo']="";


		$accion = $_GET['accion'] ?? '';
		if ($accion=='vendedor') {
			$desde =$this->input->get('desde', TRUE);
			$hasta =$this->input->get('hasta', TRUE);

			if ($desde == true and $hasta == true) {
				$desde =$this->input->get('desde', TRUE);
			$hasta =$this->input->get('hasta', TRUE);
				$data['reporte']=$this->evento_model->reporteFechasVendedor($desde,$hasta,$evento,$idusuario);
				$data['titulo']="Reporte desde fecha ".$desde." hasta fecha ".$hasta;

			}else{
				$nombres=$this->session->userdata('nombres');
				$data['reporte']=$this->evento_model->reporteVendedorSolo($idusuario,$evento);
				$data['titulo']="Reporte del Vendedor ".$nombres;
			}
		}
       $this->load->view('header/menu_inicio.php');
        $this->load->view('evento/reporte_vendedor',$data);
        $this->load->view('inc_fin2.php');

    }



    function crearEvento(){

        $data['arrEvento']=$this->evento_model->crearEvento();
        $this->load->view('inc_inicio.php');
        $this->load->view('inc_menu.php');
        $this->load->view('usuario/administrador/evento',$data);
        $this->load->view('inc_fin.php');
    }



    function confirmarReserva(){
		$this->load->library('ciqrcode');

        $mesa=$_POST['mesa'];
        $evento=$_POST['evento'];
        $usuarioAccion=$_POST['idUsuario_Acciones'];
        $cantidad=$_POST['cantidadSillas'];
        $idCliente=$_POST['idCliente'];
		$nombre=$_POST['nombre'];
		$nombres=$_POST['nombres'];
		$apellidos=$_POST['apellidos'];
		$ci=$_POST['ci'];
		$telefono=$_POST['telefono'];


        try {


			$idSilla = $this->venta_model->obtenerIdSilla2($idCliente,$mesa,$usuarioAccion,$evento);

			$j=0;

			 foreach ($idSilla-> result() as $row) {

			 $id=  $row->id;

			 $user_id='Actualizado'.'_'.$mesa."_".$id;
			 // $tickets[$i]=$idUsuario."_".$mesa."_".$contar."_".$conteo;

			 //hacemos value
			 $params['data'] = 'Actualizado '.$mesa."/ Ubicacion - ".$id."/ a nombre de ".$nombres." ".$apellidos;
			 $params['level'] = 'H';
			 $params['size'] = 10;

			 //decimos el directorio a guardar el codigo qr, en este
			 //caso una carpeta en la raíz llamada qr_code
			 $params['savename'] = FCPATH . "cargas/qr_code/qr_$user_id.jpg";
			 //generamos el código qr
			 $this->ciqrcode->generate($params);

			 $nom="qr_$user_id.jpg";
			 $tickets[$j]=$nom;
			 $qr[$j]=$id;
			 $j++;


			}
            $this->venta_model->ActualizarVenta($idCliente,$mesa,$usuarioAccion,$evento);

			//desde aca programamso par el qr para la veta de reservado




			// $user_id='Actualizado'.$usuarioAccion.$mesa.$cantidad;
			// //hacemos configuraciones
			// $params['data'] = 'Actualizado '.$mesa."/ Sillas - ".$cantidad."/ a nombre de ".$nombre;
			// $params['level'] = 'H';
			// $params['size'] = 10;

			// //decimos el directorio a guardar el codigo qr, en este
			// //caso una carpeta en la raíz llamada qr_code
			// $params['savename'] = FCPATH . "cargas/qr_code/qr_$user_id.jpg";
			// //generamos el código qr
			// $this->ciqrcode->generate($params);

			// $data22['img'] = "qr_$user_id.jpg";
			// $nom="qr_$user_id.jpg";
			// $data22['ubicacion'] = $mesa;
			// $data22['nombre'] = $nombre;
			// // $data22['apellido'] = $apellidos;
			// $data22['cantidad'] =$cantidad;

		 $this->db->trans_commit();
		 $arreglo= '&error='.urlencode(serialize($tickets));
		 $arreglo2= '&error2='.urlencode(serialize($qr));



		 echo '<script language = javascript>
				 alert("Venta actualizada exitosa !!")
				   window.open("codigo_qr?ubicacion='.$mesa.'&nombre='.$nombres.'&apellido='.$apellidos.'&cantidad='.$cantidad.'&nom='.$nom.'&telefono='.$telefono.'&ci='.$ci.'&arreglo='.$arreglo.'&arreglo2='.$arreglo2.'"  ,"_blank");

				 </script>';



		//  echo '<script language = javascript>
		// 		 alert("Venta actualizada !!")
		// 		 window.open("codigo_qr?ubicacion='.$mesa.'&nombre='.$nombres.'&apellido='.$apellidos.'&cantidad='.$cantidad.'&nom='.$nom.'&telefono='.$telefono.'&ci='.$ci.'"  ,"_blank");


		// 		 </script>';


			//hasta aca
            redirect('evento/evento3', 'refresh');




        } catch (Exception $ex) {
            echo '<script>
            alert("Error, vuelva a intentar");
            </script>';
            redirect('evento/evento3', 'refresh');
        }


    }


	function codigo_qr(){


		$data22['nombres'] = $this->input->get("nombre");
		$data22['apellidos'] = $this->input->get("apellido");
		$data22['cantidad'] = $this->input->get("cantidad");
		$data22['ubicacion'] = $this->input->get("ubicacion");

		   $this->load->view('venta/codigo_qr');

   }


    function eliminarReserva(){
        $mesa=$_POST['mesa'];
        $evento=$_POST['evento'];
        $usuarioAccion=$_POST['idUsuario_Acciones'];
        $cantidad=$_POST['cantidadSillas'];
        $idCliente=$_POST['idCliente'];
        try {
            $this->venta_model->eliminarReserva($idCliente,$mesa,$usuarioAccion,$evento);


            echo '<script>
            alert("Reserva eliminada");
            </script>';
            redirect('evento/evento3', 'refresh');
        } catch (Exception $ex) {
            echo '<script>
            alert("Error, vuelva a intentar");
            </script>';
            redirect('evento/evento3', 'refresh');
        }

    }


}
