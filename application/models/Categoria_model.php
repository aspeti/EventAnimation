<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/// aca entratan todas las consultas q se realizran para la base de datos
class Categoria_model extends CI_Model {





       
                
	//este metdo devolvera la lista de estudiantes de la db
        //consulta para leer la lista 
	public function listar()
	{
                $query="SELECT *
                from categoria
                ";

        $resultados = $this->db->query($query);
        return $resultados;
               // return $this->db->get();

                //consulta en mysql completa
               /*  $query="SELECT * FROM usuario WHERE login='".$login."' AND password='".$password."'";
                //  return $this->db->query($query);*/
    }
	public function registrarNuevo($datos){
		$this->db->insert('categoria',$datos); // aca la clave ses construir bien data, q va a contener

	}
	
	public function editarCat($datos,$id){
		$this->db->where('id',$id);
		$this->db->update('categoria',$datos);
	
	}

	public function habilitar($id,$idUsuario_Acciones){
		$datos = ['idUsuario_Acciones' => $idUsuario_Acciones,];
		$datos = ['estado' => '1',];
		$this-> db-> where ('id', $id);
		$this-> db-> update ('categoria', $datos); 
	}

	public function deshabilitar($id,$idUsuario_Acciones){
		$datos = ['idUsuario_Acciones' => $idUsuario_Acciones,];
		$datos = ['estado' => '0',];
		$this-> db-> where ('id', $id);
		$this-> db-> update ('categoria', $datos);  

	
	}
	public function eliminar($id){
		$this->db->where("id", $id);
		$this->db->db_debug = false;
		if($this->db->delete("categoria")){
			return array("success","Se eliminó correctamente!");
		}else{
			return array("error","No se puede eliminar una categoria que contiene productos!");
		}

	
	}

}
