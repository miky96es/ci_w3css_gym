<?php

/**
 * Created by IntelliJ IDEA.
 * User: miguel
 * Date: 21/02/17
 * Time: 16:34
 */
class Model_gimnasio extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function insertarArray($tabla,$array){//puede meter un objeto dentro de la BD
		$aux=false;
		if($this->db->insert($tabla, $array)){
			$aux=true;
		}
		return $aux;

	}

	public function modificarArray($tabla,$array,$id){//puede meter un objeto dentro de la BD
		$this->db->where('id', $id);
		return $this->db->update($tabla, $array);


	}
	public function existeuser($email){
		$this->db->select('*');
		$this->db->where('email', $email);
		$query = $this->db->get('user');
		if($query->num_rows()>0){
			return true;
		}
		else{
			return false;
		}

	}
	public function existeactividad($nombre,$fecha){
		$this->db->select('*');
		$this->db->where('date', $fecha);
		$this->db->where('nombre', $nombre);
		$query = $this->db->get('activity');
		if($query->num_rows()>0){
			return true;
		}
		else{
			return false;
		}

	}


	public function existeactividadbyid($id){
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get('activity');
		if($query->num_rows()>0){
			return true;
		}
		else{
			return false;
		}

	}

	public function esadmin($email)
	{
		$this->db->select('*');
		$this->db->where('email', $email);
		$this->db->where('es_admin', 1);
		$query = $this->db->get('user');
		if($query->num_rows()>0){
			return true;
		}
		else{
			return false;
		}
	}

	public function coincidedatosacceso($email,$password){
		$this->db->select('*');
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$query = $this->db->get('user');
		if($query->num_rows()>0){
			return true;
		}
		else{
			return false;
		}

	}
	public function retornarinfouser($email){
		$this->db->select('nombre, apellidos, es_admin, email');
		$this->db->where('email', $email);
		$query = $this->db->get('user');
		return $query->row_array();
	}
	public function retornarResultados($tabla){
		return $this->db->get($tabla);
	}
	public function retornaractividadesinscrito($email){
		$this->db->where('email',$email);
		$this->db->join('activity', 'activity.id=user_rel_activity.id');
		return $this->db->get('user_rel_activity');
	}
	public function retornaridactividadesinscrito($email){
		$this->db->select('activity.id');
		$this->db->where('email',$email);
		$this->db->join('activity', 'activity.id=user_rel_activity.id');
		return $this->db->get('user_rel_activity');
	}

	public function retornaractividadesnoinscrito($ids){
		$array=$ids->result_array();
		//var_dump($array);
		$array2=array();

		for ($i=0;$i<count($array);$i++){
			$array2[$i]=$array[$i]["id"];
		}
		//var_dump($array2);
		if ($array2!=null){
			$this->db->where_not_in('id',$array2);
		}

		return $this->db->get('activity');
	}
	public function eliminaractividad($id){
		$this->db->delete('activity', array('id' => $id));
	}
	public function eliminar_rel($id,$email){
		$this->db->delete('user_rel_activity', array('id' => $id,'email'=>$email));
	}
	public function sepuedeeliminaractividad($id){
		$this->db->where('id',$id);
		$query = $this->db->get('user_rel_activity');

		if($query->num_rows()>0){
			return false;
		}
		else{
			return true;
		}
	}

}
