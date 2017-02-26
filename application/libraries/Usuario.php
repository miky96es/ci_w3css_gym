<?php

/**
 * Created by IntelliJ IDEA.
 * User: miguel
 * Date: 22/02/17
 * Time: 22:05
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario
{
	var $nombre;
	var $email;
	var $apellidos;
	var $password;
	var $fecha_nac;
	public function __construct($email,$nombre,$apellidos,$password,$fecha_nac)
	{
		$this->email=$email;
		$this->nombre=$nombre;
		$this->apellidos=$apellidos;
		$this->password=$password;
		$this->fecha_nac=$fecha_nac;

	}
}
