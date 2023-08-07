<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/// aca entratan todas las consultas q se realizran para la base de datos
class Cliente_model extends CI_Model {





       
                
	     //consulta para leer la lista 
	     public function listar()
	     {
		     $query="SELECT *
		     from cliente
		     where estado =1";
     
	     $resultados = $this->db->query($query);
	     return $resultados;
		    // return $this->db->get();
     
		     //consulta en mysql completa
		    /*  $query="SELECT * FROM usuario WHERE login='".$login."' AND password='".$password."'";
		     //  return $this->db->query($query);*/
	 }
	     public function registrarNuevo($datos){
		     $this->db->insert('cliente',$datos); // aca la clave ses construir bien data, q va a contener
     
	     }
	     
	     public function editarCli($datos,$id){
		     $this->db->where('id',$id);
		     $this->db->update('cliente',$datos);
	     
	     }
		 public function eliminarCli($id){
			$data['estado']='0';
			$this->db->where('id',$id);
					$this->db->update('cliente',$data);
		}

}
