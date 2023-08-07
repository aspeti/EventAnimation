<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/// aca entratan todas las consultas q se realizran para la base de datos
class Usuarios_model extends CI_Model {


                
	     //consulta para leer la lista 
	     public function listar()
	     {
		     $query="SELECT u.*, r.rol, u.rol as roluser
		     from usuario u, rol r
			 where r.id = u.rol ";
     
	     $resultados = $this->db->query($query);
	     return $resultados;
		    // return $this->db->get();
     
		     //consulta en mysql completa
		    /*  $query="SELECT * FROM usuario WHERE login='".$login."' AND password='".$password."'";
		     //  return $this->db->query($query);*/
	 }
	     public function registrarNuevo($datos){
		     $this->db->insert('usuario',$datos); // aca la clave ses construir bien data, q va a contener
     
	     }
	     
	     public function editarUsu($datos,$id){
		     $this->db->where('id',$id);
		     $this->db->update('usuario',$datos);
	     
	     }

		 public function eliminarUsu($id){
			$this->db->where('id',$id);
					$this->db->delete('usuario');
		}

		public function habilitar($id,$idUsuario_Acciones){
			$datos = ['idUsuario_Acciones' => $idUsuario_Acciones,];
			$datos = ['estado' => '1',];
			$this-> db-> where ('id', $id);
			$this-> db-> update ('usuario', $datos); 
		}
	
		public function deshabilitar($id,$idUsuario_Acciones){
			$datos = ['idUsuario_Acciones' => $idUsuario_Acciones,];
			$datos = ['estado' => '0',];
			$this-> db-> where ('id', $id);
			$this-> db-> update ('usuario', $datos);  
	
		
		}

}
