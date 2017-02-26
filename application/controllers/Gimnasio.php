<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gimnasio extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->session->has_userdata('nombre', 'apellidos', 'es_admin','email')) {
			if ($_SESSION['es_admin'] == 1) {
				redirect(base_url()."admin");
			}
			else{
				redirect(base_url()."user");
			}
		}
		else {
			$this->load->view('login');
		}
	}

	public function registro()
	{
		if ($this->session->has_userdata('nombre', 'apellidos', 'es_admin','email')) {
			if ($_SESSION['es_admin'] == 1) {
				redirect(base_url()."admin");
			}
			else{
				redirect(base_url()."user");
			}
		}
		else {
			$this->load->view('signin');
		}
	}

	public function entrar()
	{
		if (isset($_POST['username'])) {
			$email = $_POST['username'];
			$password = md5($_POST['psw']);
			if ($this->model_gimnasio->coincidedatosacceso($email, $password)) {
				$infouser = $this->model_gimnasio->retornarinfouser($email);
				$this->session->set_userdata($infouser);
				if ($infouser["es_admin"] == 1) {
					redirect(base_url() . 'admin');
				} else {
					redirect(base_url() . 'user');
				}
			} else {
				redirect(base_url() . '?noexiste');
			}
		} else {
			redirect(base_url());
		}


	}

	public function cerrar()
	{
		if ($this->session->has_userdata('nombre', 'apellidos', 'es_admin','email')) {
			$this->session->unset_userdata(array('nombre', 'apellidos', 'es_admin'));
		}
			redirect(base_url());
	}

	public function nuevo_usuario()
	{

		if ($_POST['password'] != $_POST['repeatpassword']) {
			redirect(base_url() . 'gimnasio/registro?password');

		} else if ($this->model_gimnasio->existeuser($_POST['email'])) {
			redirect(base_url() . 'gimnasio/registro?existe');
		} else {
			$array_usuario = array(
				'email' => $_POST['email'],
				'nombre' => ucfirst(trim($_POST['name'])),
				'apellidos' => trim($_POST['lastname']),
				'password' => md5($_POST['password']),
				'fecha_nac' => $_POST['fecha_nac'],
				'es_admin' => 0
			);
			$this->model_gimnasio->insertarArray("user", $array_usuario);
			redirect(base_url() . 'gimnasio/?creado');
		}

	}
}
