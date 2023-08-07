<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/// aca entratan todas las consultas q se realizran para la base de datos
class Ventas_model extends CI_Model {


     //consulta para leer la lista 
     public function listar()
     {
	     $query="SELECT v.id, v.subtotal, v.total, v.fecha,v.id_usuario as idvendedor, v.id_cliente as idcliente, u.nombre as vendedor, c.nombre as cliente,
		 v.estado		 
	     from venta v, usuario u , cliente c
	     where v.estado =1 and v.id_usuario= u.id and v.id_cliente = c.id";

     $resultados = $this->db->query($query);
     return $resultados;
	    // return $this->db->get();

	     //consulta en mysql completa
	    /*  $query="SELECT * FROM usuario WHERE login='".$login."' AND password='".$password."'";
	     //  return $this->db->query($query);*/
 }
     public function registrarNuevo($datos){
	     $this->db->insert('venta',$datos); // aca la clave ses construir bien data, q va a contener

     }
     
     public function editarCat($datos,$id){
	     $this->db->where('id',$id);
	     $this->db->update('categoria',$datos);
     
     }

	 public function listarProducto($estado)
	{
                $query = $this->db-> query("SELECT id,nombre as producto FROM producto where estado = '$estado'");
            
                // si hay resultados
                if ($query->num_rows() > 0) {
                    // almacenamos en una matriz bidimensional
                    foreach($query->result() as $row)
                       $arrDatos[htmlspecialchars($row->id, ENT_QUOTES)] = 
                                 htmlspecialchars($row->producto, ENT_QUOTES);
            
                    $query->free_result();
                    return $arrDatos;
                 }
    }
	public function listarProducto2($name)
	{
                // $query = $this->db-> query("SELECT id,nombre as producto FROM producto where estado = 1");
            
					// $this->db->select("p.id,p.name as label,p.price,p.stock");
					$this->db->select("p.id,p.nombre as label,p.precio,p.stock");

					$this->db->from("producto p");
					$this->db->like("p.nombre", $name);
					$results = $this->db->get();
					return $results->result_array();
				
    }

	public function listarCliente($estado)
	{
                $query = $this->db-> query("SELECT id,nombre as cliente FROM cliente where estado = '$estado'");
            
                // si hay resultados
                if ($query->num_rows() > 0) {
                    // almacenamos en una matriz bidimensional
                    foreach($query->result() as $row)
                       $arrDatos[htmlspecialchars($row->id, ENT_QUOTES)] = 
                                 htmlspecialchars($row->cliente, ENT_QUOTES);
            
                    $query->free_result();
                    return $arrDatos;
                 }
    }
	public function listarCliente2()
	{
		$this->db->select("c.id,c.nombre as cliente,c.ci");
		$this->db->from("cliente c");
		$results = $this->db->get();
		return $results->result();
    }


	function lookup($keyword){
        $this->db->select('*')->from('producto');
        $this->db->like('nombre',$keyword);
        $query = $this->db->get();    
          
        return $query->result();
    }
}
