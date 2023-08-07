<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/// aca entratan todas las consultas q se realizran para la base de datos
class Productos_model extends CI_Model {





            //consulta para leer la lista 
	public function listar()
	{
                $query="SELECT p.*, c.nombre as categoria
                from producto p , categoria c 
                where  c.id = p.id_categoria and p.estado =1";

        $resultados = $this->db->query($query);
        return $resultados;
               // return $this->db->get();

                //consulta en mysql completa
               /*  $query="SELECT * FROM usuario WHERE login='".$login."' AND password='".$password."'";
                //  return $this->db->query($query);*/
    }
	public function registrarNuevo($datos){
		$this->db->insert('producto',$datos); // aca la clave ses construir bien data, q va a contener

	}
	
	public function editarPro($datos,$id){
		$this->db->where('id',$id);
		$this->db->update('producto',$datos);
	
	}

	public function eliminarPro($id){
		$data['estado']='0';
		$this->db->where('id',$id);
                $this->db->update('producto',$data);
	}
	public function subirFoto($idUsuario,$data)
	{
                $this->db->where('id',$idUsuario);
                $this->db->update('producto',$data);
        //  return $this->db->get();
	}
	
	public function listarCategoria($estado)
	{
                $query = $this->db-> query("SELECT id,nombre as categoria FROM categoria where estado = '$estado'");
            
                // si hay resultados
                if ($query->num_rows() > 0) {
                    // almacenamos en una matriz bidimensional
                    foreach($query->result() as $row)
                       $arrDatos[htmlspecialchars($row->id, ENT_QUOTES)] = 
                                 htmlspecialchars($row->categoria, ENT_QUOTES);
            
                    $query->free_result();
                    return $arrDatos;
                 }
    }


    public function get_idcat($cat){

                        
	$this->db->select('id');
	$this->db->from('categoria');
	$this->db->where('nombre',$cat);
	$query = $this->db->get();
	if ($query->num_rows() > 0) {
		return $query->row()->id;
	}
	return false;
      


}

}
