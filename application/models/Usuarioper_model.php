<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/// aca entratan todas las consultas q se realizran para la base de datos
class Usuarioper_model extends CI_Model {

	//este metdo devolvera la lista de estudiantes de la db
        //consulta para leer la lista 


      


        //consulta para el modificado de datos de lso esudiantes o actualizacion de datos
        public function modificarUsuario($idUsuario,$data)
	{
                
                
                $this->db->where('IdUsuario',$idUsuario);
                $this->db->update('usuario',$data);
        // return $this->db->get();
	}


	function modificarUsuario2($data, $email)
	{
	 $this->db->where('email', $email);
	 $this->db->update('usuario', $data);
	}

    
        public function crearLoguin($nom,$ap,$am,$ci){          

                //aca estamos captantdo ls valores y obteniendo el primer caracter 
                $n=$nom[0];
                $a=$ap[0];
                $a2=$am[0];
                
                $cadena=$n.$a.$a2.$ci;
                return strtoupper($cadena);             
        }

        public function validarCarnet ($ci){

            
                 $this->db->select('ci');
                 $this->db->from('usuario');
                 $this->db->where('ci', $ci);
                 $consulta = $this->db->get();
                 if ($consulta->num_rows() > 0) {
             
                     return 1;
                 } else {
                     return 0;
                 }




        }


        public function agregarUsuario($data)
	{
              
                $this->db->insert('usuario',$data); // aca la clave ses construir bien data, q va a contener

        // return $this->db->get();
	}
	function Is_already_register($id)
	{
	$this->db->where('email', $id);
	$query = $this->db->get('usuario');
	if($query->num_rows() > 0)
	{
	return true;
	}
	else
	{
	return false;
	}
	}


        //metodo q ara la consulta para eliminar estudiante

        public function eliminarUsuario($idUsuario)
        {
                $this->db->where('IdUsuario',$idUsuario);
                $this->db->delete('usuario'); //con esto se elimina el registro de mi tabla
        }


        public function HabilUsuario($idUsuario,$idUsuario_Acciones){
            $datos = ['idUsuario_Acciones' => $idUsuario_Acciones,];
            $datos = ['estado' => '1',];
            $this-> db-> where ('IdUsuario', $idUsuario);
            $this-> db-> update ('usuario', $datos); 
        }

        public function bajaUsuario($idUsuario){
            $datos = ['estado' => '0',];
           // $datos = ['idUsuario_Acciones' => $idUsuario_Acciones];
            $this-> db-> where ('IdUsuario', $idUsuario);
            $this-> db-> update ('usuario', $datos); 
        }



        public function existencia($dato){

                $this->db->select('idUsuario');
                $this->db->from('usuario');
                $this->db->where('password',$dato);

                $query = $this->db->get();
                if ($query->num_rows() > 0) {
                        return true;
                }
                else{
                        return false;
                }

        }


    



	
}
