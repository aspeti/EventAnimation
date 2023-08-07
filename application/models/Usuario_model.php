<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/// aca entratan todas las consultas q se realizran para la base de datos
class Usuario_model extends CI_Model {





       
                
	//este metdo devolvera la lista de estudiantes de la db
        //consulta para leer la lista 
	public function validar($login,$password)
	{
                $query="SELECT u.*
                from usuario u
                where u.password ='$password' and u.email = '$login' and u.estado=1";

        $resultados = $this->db->query($query);
        return $resultados;

    }

}
