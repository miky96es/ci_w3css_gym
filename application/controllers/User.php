<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by IntelliJ IDEA.
 * User: miguel
 * Date: 25/02/17
 * Time: 20:05
 */
class User extends CI_Controller
{
	public function index()
	{
		if ($this->session->has_userdata('nombre', 'apellidos', 'es_admin')) {
			if ($_SESSION['es_admin'] == 1) {
				redirect(base_url());
			} else {
				$data['actividades']=$this->model_gimnasio->retornarResultados("activity");
				$this->load->view('user/user_home',$data);
			}
		} else {
			redirect(base_url());
		}
	}

	public function listainscrito()
	{
		if ($this->session->has_userdata('nombre', 'apellidos', 'es_admin','email')) {
			if ($_SESSION['es_admin'] == 1) {
				redirect(base_url());
			} else {
				$data['actividades']=$this->model_gimnasio->retornaractividadesinscrito($_SESSION['email']);
				$this->load->view('user/lista_inscritos',$data);
			}
		} else {
			redirect(base_url());
		}
	}

	public function inscribir()
	{
		if ($this->session->has_userdata('nombre', 'apellidos', 'es_admin','email')) {
			if ($_SESSION['es_admin'] == 1) {
				redirect(base_url());
			} else {
				$query=$this->model_gimnasio->retornaridactividadesinscrito($_SESSION['email']);
				//var_dump($query);
				if($query!=null){
					$data['actividades']=$this->model_gimnasio->retornaractividadesnoinscrito($query);
				}
				else{
					$data['actividades']=null;
				}
				//var_dump($this->model_gimnasio->retornaractividadesnoinscrito($_SESSION['email']));
				$this->load->view('user/inscribir',$data);
			}
		} else {
			redirect(base_url());
		}
	}


	public function unsuscribe(){
		if ($this->session->has_userdata('nombre', 'apellidos', 'es_admin','email')) {
			if ($_SESSION['es_admin'] == 1) {
				redirect(base_url()."admin");
			} else {
				if(isset($_GET['id']) && $this->model_gimnasio->existeactividadbyid($_GET['id']) && $this->model_gimnasio->existeuser($_SESSION['email'])){
					$this->model_gimnasio->eliminar_rel($_GET['id'],$_SESSION['email']);
					redirect(base_url()."user/listainscrito?unsuscribe=".$_GET['nombre']);
				}
				else{
					redirect(base_url()."user/lista");
				}			}
		} else {
			redirect(base_url());
		}
	}

	public function suscribe(){
		if ($this->session->has_userdata('nombre', 'apellidos', 'es_admin','email')) {
			if ($_SESSION['es_admin'] == 1) {
				redirect(base_url()."admin");
			} else {
				if(isset($_GET['id']) && $this->model_gimnasio->existeactividadbyid($_GET['id']) && $this->model_gimnasio->existeuser($_SESSION['email'])){
					$data=array(
						"id"=>$_GET['id'],
						"email"=>$_SESSION['email']
					);
					$this->model_gimnasio->insertarArray("user_rel_activity",$data);
					redirect(base_url()."user/inscribir?suscribe=".$_GET['nombre']);
				}
				else{
					redirect(base_url()."user/lista");
				}			}
		} else {
			redirect(base_url());
		}
	}
}
