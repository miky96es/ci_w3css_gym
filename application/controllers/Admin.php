<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by IntelliJ IDEA.
 * User: miguel
 * Date: 25/02/17
 * Time: 20:05
 */
class Admin extends CI_Controller
{
	public function index()
	{
		if ($this->session->has_userdata('nombre', 'apellidos', 'es_admin', 'email')) {
			if ($_SESSION['es_admin'] == 1) {
				$this->load->view('admin/home_admin');
			} else {
				$this->load->view('user/user_home');
			}
		} else {
			redirect(base_url());
		}
	}

	public function crear()
	{
		if ($this->session->has_userdata('nombre', 'apellidos', 'es_admin', 'email')) {
			if ($_SESSION['es_admin'] == 1) {
				$this->load->view('admin/alta_actividad');
			} else {
				$this->load->view('user/user_home');
			}
		} else {
			redirect(base_url());
		}
	}

	public function lista()
	{
		if ($this->session->has_userdata('nombre', 'apellidos', 'es_admin', 'email')) {
			if ($_SESSION['es_admin'] == 1) {
				$data['actividades'] = $this->model_gimnasio->retornarResultados("activity");
				//var_dump($data);
				$this->load->view('admin/lista_actividades', $data);
			} else {
				$this->load->view('user/user_home');
			}
		} else {
			redirect(base_url());
		}
	}

	public function eliminar()
	{
		if ($this->session->has_userdata('nombre', 'apellidos', 'es_admin', 'email')) {
			if ($_SESSION['es_admin'] == 1) {
				if (isset($_GET['id']) && $this->model_gimnasio->existeactividadbyid($_GET['id'])) {
					if ($this->model_gimnasio->sepuedeeliminaractividad($_GET['id'])) {
						$this->model_gimnasio->eliminaractividad($_GET['id']);
						redirect(base_url() . "admin/lista?eliminada=" . $_GET['id']);
					} else {
						redirect(base_url() . "admin/lista?error=". $_GET['id']);

					}
				} else {
					redirect(base_url() . "admin/lista");
				}

			} else {
				$this->load->view('user/user_home');
			}
		} else {
			redirect(base_url());
		}
	}

	public function alta()
	{
		if ($this->session->has_userdata('nombre', 'apellidos', 'es_admin', 'email')) {
			if ($_SESSION['es_admin'] == 1) {
				if (isset($_POST['activity-name']) && isset($_POST['activity-date']) && isset($_POST['activity-description'])) {
					if ($this->model_gimnasio->existeactividad($_POST['activity-name'], $_POST['activity-date'])) {
						redirect(base_url() . 'admin/crear?yaexiste');
					} else {
						$array_actividad = array(
							'nombre' => ucfirst(trim($_POST['activity-name'])),
							'descripcion' => $_POST['activity-description'],
							'date' => $_POST['activity-date']
						);
						$this->model_gimnasio->insertarArray("activity", $array_actividad);
						redirect(base_url() . 'admin/crear?creado');
					}
				} else {
					redirect(base_url() . 'admin/crear');
				}
			} else {
				$this->load->view('user/user_home');
			}
		} else {
			redirect(base_url());
		}
	}

	public function modificar()
	{
		if ($this->session->has_userdata('nombre', 'apellidos', 'es_admin', 'email')) {
			if ($_SESSION['es_admin'] == 1) {
				if (isset($_POST['activity-id']) && isset($_POST['activity-name']) && isset($_POST['activity-date']) && isset($_POST['activity-description'])) {
					if ($this->model_gimnasio->existeactividadbyid($_POST['activity-id'])) {
						$array_actividad = array(
							'nombre' => ucfirst(trim($_POST['activity-name'])),
							'descripcion' => $_POST['activity-description'],
							'date' => $_POST['activity-date']
						);
						$this->model_gimnasio->modificarArray("activity", $array_actividad, $_POST['activity-id']);
						redirect(base_url() . 'admin/lista?modificada=' . $_POST['activity-id']);
					} else {
						redirect(base_url() . 'admin/lista?noexiste');
					}
				} else {
					redirect(base_url() . 'admin/crear');
				}
			} else {
				$this->load->view('user/user_home');
			}
		} else {
			redirect(base_url());
		}
	}
}
